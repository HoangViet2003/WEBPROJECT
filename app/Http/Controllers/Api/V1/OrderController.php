<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the all the order   
        try {
            $order = Order::all();
            return response()->json($order);
        } // catch exception and return error message
        catch (\Exception $e) {
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
                'address' => 'required',
                'user_id' => 'required|integer',
                'total' => 'required|numeric',
            ]);

            $order = Order::create($request->all());

            // Get all cart items from user cart
            $cart_items = CartItem::where('cart_id', $request->cart_id)->get();

            // Loop through cart items and create order items for each cart item
            foreach ($cart_items as $cart_item) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->product_id = $cart_item->product_id;
                $order_item->quantity = $cart_item->quantity;
                $order_item->save();

                // Update the quantity of the product
                $product = Product::find($cart_item->product_id);
                $product->quantity = $product->quantity - $cart_item->quantity;
                $product->save();
            }

            return response()->json($order);
            //catch the exception
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // find the order by id
        try {
            $order = Order::findorfail($id);

            // Get all order items for the order
            $order_items = OrderItem::where('order_id', $order->id)->get();

            // Get all products for the order items
            foreach ($order_items as $order_item) {
                $order_item->product = Product::find($order_item->product_id);
            }

            // Get all images for the products
            foreach ($order_items as $order_item) {
                $order_item->product->images = ProductImage::where('product_id', $order_item->product_id)->get();
            }

            // Add order items to order
            $order->order_items = $order_items;

            return response()->json($order);
            //catch the exception
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
            //validate the request
            $order = Order::findorfail($id);

            // if update the order status, delete cart items, and update product quantity
            if ($request->is_confirmed == 1) {
                // Delete all cart items
                $cart_items = CartItem::where('cart_id', $order->cart_id)->get();
                foreach ($cart_items as $cart_item) {
                    $cart_item->delete();
                }

                // Update product quantity
                $order_items = OrderItem::where('order_id', $order->id)->get();
                foreach ($order_items as $order_item) {
                    $product = Product::find($order_item->product_id);
                    $product->quantity = $product->quantity - $order_item->quantity;
                    $product->save();
                }
            }


            $order->fill($request->all());
            $order->save();

            return response()->json($order);
            // catch model and validate exception   
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Order not found'], 404));
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
            $order = Order::findorfail($id);
            $order->delete();
            return response()->json('deleted');
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Order not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function getOrderByCartId(string $cart_id)
    {
        try {
            $order = Order::where('cart_id', $cart_id)->orderBy('created_at', 'desc')->first();

            if (!$order) {
                return response()->json('No order found');
            } // If order is confirmed and user is not admin, return {} 
            // else if ($order->is_confirmed == 1 && auth()->user()->is_admin == 0) {
            //     return response()->json('Order is confirmed');
            // }

            // Get all order items for the order
            $order_items = OrderItem::where('order_id', $order->id)->get();

            // Get all products for the order items
            foreach ($order_items as $order_item) {
                $order_item->product = Product::find($order_item->product_id);
            }

            // Get all images for the products
            foreach ($order_items as $order_item) {
                $order_item->product->images = ProductImage::where('product_id', $order_item->product_id)->get();
            }

            // Add order items to order
            $order->order_items = $order_items;


            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function getAllOrdersByUserId()
    {
        try {
            // require user to be logged in, else return 403
            if (!auth()->user()) {
                return response()->json('Unauthorized', 403);
            }

            $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        };
    }
}
