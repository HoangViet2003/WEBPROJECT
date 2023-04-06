<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    // login
    public function login(Request $request)
    {
        try {
            // validate the request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // check if the user exists
            $user = User::where('email', $request->email)->first();

            // if the user does not exist
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }

            return $this->respondWithToken($token);
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

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    // Refresh the token
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    // Get the token array structure
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
