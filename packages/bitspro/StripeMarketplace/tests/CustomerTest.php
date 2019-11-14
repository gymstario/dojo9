<?php

namespace Tests\Unit;

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
        $objMarketplace = new StripeMarketplaceManager();
        $productId = $objMarketplace->Product->save(1, 'Product 1', 'admin@justuno.com');
        $this->assertRegexp('/prod_/', $productId);

        $planId = $objMarketplace->Plan->save('Plan 1', 'month', $productId, 1, '20000', [
            "feature1" => "Feature One",
            "feature2" => "Feature two",
        ]);
        $this->assertRegexp('/plan_/', $planId);

        $paymentMethod = $objMarketplace->PaymentMethod->save('4111111111111111', '12', '20', '656');
        $this->assertRegexp('/pm_/', $paymentMethod);

        $customerId = $objMarketplace->Customer->save(1, 'rizwan ali', 'rizalishan@gmail.com', $paymentMethod);
        $this->assertRegexp('/cus_/', $customerId);

        $subscriptionId = $objMarketplace->Subscription->save($customerId, $planId);
        $this->assertRegexp('/sub_/', $subscriptionId);

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
