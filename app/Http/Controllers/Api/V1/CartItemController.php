<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cartItem = CartItem::all();
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
            $cartItem = CartItem::create($request->all());
            return response()->json($cartItem);
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
            $cartItem = CartItem::find($id);
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
            $cartItem = CartItem::findorfail($id);
            $cartItem->fill($request->all());
            $cartItem->save();
            return response()->json($cartItem);
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
            $cartItem = CartItem::find($id);
            $cartItem->delete();
            return response()->json("The cart item has been deleted");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
