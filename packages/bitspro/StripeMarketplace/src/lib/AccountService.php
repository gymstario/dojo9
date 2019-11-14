<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\Account;

class AccountService
{
    public static function getAll($limit = 100, $stripeId)
    {
        $options = [
            'limit' => $limit,
        ];
        $accounts = Account::all($options);
        $return = [];
        foreach ($accounts as $account) {
            $return[] = [
                'id' => $account['id'],
                'business_type' => $account['business_type'],
                'business_profile' => $account['business_profile'],
                'capabilities' => $account['capabilities'],
                'created' => $account['created'],
                'email' => $account['email'],
                'external_accounts' => $account['external_accounts'],
                'type' => $account['type'],
            ];
        }
        return $return;
    }

    public static function get($id)
    {
        return Account::retrieve($id);
    }

    public static function create(
        $type,
        $firstName,
        $lastName,
        $email,
        $phone,
        $address,
        $mcc = null,
        $business = null,
        $ip = null,
        $ssn = null,
        $stripeId = null) {

        $data = [
            'type' => 'custom',
            'country' => 'US',
            'email' => $email,
            'requested_capabilities' => [
                'card_payments',
                'transfers',
            ],
            "business_type" => $type,
        ];

        if ($type === 'company') {
            $data["business_profile"] = [
                "mcc" => $mcc,
                "name" => $business,
            ];
            $data["company"] = [
                "address" => $address,
                "name" => $business,
                "phone" => $phone,
                "tos_acceptance" => [
                    "date" => time(),
                    "ip" => $ip,
                ],
            ];
        } else {
            $data["individual"] = [
                "address" => $address,
                "first_name" => $firstName,
                "last_name" => $lastName,
                "phone" => $phone,
                "ssn_last_4" => $ssn,
            ];
        }

        if ($stripeId == null || $stripeId == '') {
            $account = Account::create($data);
        } else {
            $account = Account::update($stripeId, $data);
        }

        return $account['id'];

    }

    public static function delete($id)
    {
        $account = Account::retrieve($id);
        $response = $account->delete();
        return $response['deleted'];
    }
}
