<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $table = 'branches';

    public function store()
    {
        return $this->belongsTo('App\Http\Models\Store');
    }

    public static function getOwnerBranches($id)
    {
        return Branch::where('studio_id', $id)->get()->all();
    }

    public static function add($data, $stripeAccount)
    {
        $objBranch = new Branch;
        $objBranch->studio_id = $data['studio'];
        $objBranch->name = $data['name'];
        $objBranch->email = $data['email'];
        $objBranch->phone = $data['phone'];
        $objBranch->address = $data['address'];
        $objBranch->city = $data['city'];
        $objBranch->state = $data['state'];
        $objBranch->zip = $data['zip'];
        if ($objBranch->save()) {
            $objStripe = new StripeMarketplaceManager();
            $productId = $objStripe->Product->save($data['name'] . '(Branch)', 'service', $stripeAccount);
            $objBranch->stripe_product_id = $productId;
            $objBranch->save();
            return $objBranch;
        }
        return false;
    }
}
