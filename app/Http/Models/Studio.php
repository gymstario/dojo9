<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

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

    public function stripe()
    {
        $objStripe = new StripeMarketplaceManager();
        return $objStripe->Account->getStudioUpdates($this->stripe_account_id);
    }

    public static function createStudio($data)
    {
        $type = 'studio';
        $objStripe = new StripeMarketplaceManager();
        if ($data['studio']['type'] !== 'Sole Proprietor') {
            $accountId = $objStripe->Account->saveCompany($data['studio']);
            $objStripe->Account->savePerson($data['owner'], $accountId);
            $type = 'studio';
        } else {
            $accountId = $objStripe->Account->saveSoleProprietor($data['owner'], $data['studio']);
            $type = 'owner';
        }
        if ($accountId === false) {
            return false;
        }
        $objStripe->Product->save($data['studio']['name'] . '(Studio)', 'service');
        $objStudio = new Studio;
        $objStudio->member_id = $data['studio']['memberId'];
        $objStudio->name = $data['studio']['name'];
        $objStudio->phone = $data[$type]['phone'];
        $objStudio->email = $data[$type]['email'];
        $objStudio->address = $data[$type]['address'];
        $objStudio->city = $data[$type]['city'];
        $objStudio->state = $data[$type]['state'];
        $objStudio->zip = $data[$type]['zip'];
        $objStudio->country = $data[$type]['country'];
        $objStudio->tax_id = $data['studio']['tax'];
        $objStudio->mcc = $data['studio']['mcc'];
        $objStudio->description = $data['studio']['description'];
        $objStudio->url = $data['studio']['url'];
        $objStudio->stripe_account_id = $accountId;

        $objStudio->date = $data['studio']['date'];
        $objStudio->ip = $data['studio']['ip'];
        $objStudio->stripe_account_id = $accountId;
        if ($objStudio->save()) {
            return $objStudio;
        }
        return false;
    }

    public static function updateStudio($data, $objStudio)
    {
        $type = 'studio';
        $objStripe = new StripeMarketplaceManager();
        if ($data['studio']['type'] !== 'Sole Proprietor') {
            $accountId = $objStripe->Account->saveCompany($data['studio'], $objStudio->stripe_account_id);
            $objStripe->Account->savePerson($data['owner'], $accountId);
            $type = 'studio';
        } else {
            $accountId = $objStripe->Account->saveSoleProprietor($data['owner'], $data['studio'], $objStudio->stripe_account_id);
            $type = 'owner';
        }
        if ($accountId === false) {
            return false;
        }
        $objStripe->Product->save($data['studio']['name'] . '(Studio)', 'service');
        $objStudio->member_id = $data['studio']['memberId'];
        $objStudio->name = $data['studio']['name'];
        $objStudio->phone = $data[$type]['phone'];
        $objStudio->email = $data[$type]['email'];
        $objStudio->address = $data[$type]['address'];
        $objStudio->city = $data[$type]['city'];
        $objStudio->state = $data[$type]['state'];
        $objStudio->zip = $data[$type]['zip'];
        $objStudio->country = $data[$type]['country'];
        $objStudio->tax_id = $data['studio']['tax'];
        $objStudio->mcc = $data['studio']['mcc'];
        $objStudio->description = $data['studio']['description'];
        $objStudio->url = $data['studio']['url'];
        if ($objStudio->save()) {
            return $objStudio;
        }
        return false;
    }

    public static function setupStudio($data, $userId)
    {
        $data['owner']['userId'] = $userId;
        $data['owner']['type'] = 'owner';
        $objMember = Member::store($data['owner']);
        if ($objMember !== false) {
            $data['studio']['memberId'] = $objMember->id;
            if ($objMember->studio === null) {
                $objStudio = Studio::createStudio($data);
            } else {
                $objStudio = Studio::updateStudio($data, $objMember->studio);
            }
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
            if ($account->requirements->disabled_reason !== null) {
                $reasons[] = str_replace('stripe.', '', __('stripe' . '.' . $account->requirements->disabled_reason));
            }
            return ['messages' => $reasons, 'id' => $this->id];
        }
        return true;
    }
}
