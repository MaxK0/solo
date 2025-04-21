<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginStore(LoginRequest $request)
    {
        $data = $request->validated();

        if (! auth()->attempt($data)) {
            return back()->withErrors([
                'password' => 'Неверный логин или пароль'
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
