<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'User Registered',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['errors' => 'Invalid Email'], 401);
        } elseif (!Hash::check($request->password, $user->password)) {
            return response()->json(['errors' => 'Incorrect password'], 401);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Login Successfully',
            'user' => $user->makeHidden(['password']),
            'token' => $token
        ], 200);
    }

    public function dashboard(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['errors' => 'Token Invalid'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['errors' => 'Token is Expired'], 401);
        }

        return response()->json([
            'message' => 'Login Successfully',
            'user' => $user,
            // 'message' => 'Welcome to your Dashboard'
        ]);
    }

    public function logout(Request $request)
    {
        try {
            $token = JWTAuth::getToken();
            if (!$token) {
                return response()->json(['errors' => 'Token is not Provided'], 401);
            }

            JWTAuth::invalidate($token);
            return response()->json(['message' => 'Logout Successfully'], 200);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['errors' => 'Failed to logout, Invalid token'], 401);
        }
    }
}
