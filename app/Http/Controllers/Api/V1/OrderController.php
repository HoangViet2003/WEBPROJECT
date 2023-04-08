<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $order = Order::all();
        return response()->json($order);
        } catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

            $order = Order::create($request->all());
            return response()->json($order);
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
            $order = Order::find($id);
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
         $request->validate([
            'user_id' => 'required',
            'total' => 'required',
         ]);
        $order = Order::findorfail($id);
        // only update the fields that are actually passed
        
        $order->fill($request->all());
        $order->save();

        return response()->json($order);
        } catch (\Exception $e) {
        return response()->json($e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json('deleted');
    }
}
