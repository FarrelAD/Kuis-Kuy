<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $req)
    {
        $credentials = $req->validated();

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('instructor.dashboard')->with('success', 'welcome');
        }

        return response()->json([
            'message' => 'failed to authenticate'
        ]);
    }

    public function showSignup()
    {
        return view('instructor.signup');
    }

    public function signup(Request $req)
    {
        $req->validate([
            'username' => 'required|string|max:255|unique:instructors',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $instructor = Instructor::create([
            'username' => $req->username,
            'password' => Hash::make($req->password)
        ]);

        auth()->login($instructor);

        return redirect()->route('instructor.dashboard');
    }
}
