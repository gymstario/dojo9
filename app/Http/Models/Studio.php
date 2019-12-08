<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use bitspro\StripeMarketplace\StripeMarketplaceManager;

class Studio extends Model
{
    protected $table = 'studios';

    public function member()
    {
        return $this->belongsTo('App\Http\Models\Member');
    }

    public function branch()
    {
        return $this->hasMany('App\Http\Models\branch');
    }

    public static function add($data)
    {
        $objStripe = new StripeMarketplaceManager();
        $accountId = $objStripe->Account->saveCompany($data['studio']);
        if ($accountId === false) {
            return false;
        }
        $objStripe->Account->savePerson($data['owner'], $accountId);
        $objStudio = new Studio;
        $objStudio->member_id = $data['studio']['memberId'];
        $objStudio->name = $data['studio']['name'];
        $objStudio->phone = $data['studio']['phone'];
        $objStudio->email = $data['studio']['email'];
        $objStudio->address = $data['studio']['address'];
        $objStudio->city = $data['studio']['city'];
        $objStudio->state = $data['studio']['state'];
        $objStudio->zip = $data['studio']['zip'];
        $objStudio->country = $data['studio']['country'];
        $objStudio->tax_id = $data['studio']['tax'];
        $objStudio->mcc = $data['studio']['mcc'];
        $objStudio->description = $data['studio']['description'];
        $objStudio->url = $data['studio']['url'];
        $objStudio->stripe_account_id = $accountId;

        $objStudio->date = $data['studio']['date'];
        $objStudio->ip = $data['studio']['ip'];
        $objStudio->strip_account_id = $accountId;
        if ($objStudio->save()) {
            return $objStudio;
        }
        return false;
    }

    public static function setupStudio($data, $userId)
    {
        $data['owner']['userId'] = $userId;
        $data['owner']['type'] = 'owner';
        $data['owner']['enrolment'] = $data['studio']['date'];
        $data['owner']['phone'] = '(555) 555-1234';
        $data['owner']['state'] = 'AZ';
        $data['owner']['zip'] = '99501';
        $data['studio']['phone'] = '(555) 555-1234';
        $data['studio']['state'] = 'AZ';
        $data['studio']['zip'] = '99501';
        $objMember = Member::add($data['owner']);
        if ($objMember !== false) {
            $data['studio']['memberId'] = $objMember->id;
            $objStudio = Studio::add($data);
            if ($objStudio !== false) {
                return true;
            }
        }
        return false;
    }

    public function checkVerificationStatus()
    {
        $reasons = [];
        $objStripe = new StripeMarketplaceManager();
        $account = $objStripe->Account->get($this->stripe_account_id);
        if ($account->charges_enabled === false || $account->charges_enabled === false) {
            foreach ($account->requirements->currently_due as $requirement) {
                $reasons[] = str_replace('stripe.', '', __('stripe' . '.' . $requirement));
            }
            return ['messages' => $reasons, 'id' => $this->id];
        }
        return true;
    }
}
