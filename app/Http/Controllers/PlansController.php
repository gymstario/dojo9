<?php

namespace App\Http\Controllers;

use App\Http\Models\Plan;
use App\Http\Models\Product;
use App\Http\Requests\CreatePlanRequest;

class PlansController extends Controller
{
    public function index()
    {
        if (auth()->user()->member === null) {
            return redirect()->route('studio.get');
        }
        $id = auth()->user()->member->studio->stripe_account_id;
        $plans = Plan::getOwnerPlans($id);
        $products = [];
        foreach (Product::getOwnerProducts($id) as $item) {
            $products[$item['id']] = $item['name'];
        }
        return view('plans.list', ['plans' => $plans, 'products' => $products]);
    }

    public function postPlan(CreatePlanRequest $request)
    {
        try {
            $data = $request->all();
            $tmp = [];
            foreach ($data['attributes']['name'] as $key => $name) {
                $tmp[$name] = $data['attributes']['value'][$key];
            }
            $data['attributes'] = $tmp;
            $plan = Plan::add($data, auth()->user()->member->studio->stripe_account_id);
            if ($plan !== null) {
                return redirect()->back()->with(['success' => 'You have added the plan successfully.']);
            }
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        }
    }

    public function getAdminPlans()
    {
        $plans = Plan::getAdminPlans();
        return view("auth.plans", ["plans" => $plans]);
    }
}
