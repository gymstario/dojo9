<?php

namespace bitspro\StripeMarketplace\lib;

use Illuminate\Support\Facades\Log;
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
            $plans = Plan::all($options, ['stripe_account' => $stripeAccountId]);
        }
        return $plans;
        $return = [];
        foreach ($plans as $plan) {
            $meta = json_encode($plan['metadata']);
            $return[] = [
                'stripeId' => $plan['id'],
                'name' => $plan['nickname'],
                'currency' => $plan['currency'],
                'interval' => $plan['interval'],
                'product' => $plan['product'],
                'active' => $plan['active'],
                'interval_count' => $plan['interval_count'],
                'amount' => $plan['amount'] / 100,
                'attributes' => json_decode($meta, true)
            ];
        }
        return $return;
    }

    public static function get($id)
    {
        $plan = Plan::retrieve($id);
        $meta = json_encode($plan['metadata']);
        return [
            'stripeId' => $plan['id'],
            'name' => $plan['nickname'],
            'currency' => $plan['currency'],
            'interval' => $plan['interval'],
            'product' => $plan['product'],
            'active' => $plan['active'],
            'interval_count' => $plan['interval_count'],
            'amount' => $plan['amount'] / 100,
            'attributes' => json_decode($meta, true)
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
                $plan = Plan::create($data, ['stripe_account' => $stripeAccountId]);
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
