<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $ob = new StripeMarketplaceManager();
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // ToDo: Add other parameter to verify user.
        // $credentials = array_merge($credentials, ['active' => 1]);

        // if only allow admin then Auth::guard('admin')->attemp($credentials, $remember);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // Auth::loginUsingId(1);
            // Auth::login($user, true);
            return redirect()->intended('dashboard');
        }
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
    }
}
