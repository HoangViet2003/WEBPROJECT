<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orderItem = OrderItem::all();
            return response()->json($orderItem);
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
                'order_id' => 'required||integer',
                'product_id' => 'required|integer',
                'quantity' => 'required||integer',
            ]);

            $orderItem = OrderItem::create($request->all());
            return response()->json($orderItem);
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
            $orderItem = OrderItem::findorfail($id);

            return response()->json($orderItem);
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
                'order_id' => 'required||integer',
                'product_id' => 'required|integer',
                'quantity' => 'required||integer',
            ]);
            $orderItem = OrderItem::findorfail($id);

            // only update the fields that are actually passed
            $orderItem->fill($request->all())->save();

            return response()->json($orderItem);
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Order item not found'], 404));
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
            $orderItem = OrderItem::find($id);
            $orderItem->delete();
            return response()->json('delete');
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Order item not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
