<?php

namespace bitspro\StripeMarketplace;

use Stripe\Stripe;

class StripeMarketplace
{

    public $Customer;

    /**
     * Load stripe library.
     *
     * @return void
     */
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $this->Customer = new CustomerService();
    }
}
