<?php

namespace App\Http\Controllers;

// use bitspro\StripeMarketplace\StripeMarketplaceManager;

class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $obj = new StripeMarketplaceManager();
        // $this->middleware('auth:api')

        // ToDo: If you want to redo the authentication
        // $this->middleware(['auth', 'password.confirm']);
        // $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setup()
    {
        // Gate::allows('is-admin')
        return view('home');
    }
}
