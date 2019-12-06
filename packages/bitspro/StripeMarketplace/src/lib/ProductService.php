<?php

namespace bitspro\StripeMarketplace\lib;

use Illuminate\Support\Facades\Log;
use Stripe\Product;

class ProductService
{
    public static function getAll($limit = 100, $stripeAccountId = null)
    {
        try {
            $options = [
                'limit' => $limit,
            ];

            if ($stripeAccountId == null || $stripeAccountId == '') {
                $products = Product::all($options, ["stripe_account" => null]);
            } else {
                $products = Product::all($options, ["stripe_account" => $stripeAccountId]);
            }

            return $products;

            $return = [];
            foreach ($products as $product) {
                $return[] = [
                    'name' => $product['name'],
                    'type' => $product['type'],
                ];
            }
            return $return;
        } catch (\Exception $e) {
            Log::error($e);
        }
        return false;
    }

    public static function get($id)
    {
        try {
            $product = Product::retrieve($id);
            return [
                'name' => $product['name'],
                'type' => $product['type'],
            ];
        } catch (\Exception $e) {
            Log::error($e);
        }
        return false;
    }

    public static function save($name, $type, $stripeAccountId = null, $stripeId = null)
    {
        try {
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
            return $product['id'] !== '' && $product['id'] !== null ? $product['id'] : false;
        } catch (\Exception $e) {
            Log::error($e);
        }
        return false;
    }

    public static function delete($id)
    {
        $product = Product::retrieve($id);
        $response = $product->delete();
        return $response['deleted'];
    }
}
