<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard()->attempt($credentials)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function logout()
    {
        Auth::guard()->logout();
    }
}
