<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index() {

        return view('login.login');

    }

    public function store(LoginRequest $request) {

        $validated = $request->validated();

        if(!Auth::attempt($validated, $request->boolean('remember'))) {

            throw ValidationException::withMessages([
                'login' => 'Користувача не знайдено'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended();

    }

    public function destroy(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');

    }
}
