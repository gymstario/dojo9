<?php

namespace bitspro\StripeMarketplace\lib;

use Illuminate\Support\Facades\Log;
use Stripe\PaymentMethod;

class PaymentMethodService
{
    public static function save($number, $month, $year, $cvc, $stripeAccountId = null, $stripeId = null)
    {
        try {
            $data = [
                'type' => 'card',
                'card' => [
                    'number' => $number,
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $cvc,
                ],
            ];
            if ($stripeId == null || $stripeId == '') {
                if ($stripeAccountId === '') {
                    $paymentMethod = PaymentMethod::create($data);
                } else {
                    $paymentMethod = PaymentMethod::create($data, ["stripe_account" => $stripeAccountId]);
                }
            } else {
                $paymentMethod = PaymentMethod::update($stripeId, $data);
            }
            return $paymentMethod['id'] !== '' && $paymentMethod['id'] !== null ? $paymentMethod['id'] : false;
        } catch (\Exception $e) {
            Log::error($e);
        }
        return false;
    }

    public static function delete($id)
    {
        $paymentMethod = PaymentMethod::retrieve($id);
        $response = []; // $paymentMethod->delete();
        return $response['deleted'];
    }
}
