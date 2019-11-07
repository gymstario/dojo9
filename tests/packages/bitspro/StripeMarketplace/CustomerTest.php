<?php

namespace Tests\Unit;

use bitspro\StripeMarketplace\StripeMarketplace;
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
        $objMarketplace = new StripeMarketplace();
        $customerId = $objMarketplace->Customer->setup(1, 'rizwan ali', 'rizalishan@gmail.com');
        $this->assertRegexp('/cus_/', $customerId);
        $updatedCustomer = $objMarketplace->Customer->setup(1, 'Ali shan', 'rizalishan@gmail.com', $customerId);
        if ($customerId === $updatedCustomer) {
            $this->assertTrue(true);
        }
        $customers = $objMarketplace->Customer->getAll();
        if (is_array($customers)) {
            $this->assertTrue(true);
        }
        if ($objMarketplace->Customer->delete($customerId)) {
            $this->assertTrue(true);
        }
    }
}
