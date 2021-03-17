<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard()->attempt($credentials)) {
            // Authentication passed...
            return response()->json(['message' => 'Login successful'], 200);
        } else {

            return response()->json(['error' => 'Something went wrong'], 200);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        return response()->json(['message' => 'Logged Out'], 200);
    }
}
