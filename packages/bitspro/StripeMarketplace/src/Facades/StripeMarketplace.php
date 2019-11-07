<?php

namespace bitspro\StripeMarketplace\Facades;

use Illuminate\Support\Facades\Facade;

class StripeMarketplace extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'stripemarketplace';
    }
}
