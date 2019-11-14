<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\PaymentMethod;

class PaymentMethodService
{
    public static function save($number, $month, $year, $cvc)
    {
        $data = [
            'type' => 'card',
            'card' => [
                'number' => $number,
                'month' => $month,
                'year' => $year,
                'cvc' => $cvc,
            ],
        ];
        $paymentMethod = PaymentMethod::create($data);
        return $paymentMethod['id'];

    }

    public static function delete($id)
    {
        $paymentMethod = PaymentMethod::retrieve($id);
        $response = $paymentMethod->delete();
        return $response['deleted'];
    }
}
