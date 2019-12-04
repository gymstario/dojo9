<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    private $objStripManager = null;
    public function __construct()
    {
        $this->objStripManager = new StripeMarketplaceManager();
    }

    /**
     * Handle plans form display
     *
     */

    public function getPlans()
    {
        $data = $this->objStripManager->Plan->getAll();
        dd($data);
        return view("auth.plans");
    }
}
