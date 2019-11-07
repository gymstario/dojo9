<?php

namespace bitspro\StripeMarketplace;

use Stripe\Customer;

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

    public static function setup($id, $name, $email, $stripeId = null)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'description' => $id,
        ];
        if ($stripeId == null || $stripeId == '') {
            $customer = Customer::create($data);
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
