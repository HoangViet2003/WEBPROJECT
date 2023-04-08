<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all of the products
        try {
            $product = Product::all();
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create a new product
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'rating' => 'required',
                'quantity' => 'required',
                'status' => 'required',
            ]);
            $product = Product::create($request->all());
            return response()->json($product);
        } catch (\Exception $e) {
            return  response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::find($id);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $product = Product::find($id);
            return response()->json($product);
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
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'rating' => 'required',
                'quantity' => 'required',
                'status' => 'required',
            ]);
            $product = Product::findorfail($id);

            // only update the fields that are actually passed
            $product->fill($request->all())->save();

            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        // $product = Product::find($id);
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->rating = $request->rating;
        // $product->quanity = $request->quanity;
        // $product->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            return response()->json('deleted');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
