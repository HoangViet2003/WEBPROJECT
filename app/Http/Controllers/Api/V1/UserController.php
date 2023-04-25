<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        try {
            // Get the page from the query
            $page = $request->query('page');

            // paginate the results (sort the result by created at)
            $users = User::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $page);

            // Customize the response to include the total number of pages
            $response = [
                'totalLength' => $users->total(),
                'totalPage' => $users->lastPage(),
                'currentPage' => $users->currentPage(),
                'data' => $users->items(),
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function getUserbyEmail(Request $request)
    {
        try {
            $email = $request->query('email');

            $user = User::where('email', $email)->first();

            // If no user is found, return a 404 response
            if (!$user) {
                return response()->json([
                    'message' => 'User not found'
                ], 404);
            }

            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new user
        try {
            // validate the request
            $request->validate([
                'full_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'is_admin' => 'required|boolean'
            ]);

            // hash the password
            $request->merge([
                'password' => Hash::make($request->password)
            ]);

            // create a new user
            $user = User::create($request->all());

            return response()->json($user);
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
            // get the user
            $user = User::findorfail($id);

            return response()->json($user);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
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
            // Only admin or the user itself can update the user
            if (auth()->user()->id != $id && !auth()->user()->is_admin) {
                return response()->json([
                    'message' => 'You are not authorized to update this user'
                ], 403);
            }

            $user = User::findorfail($id);

            if ($request->email != $user->email) {
                $request->validate([
                    'email' => 'required|email|unique:users',
                ]);
            }

            // hash the password if it is passed
            if ($request->password) {
                $request->merge([
                    'password' => Hash::make($request->password)
                ]);
            }

            if ($request->is_admin || auth()->user()->is_admin) {
                $request->validate([
                    'is_admin' => 'required'
                ]);
            }

            // get the user
            $user = User::findorfail($id);

            // Only admin can update the is_admin field, else ignore it, ignore not validated fields
            if (auth()->user()->is_admin) {
                $user->fill($request->all())->save();
            } else {
                $user->fill($request->only(['full_name', 'email']))->save();
            }

            return response()->json($user);
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'User not found'], 404));
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
            // delete the user from database
            User::findorfail($id)->delete();

            return response()->json('deleted');
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'User not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
