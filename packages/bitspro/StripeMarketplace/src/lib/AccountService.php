<?php

namespace bitspro\StripeMarketplace\lib;

use Carbon\Carbon;
use Stripe\Account;
use Stripe\File;

class AccountService
{
    public static function getAll($limit = 100)
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

    public static function getStudioUpdates($id)
    {
        $account = Account::retrieve($id);
        $return = [];
        foreach ($account->external_accounts->data as $bank) {
            $return[] = [
                'id' => $bank->id,
                'account' => $bank->last4,
                'name' => $bank->bank_name,
                'currency' => $bank->currency,
                'routing' => $bank->routing_number,
            ];
        }
        if ($account->business_type === 'individual') {
            return [
                "verficiationStatus" => $account->individual->verification->status,
                "banks" => $return,
            ];
        } else {
            return [
                "verficiationStatus" => $account->business->verification->status,
                "banks" => $return,
            ];
        }
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
        $stripeId = null
    ) {

        $data = [
            'type' => 'custom',
            'country' => 'US',
            'email' => $email,
            'requested_capabilities' => [
                'card_payments',
                'transfers',
            ],
            'business_type' => $type,
            'tos_acceptance' => [
                'date' => 1547923073,
                'ip' => '172.18.80.19',
            ],
            /* 'external_account' => [
            'object' => 'bank_account',
            'country' => 'US',
            'currency' => 'usd',
            'routing_number' => '110000000',
            'account_number' => '000123456789',
            ], */
            'business_profile' => [
                'mcc' => $mcc,
                'name' => $business,
                'support_email' => 'riz@bitspro.com',
                'support_phone' => $phone,
                'url' => 'https://www.bitspro.com',
            ],
            'company' => [
                'tax_id' => '000000000',
                'address' => [
                    'country' => 'US',
                    'line1' => '123 State St',
                    'city' => 'Schenectady',
                    'state' => 'NY',
                    'postal_code' => 12345,
                ],
                'name' => 'The Best Cookie Co',
                'phone' => $phone,
                'tax_id' => 000000000,
            ],
        ];

        /* if ($type === 'company') {
        $data['business_profile'] = [
        'mcc' => $mcc,
        'name' => $business,
        'support_email' => 'riz@bitspro.com',
        'support_phone' => $phone,
        'url' => 'https://www.bitspro.com',
        ];
        $data['company'] = [
        'tax_id' => '000000000',
        'address' => [
        'country' => 'US',
        'line1' => '123 State St',
        'city' => 'Schenectady',
        'state' => 'NY',
        'postal_code' => 12345,
        ],
        'name' => 'The Best Cookie Co',
        'phone' => '12345678',
        'tax_id' => 000000000,
        'external_account' => [
        'object' => 'bank_account',
        'country' => 'US',
        'currency' => 'usd',
        'routing_number' => '110000000',
        'account_number' => '000123456789',
        ],
        'tos_acceptance' => [
        'date' => 1547923073,
        'ip' => '172.18.80.19',
        ],
        'verification' => [
        'document' => [
        'front' => 'file_identity_document_success',
        'back' => 'file_identity_document_success',
        ],
        ],

        ];
        } else {
        $data['individual'] = [
        'address' => $address,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'phone' => $phone,
        'ssn_last_4' => $ssn,
        ];
        } */

        if ($stripeId == null || $stripeId == '') {
            $account = Account::create($data);
        } else {
            $account = Account::update($stripeId, $data);
        }

        Account::createPerson($account['id'], [
            'first_name' => 'Kathleen',
            'last_name' => 'Banks',
            'relationship' => [
                'owner' => true,
                'percent_ownership' => 100,
                'title' => 'CEO',
                'representative' => true,
                'executive' => true,
            ],
            'address' => [
                'country' => 'US',
                'line1' => '123 State St',
                'city' => 'Schenectady',
                'state' => 'NY',
                'postal_code' => 12345,
            ],
            'dob' => [
                'day' => 10,
                'month' => 11,
                'year' => 1980,
            ],
            'id_number' => '000000000',
            'phone' => $phone,
            'email' => 'jenny@cookies.com',
        ]);

        /* Account::createPerson($account['id'], [
        'first_name' => 'Kathleena',
        'last_name' => 'Banks',
        'relationship' => [
        'executive' => true,
        ],
        'address' => [
        'country' => 'US',
        'line1' => '123 State St',
        'city' => 'Schenectady',
        'state' => 'NY',
        'postal_code' => 12345,
        ],
        'dob' => [
        'day' => 10,
        'month' => 11,
        'year' => 1980,
        ],
        'id_number' => '000000000',
        'phone' => $phone,
        'email' => 'jennya@cookies.com',
        ]); */

        return $account['id'];
    }

    public static function saveFile($path, $purpose = 'identity_document')
    {
        $fp = fopen($path, 'r');
        $file = File::create([
            'purpose' => $purpose,
            'file' => $fp,
        ]);
        return $file['id'];
    }

