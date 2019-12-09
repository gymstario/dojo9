<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\Customer;
use Illuminate\Support\Facades\Log;
use Stripe\Token;

class CustomerService
{
    public static function getAll($email = null, $limit = 100, $stripeAccountId = null)
    {
        $options = [
            'limit' => $limit,
        ];
        if ($email !== null && $email !== '') {
            $options['email'] = $email;
        }
        $customers = Customer::all($options, ["stripe_account" => $stripeAccountId]);
        $return = [];
        foreach ($customers as $customer) {
            $return[] = [
                'name' => $customer['name'],
                'email' => $customer['email'],
                'description' => $customer['description'],
            ];
        }
        return $return;
    }

    public static function get($id, $stripeAccountId = null)
    {
        $customer = Customer::retrieve($id, ["stripe_account" => $stripeAccountId]);
        return [
            'id' => $customer['id'],
            'name' => $customer['name'],
            'email' => $customer['email'],
            'description' => $customer['description'],
            'subscriptions' => $customer['subscriptions']['data'],
            'sources' => $customer['sources']['data']
        ];
    }

    public static function save($name, $email, $source, $stripeAccountId = null, $stripeId = null)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'source' => $source,
        ];
        if ($stripeId == null || $stripeId == '') {
            $customer = Customer::create($data, ["stripe_account" => $stripeAccountId]);
        } else {
            $customer = Customer::update($stripeId, $data, ["stripe_account" => $stripeAccountId]);
        }

        return $customer['id'];
    }

    public static function delete($id, $stripeAccountId = null)
    {
        $customer = Customer::retrieve($id, ["stripe_account" => $stripeAccountId]);
        $response = $customer->delete();
        return $response['deleted'];
    }
}
