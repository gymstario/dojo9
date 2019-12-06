<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Plan;
use App\Http\Models\Product;

class PlanController extends Controller
{
    private $objStripManager = null;
    public function __construct()
    { }

    /**
     * Handle plans form display
     *
     */

    public function getPlans()
    {
        $plans = Plan::getAdminPlans();
        return view("auth.plans", ["plans" => $plans]);
    }
}
