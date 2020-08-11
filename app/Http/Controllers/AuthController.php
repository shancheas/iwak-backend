<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $admin;
    private $student;

    public function __construct()
    {
        $this->admin = app(User::class);
        $this->student = app(Student::class);
    }

    public function authAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = auth('admin')->attempt($credentials);
        return $this->auth($token);
    }

    public function authStudent(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);
        return $this->auth($token);
    }

    private function auth($token)
    {
        if (!$token)
            return response(['message' => 'Username atau Password salah!'], 401);

        return response([
            'message' => 'Login berhasil',
            'token' => $token
        ], 200, [
            'Authorization' => 'Bearer ' . $token
        ]);
    }
}