    public static function saveCompany($input, $stripeId = null)
    {
        $data = [
            'email' => $input['email'],
            'requested_capabilities' => [
                'card_payments',
                'transfers',
            ],
            'business_type' => 'company',
            'business_profile' => [
                'mcc' => $input['mcc'],
                'name' => $input['name'],
                'support_email' => $input['email'],
                'support_phone' => $input['phone'],
                'url' => $input['url'],
            ],
            'company' => [
                'tax_id' => $input['tax'],
                'address' => [
                    'country' => $input['country'],
                    'line1' => $input['address'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'postal_code' => $input['zip'],
                ],
                'name' => $input['name'],
                'phone' => $input['phone'],
            ],
        ];
        if (isset($input['frontPath'])) {
            $frontId = AccountService::saveFile($input['frontPath']);
            $backId = AccountService::saveFile($input['frontPath']);
            $datadata['company']['verification'] = [
                'document' => [
                    'front' => $frontId,
                    'back' => $backId,
                ],
            ];
        }

        if (isset($input['routing']) && isset($input['account'])) {
            $data['external_account'] = [
                'object' => 'bank_account',
                'country' => $input['country'],
                'currency' => 'usd',
                'routing_number' => $input['routing'],
                'account_number' => $input['account'],
            ];
        }

        if ($stripeId == null || $stripeId == '') {
            $data['tos_acceptance'] = [
                'date' => time(),
                'ip' => $input['ip'],
            ];
            $data['type'] = 'custom';
            $data['country'] = $input['country'];
            $account = Account::create($data);
        } else {
            $account = Account::update($stripeId, $data);
        }
        return $account['id'];
    }

    public static function saveSoleProprietor($input, $business, $stripeId = null)
    {
        $input['dob'] = Carbon::parse($input['dob']);
        $data = [
            'email' => $input['email'],
            'requested_capabilities' => [
                'card_payments',
                'transfers',
            ],
            'business_type' => 'individual',
            'business_profile' => [
                'mcc' => $business['mcc'],
                'name' => $business['name'],
                'support_email' => $input['email'],
                'support_phone' => $input['phone'],
                'url' => $business['url'],
            ],
            'individual' => [
                'first_name' => $input['firstName'],
                'last_name' => $input['lastName'],

                'address' => [
                    'country' => $input['country'],
                    'line1' => $input['address'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'postal_code' => $input['zip'],
                ],
                'dob' => [
                    'day' => $input['dob']->day,
                    'month' => $input['dob']->month,
                    'year' => $input['dob']->year,
                ],
                'phone' => $input['phone'],
                'email' => $input['email'],
            ],
        ];

        if (isset($input['frontPath'])) {
            $frontId = AccountService::saveFile($input['frontPath']);
            $backId = AccountService::saveFile($input['frontPath']);
            $data['individual']['verification'] = [
                'document' => [
                    'front' => $frontId,
                    'back' => $backId,
                ],
            ];
        }
        if (isset($business['routing']) && isset($business['account'])) {
            $data['external_account'] = [
                'object' => 'bank_account',
                'country' => $input['country'],
                'currency' => 'usd',
                'routing_number' => $business['routing'],
                'account_number' => $business['account'],
            ];
        }
        if ($stripeId == null || $stripeId == '') {
            $data['tos_acceptance'] = [
                'date' => time(),
                'ip' => $input['ip'],
            ];
            $data['individual']['id_number'] = $input['ssn'];
            $data['individual']['ssn_last_4'] = substr($input['ssn'], -4);
            $data['type'] = 'custom';
            $data['country'] = $input['country'];
            $account = Account::create($data);
        } else {
            $account = Account::update($stripeId, $data);
        }
        return $account['id'];
    }

    public static function savePerson($input, $accountId)
    {
        $frontId = AccountService::saveFile($input['frontPath']);
        $backId = AccountService::saveFile($input['frontPath']);

        $relationship = [
            'owner' => true,
            'percent_ownership' => 100,
            'title' => $input['title'],
            'representative' => true,
            'executive' => true,
        ];
        $input['dob'] = Carbon::parse($input['dob']);

        $person = Account::createPerson($accountId, [
            'first_name' => $input['firstName'],
            'last_name' => $input['lastName'],
            'relationship' => $relationship,
            'address' => [
                'country' => $input['country'],
                'line1' => $input['address'],
                'city' => $input['city'],
                'state' => $input['state'],
                'postal_code' => $input['zip'],
            ],
            'dob' => [
                'day' => $input['dob']->day,
                'month' => $input['dob']->month,
                'year' => $input['dob']->year,
            ],
            'id_number' => $input['ssn'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'verification' => [
                'document' => [
                    'front' => $frontId,
                    'back' => $backId,
                ],
            ],
        ]);
        return $person['id'];
    }

    public static function delete($id)
    {
        $account = Account::retrieve($id);
        $response = $account->delete();
        return $response['deleted'];
    }
}
