<?php

namespace App\Http\Controllers;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
        if (!Gate::allows('is-owner')) {
            return redirect()->route('dashboard.get');
        }
    }

    public function index()
    {
        $objStripe = new StripeMarketplaceManager();
        $subscriptions = $objStripe->Subscription->getAll(100, auth()->user()->member->studio->stripe_account_id);
        dd($subscriptions);
        return view('payments.list');
    }
}
