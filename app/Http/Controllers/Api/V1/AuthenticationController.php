<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthenticationController extends Controller
{
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

            // generate the token
            $token = auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            return $this->respondWithToken($user, $token);
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
                'password' => Hash::make($request->password),
                'is_admin' => 0,
            ]);

            // get the token
            $token = auth()->login($user);

            return response()->json([
                'full_name' => $user->full_name,
                'email' => $user->email,
                'is_admin' => $user->is_admin,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ], 201);
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json(['errors' => $e->errors()], 400));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
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
    protected function respondWithToken($user, $token)
    {
        return response()->json([
            'user_id' => $user->id,
            'name' => $user->full_name,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
