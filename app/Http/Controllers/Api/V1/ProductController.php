<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Get the page from the query
            $page = $request->query('page');

            // Paginate the results (sort the result by created at)
            $product = Product::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $page);

            // Get the images of the products from table image
            foreach ($product as $item) {
                $item->images = ProductImage::where('product_id', $item->id)->get();
            }

            // Customize the response to include the total number of pages
            $response = [
                'totalLength' => $product->total(),
                'totalPage' => $product->lastPage(),
                'currentPage' => $product->currentPage(),
                'data' => $product->items(),
            ];

            // Return the response to the client
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function getAllProductsWithoutLimit()
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request (validate the required fields and the data types)
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'category_id' => 'required|integer|min:1',
                'quantity' => 'required|integer|min:0',
            ]);

            // Change the product status based on the quantity
            if ($request->quantity >= 10) {
                $request->merge(['status' => 'in_stock']);
            } else if ($request->quantity > 0 && $request->quantity < 10) {
                $request->merge(['status' => 'running_low']);
            } else {
                $request->merge(['status' => 'out_of_stock']);
            }

            // Create the product from the request exclude the images
            $product = Product::create($request->except('images'));

            // If the request has images, save them to the database
            if ($request->images) {
                // Loop through the images and save them to the database
                foreach ($request->images_names as $image_name) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => '/images/' . $image_name,
                    ]);
                }
            }

            // Return the product to the client
            return response()->json($product);
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
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
            // Find the product by id
            $product = Product::findorfail($id);

            // Get the images of the product from table image
            $product->images = ProductImage::where('product_id', $id)->get();

            // Return the product to the client
            return response()->json($product);
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Product not found'], 404));
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

            // Validate the request (validate the required fields and the data types)
            $request->validate([
                'name' => 'string|max:255',
                'price' => 'numeric|min:0',
                'description' => 'string',
                'rating' => 'integer|min:1|max:5',
                'category_id' => 'integer|min:1',
                'quantity' => 'integer|min:0',
            ]);

            // Change the product status based on the quantity
            if ($request->quantity >= 10) {
                $request->merge(['status' => 'in_stock']);
            } else if ($request->quantity > 0 && $request->quantity < 10) {
                $request->merge(['status' => 'running_low']);
            } else {
                $request->merge(['status' => 'out_of_stock']);
            }

            $product = Product::findorfail($id);

            // Only update the fields that are actually passed
            $product->fill($request->except('images'))->save();

            // If the request has images, save them to the database
            if ($request->images) {
                $productImages = ProductImage::where('product_id', $id);

                foreach ($productImages->get() as $image) {
                    $image_path = public_path() . $image->image_url;

                    // Remove the old images from the directory
                    File::delete($image_path);
                }

                // Delete the old images in the database
                $productImages->delete();

                // Loop through the images and save them to the database
                foreach ($request->images_names as $image_name) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => '/images/' . $image_name,
                    ]);
                }
            }

            return response()->json($product);
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Product not found'], 404));
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
            $productImages = ProductImage::where('product_id', $id);

            foreach ($productImages->get() as $image) {
                $image_path = public_path() . $image->image_url;

                // Remove the old images from the directory
                File::delete($image_path);
            }

            // Delete the product
            Product::findorfail($id)->delete();

            return response()->json('deleted');
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'Product not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Search the product by name and price and category.
     */
    public function searchProduct(Request $request)
    {
        try {
            // Get the page from the query
            $page = $request->query('page');
            $name = $request->query('name');
            $priceMin = $request->query('price_min');
            $priceMax = $request->query('price_max');
            $category_id = $request->query('category_id');

            // Search the product by name and price and category
            $product = Product::where('name', 'like', '%' . $name . '%')
                ->where('price', '>=', $priceMin ?? 0)
                ->where('price', '<=', $priceMax ?? 999999999)
                ->where('category_id', 'like', '%' . $category_id . '%')
                ->paginate(10, ['*'], 'page', $page);

            // Get the images of the product from table image
            foreach ($product as $item) {
                $item->images = ProductImage::where('product_id', $item->id)->get();
            }

            // Customize the response to include the total number of pages
            $response = [
                'totalLength' => $product->total(),
                'totalPage' => $product->lastPage(),
                'currentPage' => $product->currentPage(),
                'data' => $product->items(),
            ];

            // Return the response to the client
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
