<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // login
    public function login(Request $request)
    {
        try {
            // validate the request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // get the user
            $user = User::where('email', $request->email)->first();

            // check if the user exists
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'The provided credentials are incorrect.'
                ], 401);
            }

            // generate a token
            $token = $user->createToken('token')->plainTextToken;

            // return the token
            return response()->json([
                'token' => $token,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'is_admin' => $user->is_admin,
                'created_at' => $user->created_at,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    // register
    public function register(Request $request)
    {
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
                'password' => Hash::make($request->password)
            ]);

            // generate a token
            $token = $user->createToken('token')->plainTextToken;

            // return the token
            return response()->json([
                'token' => $token,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'is_admin' => $user->is_admin,
                'created_at' => $user->created_at,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
