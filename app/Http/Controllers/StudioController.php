<?php

namespace App\Http\Controllers;

use App\Http\Models\Member;
use App\Http\Models\Studio;
use App\Http\Models\User;
use App\Http\Requests\EnrolmentRequest;
use App\Http\Requests\StudioSetupRequest;
use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Support\Facades\Log;

class StudioController extends Controller
{

    public function enrolment($id)
    {
        $objStripe = new StripeMarketplaceManager();
        $objMember = Member::find(decrypt($id));
        $objStudio = Studio::find($objMember->studio_id);
        $objPlan = $objStripe->Plan->get($objMember->stripe_plan_id, $objStudio->stripe_account_id);
        return view('studio.enrolment', ['plan' => $objPlan, 'member' => $objMember->toArray(), 'studio' => $objStudio->toArray()]);
    }

    public function postEnrolment(EnrolmentRequest $request, $id)
    {
        $objMember = Member::find(decrypt($id));
        $objUser = User::addStudent($request->all(), $objMember);
        if ($objUser === false) {
            return redirect()->back()->with(['error' => 'An unexpected Error occured. Please try again.']);
        }
        return redirect()->route('frontend.page')->with(['success' => 'You have singed up successfully. We will be in touch with you soon.']);
    }

    //
    public function setup()
    {
        $data = [];
        if (auth()->user()->member !== null) {
            $data['member'] = auth()->user()->member;
            $data['studio'] = $data['member']->studio;
            $data['account'] = $data['studio']->stripe();
        }
        return view('studio.edit', $data);
    }

    public function postSetup(StudioSetupRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('store_front') !== null) {
                $data['studio']['frontPath'] = storage_path() . '/app/' . $request->file('store_front')->storeAs('public/verification/studio', auth()->user()->id . '-front.' . $request->file('store_front')->extension());
                $data['studio']['backPath'] = storage_path() . '/app/' . $request->file('store_front')->storeAs('public/verification/studio', auth()->user()->id . '-back.' . $request->file('store_back')->extension());
            }

            if ($request->file('owner_front') !== null) {
                $data['owner']['frontPath'] = storage_path() . '/app/' . $request->file('owner_front')->storeAs('public/verification/owner', auth()->user()->id . '-front.' . $request->file('owner_front')->extension());
                $data['owner']['backPath'] = storage_path() . '/app/' . $request->file('owner_back')->storeAs('public/verification/owner', auth()->user()->id . '-back.' . $request->file('owner_back')->extension());
            }

            $data['studio']['ip'] = $request->ip();
            $data['owner']['ip'] = $request->ip();
            $studio = Studio::setupStudio($data, auth()->id());
            if ($studio !== false) {
                return redirect()->route('dashboard.get')->with(['success' => 'Your request for account setup has been submitted. Please provide us 48 hours to review your application.']);
            }
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        } catch (\Exception $e) {
            dd($e);
            Log::error($e);
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        }
    }
}
