<?php

namespace bitspro\StripeMarketplace\lib;

use Stripe\Product;

class ProductService
{
    public static function getAll($limit = 100)
    {
        $options = [
            'limit' => $limit,
        ];
        $products = Product::all($options);
        $return = [];
        foreach ($products as $product) {
            $return[] = [
                'name' => $product['name'],
                'type' => $product['type'],
                'description' => $product['description'],
            ];
        }
        return $return;
    }

    public static function get($id)
    {
        $product = Product::retrieve($id);
        return [
            'name' => $product['name'],
            'type' => $product['type'],
            'description' => $product['description'],
        ];
    }

    public static function save($id, $name, $email, $stripeAccountId = '', $stripeId = null)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'description' => $id,
        ];
        if ($stripeId == null || $stripeId == '') {
            if ($stripeAccountId === '') {
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
