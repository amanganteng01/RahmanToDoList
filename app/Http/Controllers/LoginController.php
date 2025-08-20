<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('login.login');
    }

    public function auth(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validasi)){
            return redirect()->intended(route('homepage'))->with('success', 'Login successful');
        } else {
            return redirect()->back()->with('danger', 'Can not Login, please check your username and password again');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Logout successfuly');
    }

    public function viewregis()
    {
        return view('login.register');
    }

    public function SignIn(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $validasi['password'] = bcrypt($validasi['password']);
        User::create($validasi);

        return redirect(route('login'))->with('success', 'Registration successful, please login');
    }
}
