<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public static function getAdminProducts()
    {
        $output = [];
        $productIds = Product::all();
        $objStripe = new StripeMarketplaceManager();
        foreach ($productIds as $productId) {
            $product = $objStripe->Product->get($productId->stripe_id);
            $output[] = [
                "id" => $product->id,
                "stripeId" => $product->stripe_id,
                "name" => $product->name,
                "type" => $product->type
            ];
        }
        return $output;
    }

    public static function getOwnerProducts($id)
    {
        $output = [];
        $objStripe = new StripeMarketplaceManager();
        return $objStripe->Product->getAll(100, $id);
    }
}
