<?php

namespace bitspro\StripeMarketplace;

use bitspro\StripeMarketplace;
use Stripe\Stripe;

class StripeMarketplaceManager
{

    public $Customer;
    public $Product;
    public $Plan;
    public $Account;
    public $Subscription;
    public $PaymentMethod;

    /**
     * Load stripe library.
     *
     * @return void
     */
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $this->Customer = new lib\CustomerService();
        $this->Product = new lib\ProductService();
        $this->Plan = new lib\PlanService();
        $this->Account = new lib\AccountService();
        $this->Subscription = new lib\SubscriptionService();
        $this->PaymentMethod = new lib\PaymentMethodService();
    }
}
