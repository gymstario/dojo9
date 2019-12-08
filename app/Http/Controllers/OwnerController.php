<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
// use bitspro\StripeMarketplace\StripeMarketplaceManager;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
    }

    public function dashboard()
    {
        if (!Gate::allows('is-owner')) {
            return redirect('401');
        }
        return view('owner.dashboard');
    }

    public function setup()
    {
        if (!Gate::allows('is-owner')) {
            return redirect('401');
        }
        return view('owner.setup');
    }

    public function setting()
    {
        if (!Gate::allows('is-owner')) {
            return redirect('401');
        }
        return view('owner.setting');
    }
}
