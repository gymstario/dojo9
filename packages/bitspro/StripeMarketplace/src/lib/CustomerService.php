<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\Customer;
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
            'name' => $customer['name'],
            'email' => $customer['email'],
            'description' => $customer['description'],
        ];
    }

    public static function save($id, $name, $email, $payment_method, $source, $stripeAccountId = null, $stripeId = null)
    {

        $token = Token::create([
            'card' => $source,
        ]);

        $data = [
            'name' => $name,
            'email' => $email,
            'description' => $id,
            'payment_method' => $payment_method,
            'source' => $token['id'],
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
