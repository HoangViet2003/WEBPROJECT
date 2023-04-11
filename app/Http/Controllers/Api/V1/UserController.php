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

    public function index()
    {
        $users = User::all();
        return response()->json($users);
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

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function show(string $id)
    {
        try {
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
            $request->validate([
                'full_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'is_admin' => 'required|boolean'
            ]);
            $user = User::findorfail($id);

            // Only update the fields that are actually passed
            $user->fill($request->all());

            return response()->json($user);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findorfail($id);
            $user->delete();
            return response()->json('deleted');
        } catch (ModelNotFoundException $e) {
            throw new HttpResponseException(response()->json(['error' => 'User not found'], 404));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
