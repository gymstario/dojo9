<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected function validator(array $data)
    {
        // ToDo: Further validation for registered users.
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->get('remember');
        if (Auth::viaRemember() || Auth::attempt($credentials, $remember === 'on')) {
            $status = Auth::user()->isValidSubscription();
            if ($status === true) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->back()->withInput()->with(['error' => 'Your subscription has ' . $status]);
            }
        }
        return redirect()->back()->withInput()->with(['error' => 'Please enter correct combination of email and password.']);
    }

    /**
     * Handle login form display
     *
     */

    public function showLoginForm()
    {
        if (Auth::viaRemember()) {
            return redirect()->intended('dashboard');
        }
        return view("auth.login");
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
