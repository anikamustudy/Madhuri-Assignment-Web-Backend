<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Login method
    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            $message = "User logged in successfully";
            $user = Auth::user();

            // Generate token for user session (optional)
            $token = $user->createToken('auth_token')->plainTextToken;

            // You can perform additional actions here, such as logging the user's login activity

            // Return a success response with user data and token
            return response()->json(['message' => $message,'user' => $user, 'token' => $token], 200);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}