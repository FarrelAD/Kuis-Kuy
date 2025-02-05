<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
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
