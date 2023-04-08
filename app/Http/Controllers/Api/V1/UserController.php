<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
                'password' => 'required'
            ]);

            // create a new user
            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role
            ]);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }



    public function show(string $id)
    {
        try {
            $user = User::find($id);
            return response()->json($user);
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
            $user = User::findorfail($id);

            // only update the fields that are actually passed

            $user->fill($request->all());

            return response()->json($user);
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
            $user = User::findorfail($id);
            $user->delete();
            return response()->json('deleted');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
