<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;

class AuthorizeResourceAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // print out user details in json format
            $user = response()->json(Auth::user());
            $is_admin = $user->original['is_admin'];

            $cart_id = Cart::where('user_id', $user->original['id'])->first();

            if ($cart_id) {
                $cart_id = $cart_id->id;
            }

            $cart_item_id = CartItem::where('cart_id', $cart_id)->first();

            if ($cart_item_id) {
                $cart_item_id = $cart_item_id->id;
            }

            // Find the order id that has the id equals to the request route and has the user id equals id of the user
            $order_id = Order::where('id', $request->route('order'))->where('user_id', $user->original['id'])->first();

            if ($order_id) {
                $order_id = $order_id->id;
            }

            // check if user is admin or user is accessing his own resource
            if ($is_admin || $user->original['id'] == $request->route('id') || $cart_id = $request->cart_id || $cart_id == $request->route('cart') || $cart_item_id == $request->route('cartItem') || $order_id) {
                return $next($request);
            }

            return response()->json(['message' => 'You are not authorized to access this resource']);
        }

        return response()->json(['message' => 'You are not authorized to access this resource']);
    }
}
