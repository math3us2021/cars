<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class LoginController
    {
        public function index()
        {
            return view('login');
        }

        public function store(Request $request)
        {
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return redirect()->route('login');
            }
            return redirect()->route('cars.index');
        }

        public function logout()
        {
            Auth::logout();
            return to_route('login');
        }
    }
