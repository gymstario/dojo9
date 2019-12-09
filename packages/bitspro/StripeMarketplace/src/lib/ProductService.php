<?php

namespace bitspro\StripeMarketplace\lib;

use Illuminate\Support\Facades\Log;
use Stripe\Product;

class ProductService
{
    public static function getAll($limit = 100, $stripeAccountId = null)
    {
        $options = [
            'limit' => $limit,
        ];

        $products = Product::all($options, ["stripe_account" => $stripeAccountId]);
        $return = [];
        foreach ($products as $product) {
            $return[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'type' => $product['type'],
            ];
        }
        return $return;
    }

    public static function get($id, $stripeAccountId = null)
    {
        $product = Product::retrieve($id, ["stripe_account" => $stripeAccountId]);
        return [
            'id' => $product['id'],
            'name' => $product['name'],
            'type' => $product['type'],
        ];
    }

    public static function save($name, $type, $stripeAccountId = null, $stripeId = null)
    {
        $data = [
            'name' => $name,
            'type' => $type,
        ];
        if ($stripeId == null || $stripeId == '') {
            if ($stripeAccountId === null) {
                $product = Product::create($data);
            } else {
                $product = Product::create($data, ["stripe_account" => $stripeAccountId]);
            }
        } else {
            $product = Product::update($stripeId, $data);
        }
        return $product['id'];
    }

    public static function delete($id)
    {
        $product = Product::retrieve($id);
        $response = $product->delete();
        return $response['deleted'];
    }
}
