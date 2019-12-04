<?php

namespace Tests\Unit;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Dojo Admin Creates a product
        $objMarketplace = new StripeMarketplaceManager();
        $productId = $objMarketplace->Product->save(1, 'Product 1');
        $this->assertRegexp('/prod_/', $productId);

        // Dojo Admin Creates a subscription plan
        $planId = $objMarketplace->Plan->save('Plan 1', 'month', $productId, 1, '20000', [
            "feature1" => "Feature One",
            "feature2" => "Feature two",
        ]);
        $this->assertRegexp('/plan_/', $planId);

        // Masters' Payment Method
        $paymentMethod = $objMarketplace->PaymentMethod->save('4111111111111111', '12', '20', '656');
        $this->assertRegexp('/pm_/', $paymentMethod);

        // Masters' Customer creation for Dojo Subscription plan
        $customerId = $objMarketplace->Customer->save(1, 'rizwan ali', 'rizalishan@gmail.com', $paymentMethod, [
            'number' => '4111111111111111',
            'exp_month' => '12',
            'exp_year' => '20',
            'cvc' => '656',
            'object' => 'card',
        ]);
        $this->assertRegexp('/cus_/', $customerId);

        // Master Subscribe to dojo plan
        $subscriptionId = $objMarketplace->Subscription->save($customerId, $planId);
        $this->assertRegexp('/sub_/', $subscriptionId);

        // Master Creates Account at stripe
        $accountId = $objMarketplace->Account->save('company', 'Rizwan', 'Ali', 'rizalishan@gmial.com', '8332914415', 'House G2107', '7911', 'AB Studio', '182.182.57.146', '0000');
        $this->assertRegexp('/acct_/', $accountId);

        $accountId = 'acct_1Fks4oIvTFK6Rh5a';

        // $accountObject = $objMarketplace->Account->get($accountId);
        // $accountId = 'acct_1FkrpYF2ZnzfjEoF';

        // Master Creates a product
        $masterProductId = $objMarketplace->Product->save(1, 'Master Product 1', $accountId);
        $this->assertRegexp('/prod_/', $masterProductId);

        // Master Creates a subscription plan
        $masterPlanId = $objMarketplace->Plan->save('Master Plan 1', 'month', $masterProductId, 1, '20000', [
            "feature1" => "Feature One",
            "feature2" => "Feature two",
        ], $accountId);
        $this->assertRegexp('/plan_/', $masterPlanId);

        // Students' Payment Method
        $studentPaymentMethod = $objMarketplace->PaymentMethod->save('4111111111111111', '12', '20', '656', $accountId);
        $this->assertRegexp('/pm_/', $studentPaymentMethod);

        // Student' Customer creation for Masters' Subscription plan
        $studentCustomerId = $objMarketplace->Customer->save(1, 'Student Ali', 'student@gmail.com', $studentPaymentMethod, [
            'number' => '4111111111111111',
            'exp_month' => '12',
            'exp_year' => '20',
            'cvc' => '656',
            'object' => 'card',
        ], $accountId);
        $this->assertRegexp('/cus_/', $studentCustomerId);

        // Master Subscribe to dojo plan
        $studentSubscriptionId = $objMarketplace->Subscription->save($studentCustomerId, $masterPlanId, $accountId);
        $this->assertRegexp('/sub_/', $studentSubscriptionId);

        /* $updatedCustomer = $objMarketplace->Customer->save(1, 'Ali shan', 'rizalishan@gmail.com', $customerId);
    if ($customerId === $updatedCustomer) {
    $this->assertTrue(true);
    }
    $customers = $objMarketplace->Customer->getAll();
    if (is_array($customers)) {
    $this->assertTrue(true);
    }
    if ($objMarketplace->Customer->delete($customerId)) {
    $this->assertTrue(true);
    } */
    }
}
