<?php

namespace bitspro\StripeMarketplace\lib;

use Illuminate\Support\Facades\Log;
use Stripe\PaymentMethod;

class PaymentMethodService
{
    public static function save($number, $month, $year, $cvc, $stripeAccountId = null, $stripeId = null)
    {
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
            $paymentMethod = PaymentMethod::create($data, ["stripe_account" => $stripeAccountId]);
        } else {
            $paymentMethod = PaymentMethod::update($stripeId, $data);
        }
        return $paymentMethod['id'];
    }
}
