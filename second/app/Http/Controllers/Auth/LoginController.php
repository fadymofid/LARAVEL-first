<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function save(LoginFormRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            return redirect()->to('/');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }
}
