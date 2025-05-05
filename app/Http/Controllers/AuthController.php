<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Models\Products;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        // Check if the user already exists
        $existingUser = User::where('email', $validatedData['email'])->first();
        if ($existingUser) {
            return response()->json(['error' => 'User already exists'], 409);
        } 
        // Create a new user
        
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        // Optionally, you can log in the user after registration
        $token = auth('api')->login($user);

        return $this->respondWithToken($token); 
    }
    
   
    public function login(Request $request)
    {
        $credentials = $request->only('email-username', 'password');

        // Handle either email or username
        $loginField = filter_var($credentials['email-username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (
            !$token = \Tymon\JWTAuth\Facades\JWTAuth::attempt([
                $loginField => $credentials['email-username'],
                'password' => $credentials['password']
            ])

            
        ) {
            return back()->withErrors(['email-username' => 'Invalid login credentials']);
        }

        // Store token in session
        session(['jwt_token' => $token]);
        $products = Products::all();
       
       
        return view('content.dashboard.dashboards-analytics', compact('products'));
    }
    

 
    public function me()
    {
        return response()->json(auth()->user());
    }

 
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
