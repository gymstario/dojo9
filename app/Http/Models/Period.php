<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'classes';

    public function branch()
    {
        return $this->belongsTo('App\Http\Models\Period');
    }

    public function class_member()
    {
        return $this->hasMany('App\Models\Class_Member');
    }

    public static function getAll($storeId, $branchId = null)
    {
        $query = Period::where('studio_id', $storeId);

        if ($branchId !== null) {
            $query->where('branch_id', $branchId);
        }

        return $query->get()->all();
    }

    public static function add($data, $stripeAccount)
    {
        $objPeriod = new Period;
        $objPeriod->studio_id = $data['studio'];
        $objPeriod->branch_id = $data['branch'];
        $objPeriod->name = $data['name'];
        $objPeriod->start = $data['start'];
        $objPeriod->end = $data['end'];
        $objPeriod->days = implode(',', $data['days']);
        if ($objPeriod->save()) {
            $objStripe = new StripeMarketplaceManager();
            $productId = $objStripe->Product->save($data['name'] . '(Class)', 'service', $stripeAccount);
            $objPeriod->stripe_product_id = $productId;
            $objPeriod->save();
            return $objPeriod;
        }
        return false;
    }
}
