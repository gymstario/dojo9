<?php

namespace App\Http\Controllers;

use App\Http\Models\Plan;
use App\Http\Models\Product;
use bitspro\StripeMarketplace\StripeMarketplaceManager;

class AdminController extends Controller
{
    private $objStripManager = null;

    public function __construct()
    {
        // $this->middleware('auth');
        $this->objStripManager = new StripeMarketplaceManager();
    }

    public function setup()
    {
        $productId = $this->objStripManager->Product->save('Dojo', 'service');
        $product = new Product;
        $product->stripe_id = $productId;
        $product->type = 'gymstar';
        $product->save();
        $planId = $this->objStripManager->Plan->save('Promotional Plan', 'month', $productId, 1, 20000, [
            "Classes" => '*',
            "Students" => '*',
            "Annoucements" => '*',
            'Push Notifications' => '*',
            'Staff Management' => '*',
        ]);
        $plan = new Plan;
        $plan->stripe_id = $planId;
        $plan->role = 'owner';
        $plan->save();

        /* $planId = $this->objStripManager->Plan->save('Dojo Plan 2', 'month', $productId, 1, 30000, [
    "Branches" => 5,
    "Classes" => 50,
    "Students" => -1,
    ]);
    $plan = new Plan;
    $plan->role = 'owner';
    $plan->stripe_id = $planId;
    $plan->save();

    $planId = $this->objStripManager->Plan->save('Dojo Plan 2', 'month', $productId, 1, 50000, [
    "Branches" => -1,
    "Classes" => -1,
    "Students" => -1,
    ]);
    $plan = new Plan;
    $plan->role = 'owner';
    $plan->stripe_id = $planId;
    $plan->save(); */
    }
}
