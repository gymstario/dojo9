<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\Plan;

class PlanService
{
    public static function getAll($limit = 100, $stripeAccountId = null)
    {
        $options = [
            'limit' => $limit,
        ];
        if ($stripeAccountId === null) {
            $plans = Plan::all($options);
        } else {
            $plans = Plan::all($options, ["stripe_account" => $stripeAccountId]);
        }
        return $plans;
        $return = [];
        foreach ($plans as $plan) {
            $return[] = [
                'name' => $plan['name'],
                'nickname' => $plan['nickname'],
                'currency' => $plan['currency'],
                'interval' => $plan['interval'],
                'product' => $plan['product'],
                'active' => $plan['active'],
                'interval_count' => $plan['interval_count'],
                'amount' => $plan['amount'],
                'metadata' => $plan['metadata'],

            ];
        }
        return $return;
    }

    public static function get($id)
    {
        $plan = Plan::retrieve($id);
        return [
            'name' => $plan['name'],
            'nickname' => $plan['nickname'],
            'currency' => $plan['currency'],
            'interval' => $plan['interval'],
            'product' => $plan['product'],
            'active' => $plan['active'],
            'interval_count' => $plan['interval_count'],
            'amount' => $plan['amount'],
            'metadata' => $plan['metadata'],
        ];
    }

    public static function save($name, $interval, $product, $interval_count, $amount, $data, $stripeAccountId = null, $stripeId = null)
    {
        $data = [
            'nickname' => $name,
            'currency' => 'USD',
            'interval' => $interval,
            'product' => $product,
            'interval_count' => $interval_count,
            'amount' => $amount,
            'metadata' => $data,
        ];
        if ($stripeId == null || $stripeId == '') {
            if ($stripeAccountId === '') {
                $plan = Plan::create($data);
            } else {
                $plan = Plan::create($data, ["stripe_account" => $stripeAccountId]);
            }
        } else {
            $plan = Plan::update($stripeId, $data);
        }

        return $plan['id'];

    }

    public static function delete($id)
    {
        $plan = Plan::retrieve($id);
        $response = $plan->delete();
        return $response['deleted'];
    }
}
