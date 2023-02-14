<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function reg_store(Request $request)
    {
        $cek_user  = User::where('email', $request->email)->first();
        if ($cek_user) {
            return redirect('register')->with('ada', 'Email ' . $request->email . ' Sudah Terdaftar');
        } else {
            $user = User::create([
                'username'  => Str::lower((str_replace(' ', '', $request->name))),
                'name'      => $request->name,
                'email'     => $request->email,
                'role_id'   => 2,
                'phone'     => $request->phone,
                'password'  => Hash::make($request->password),
            ]);

            $user->assignRole('user');
        }

        return redirect('login')->with('success', 'Registration Successful, Please Login!');
    }

    public function log_store(Request $request)
    {
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];
        if (auth()->attempt($credentials)) {
            User::where('email', $request->email)->first();
            return redirect('/dashboard');
        }
        return redirect()->back()->with('error', 'Login Failed!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
