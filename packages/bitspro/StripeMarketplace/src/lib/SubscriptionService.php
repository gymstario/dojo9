<?php

namespace bitspro\StripeMarketplace\lib;

use Illuminate\Support\Facades\Log;
use Stripe\Subscription;

class SubscriptionService
{
    public static function getAll($limit = 100, $stripeAccountId)
    {
        $options = [
            'limit' => $limit,
        ];
        $subscriptions = Subscription::all($options, ["stripe_account" => $stripeAccountId]);
        $return = [];
        foreach ($subscriptions as $subscription) {
            $return[] = [
                'id' => $subscription['id'],
                'current_period_end' => $subscription['current_period_end'],
                'current_period_start' => $subscription['current_period_start'],
                'customer' => $subscription['customer'],
                'plan' => $subscription['plan'],
                'quantity' => $subscription['quantity'],
                'start_date' => $subscription['start_date'],
                'status' => $subscription['status'],
            ];
        }
        return $return;
    }

    public static function get($id)
    {
        return Subscription::retrieve($id);
    }

    public static function save($customerId, $planId, $stripeAccountId = null, $stripeId = null)
    {
        $data = [
            "customer" => $customerId,
            "items" => [
                ["plan" => $planId],
            ],
        ];
        if ($stripeId == null || $stripeId == '') {
            if ($stripeAccountId === null) {
                $subscription = Subscription::create($data);
            } else {
                $subscription = Subscription::create($data, ["stripe_account" => $stripeAccountId]);
            }
        } else {
            $subscription = Subscription::update($stripeId, $data);
        }

        return $subscription['id'];
    }

    public static function cancel($id)
    {
        $subscription = Subscription::retrieve($id);
        $response = $subscription->cancel();
        return $response['status'];
    }

    public static function delete($id)
    {
        $subscription = Subscription::retrieve($id);
        $response = $subscription->delete();
        return $response['deleted'];
    }
}
