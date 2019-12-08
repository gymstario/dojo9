<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\Customer;
use Illuminate\Support\Facades\Log;
use Stripe\Token;

class CustomerService
{
    public static function getAll($email = null, $limit = 100)
    {
        $options = [
            'limit' => $limit,
        ];
        if ($email !== null && $email !== '') {
            $options['email'] = $email;
        }
        $customers = Customer::all($options);
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

    public static function get($id)
    {
        $customer = Customer::retrieve($id);
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
            if ($stripeAccountId === '') {
                $customer = Customer::create($data);
            } else {
                $customer = Customer::create($data, ["stripe_account" => $stripeAccountId]);
            }
        } else {
            $customer = Customer::update($stripeId, $data);
        }

        return $customer['id'];
    }

    public static function delete($id)
    {
        $customer = Customer::retrieve($id);
        $response = $customer->delete();
        return $response['deleted'];
    }
}
