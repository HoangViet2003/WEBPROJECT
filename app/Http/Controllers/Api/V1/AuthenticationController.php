<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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

            // find cart_id of the cart that has user_id is euqal to the user.id
            $cart_id = Cart::where('user_id', $user->id)->value('id');

            // generate the token
            $token = auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            return $this->respondWithToken($user, $cart_id, $token);
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

            // Create a new cart
            $cart_id = Cart::create([
                'user_id' => $user->id,
            ])->id;

            return response()->json([
                'user_id' => $user->id,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'is_admin' => $user->is_admin,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'cart_id' => $cart_id,
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
    protected function respondWithToken($user, $cart_id, $token)
    {
        return response()->json([
            'user_id' => $user->id,
            'cart_id' => $cart_id,
            'name' => $user->full_name,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() / 60 * 60
        ]);
    }
}
