<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cartItem = CartItem::all();

            foreach ($cartItem as $item) {
                $item->product_image = ProductImage::where('product_id', $item->product_id)->get();
            }
            return response()->json($cartItem);
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
            $request->validate([
                'cart_id' => 'required||integer',
                'product_id' => 'required|integer',
                'quantity' => 'required||integer',
            ]);

            $cartItem = CartItem::create($request->all());

            return response()->json($cartItem);
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
            $cartItem = CartItem::findorfail($id);

            $cartItem->product_name = Product::where('id', $cartItem->product_id)->find();
            $cartItem->product_image = ProductImage::where('product_id', $cartItem->product_id)->get();

            return response()->json($cartItem);
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
                'quantity' => 'required|integer',
            ]);

            // Check if the quantity is greater than the available quantity
            $product = Product::findorfail($request->product_id);
            if ($request->quantity > $product->quantity) {
                return response()->json(['error' => 'The quantity is greater than the available quantity'], 400);
            }

            $cartItem = CartItem::findorfail($id);
            $cartItem->fill($request->all());
            $cartItem->save();
            return response()->json($cartItem);
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cartItem = CartItem::findorfail($id);
            $cartItem->delete();
            return response()->json("The cart item has been deleted");
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Cart item not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
