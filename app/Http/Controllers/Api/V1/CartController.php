<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

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
                'user_id' => 'required',
                'total' => 'required',
            ]);

            $cart = Cart::create($request->all());
            return response()->json($cart);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $cart = Cart::find($id);
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
                'total' => 'required',
            ]);
            $cart = Cart::findorfail($id);

            // only update the fields that are actually passed

            $cart->fill($request->all());

            return response()->json($cart);
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
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
