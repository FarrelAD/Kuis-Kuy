<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorLoginRequest;
use App\Http\Requests\InstructorSignupRequest;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class InstructorAuthController extends Controller
{
    public function login(InstructorLoginRequest $req)
    {
        $credentials = $req->validated();

        if (Auth::guard('instructor')->attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('instructor.dashboard');
        }

        return response()->json([
            'message' => 'Gagal login! Tidak ditemukan pengguna yang cocok!'
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function showSignup()
    {
        return view('instructor.signup');
    }

    public function signup(InstructorSignupRequest $req)
    {
        $credentials = $req->validated();
        $credentials['password'] = Hash::make($credentials['password']);

        $instructor = Instructor::create($credentials);

        Auth::guard('instructor')->login($instructor);

        return redirect()->route('instructor.dashboard');
    }
}
