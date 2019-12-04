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

    public static function save(
        $type,
        $firstName,
        $lastName,
        $email,
        $phone,
        $address,
        $mcc = null, // dance_hall_studios_schools
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
            "tos_acceptance" => [
                "date" => 1547923073,
                "ip" => "172.18.80.19",
            ],
            /* "external_account" => [
            "object" => "bank_account",
            "country" => 'US',
            "currency" => "usd",
            "routing_number" => "110000000",
            "account_number" => "000123456789",
            ], */
            "business_profile" => [
                "mcc" => $mcc,
                "name" => $business,
                "support_email" => "riz@bitspro.com",
                "support_phone" => $phone,
                "url" => "https://www.bitspro.com",
            ],
            "company" => [
                "tax_id" => "000000000",
                "address" => [
                    "country" => "US",
                    "line1" => "123 State St",
                    "city" => "Schenectady",
                    "state" => "NY",
                    "postal_code" => 12345,
                ],
                "name" => "The Best Cookie Co",
                "phone" => $phone,
                "tax_id" => 000000000,
            ],
        ];

        /* if ($type === 'company') {
        $data["business_profile"] = [
        "mcc" => $mcc,
        "name" => $business,
        "support_email" => "riz@bitspro.com",
        "support_phone" => $phone,
        "url" => "https://www.bitspro.com",
        ];
        $data["company"] = [
        "tax_id" => "000000000",
        "address" => [
        "country" => "US",
        "line1" => "123 State St",
        "city" => "Schenectady",
        "state" => "NY",
        "postal_code" => 12345,
        ],
        "name" => "The Best Cookie Co",
        "phone" => "12345678",
        "tax_id" => 000000000,
        "external_account" => [
        "object" => "bank_account",
        "country" => 'US',
        "currency" => "usd",
        "routing_number" => "110000000",
        "account_number" => "000123456789",
        ],
        "tos_acceptance" => [
        "date" => 1547923073,
        "ip" => "172.18.80.19",
        ],
        "verification" => [
        "document" => [
        "front" => "file_identity_document_success",
        "back" => "file_identity_document_success",
        ],
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
        } */

        if ($stripeId == null || $stripeId == '') {
            $account = Account::create($data);
        } else {
            $account = Account::update($stripeId, $data);
        }

        Account::createPerson($account['id'], [
            "first_name" => "Jenny",
            "last_name" => "Rosen",
            "relationship" => [
                "representative" => true,
                "executive" => true,
                "title" => "CEO",
            ],
            "address" => [
                "country" => "US",
                "line1" => "123 State St",
                "city" => "Schenectady",
                "state" => "NY",
                "postal_code" => 12345,
            ],
            "dob" => [
                "day" => 10,
                "month" => 11,
                "year" => 1980,
            ],
            "id_number" => "000000000",
            "phone" => $phone,
            "email" => "jenny@cookies.com",
        ]);

        Account::createPerson($account['id'], [
            "first_name" => "Kathleen",
            "last_name" => "Banks",
            "relationship" => [
                "owner" => true,
                "percent_ownership" => 100,
            ],
            "address" => [
                "country" => "US",
                "line1" => "123 State St",
                "city" => "Schenectady",
                "state" => "NY",
                "postal_code" => 12345,
            ],
            "dob" => [
                "day" => 10,
                "month" => 11,
                "year" => 1980,
            ],
            "id_number" => "000000000",
            "phone" => $phone,
            "email" => "jenny@cookies.com",
        ]);

        /* Account::createPerson($account['id'], [
        "first_name" => "Kathleena",
        "last_name" => "Banks",
        "relationship" => [
        "executive" => true,
        ],
        "address" => [
        "country" => "US",
        "line1" => "123 State St",
        "city" => "Schenectady",
        "state" => "NY",
        "postal_code" => 12345,
        ],
        "dob" => [
        "day" => 10,
        "month" => 11,
        "year" => 1980,
        ],
        "id_number" => "000000000",
        "phone" => $phone,
        "email" => "jennya@cookies.com",
        ]); */

        return $account['id'];

    }

    public static function delete($id)
    {
        $account = Account::retrieve($id);
        $response = $account->delete();
        return $response['deleted'];
    }
}
