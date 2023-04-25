<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cart = Cart::all();

            return response()->json($cart);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request...
            $request->validate([
                'user_id' => 'required||integer',
                'total' => 'numeric',
            ]);

            $cart = Cart::create($request->all());
            return response()->json($cart);
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $cart = Cart::find($id);

            // Get all cart items from Cart Item
            $cartItems = CartItem::where('cart_id', $id)->get();

            // Get all the products related to the cart items
            $products = Product::whereIn('id', $cartItems->pluck('product_id'))->get();

            // Get all the images related to the products
            $images = ProductImage::whereIn('product_id', $products->pluck('id'))->get();

            // Get the category of the product
            $products->map(function ($product) {
                $product->category = $product->category;
            });

            // Add the images to the products
            $products->map(function ($product) use ($images) {
                $product->images = $images->where('product_id', $product->id);
            });

            // Merge the product with the cart item object
            $cartItems->map(function ($cartItem) use ($products) {
                $cartItem->product = $products->where('id', $cartItem->product_id)->first();
            });

            // Add the cart items to the cart
            $cart->items = $cartItems;

            // Calculate the total based on the product price and the cart item quantity
            $cart->total = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            });


            return response()->json($cart);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'user_id' => 'required',
            ]);

            $cart = Cart::findorfail($id);

            // only update the fields that are actually passed
            $cart->fill($request->all());

            return response()->json($cart);
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Cart not found'], 404));
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cart = Cart::findorfail($id);
            $cart->delete();
            return response()->json('deleted');
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Order not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
