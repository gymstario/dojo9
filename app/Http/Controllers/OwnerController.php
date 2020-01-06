<?php

namespace App\Http\Controllers;

use App\Http\Models\Branch;
use App\Http\Requests\BillingUpdateRequest;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StudioSetupRequest;
use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
        if (!Gate::allows('is-owner')) {
            return redirect()->route('dashboard.get');
        }
    }

    public function dashboard()
    {
        return view('owner.dashboard');
    }

    public function merchant()
    {
        $data = [];
        if (auth()->user()->member !== null) {
            $data['member'] = auth()->user()->member;
            $data['studio'] = $data['member']->studio;
            $data['account'] = $data['studio']->stripe();
        }
        return view('account.studio.edit', $data);
    }

    public function postMerchant(StudioSetupRequest $request)
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

    public function profile()
    {
        $user = auth()->user();
        $member = $user->member;
        // dd([$user, $member]);
        return view('account.profile.edit', ['user' => $user, 'member' => $member]);
    }

    public function postProfile(ProfileUpdateRequest $request)
    {
        $input = $request->all();
        $user = auth()->user();
        if ($input['current_password'] !== null) {
            if (!Hash::check($input['current_password'], auth()->user()->password)) {
                return redirect()->back()->with(['error' => 'Invalid Current Password. Please try again.']);
            }
            $user->password = bcrypt($input['new_password']);
        }
        $user->first_name = $input['firstName'];
        $user->last_name = $input['lastName'];
        $user->email = $input['email'];
        $user->save();
        return redirect()->back()->with(['success' => 'Profile updated successfully.']);

    }

    public function billing()
    {
        $objStripe = new StripeMarketplaceManager();
        $billing = $objStripe->Customer->get(auth()->user()->strip_customer_id);
        return view('account.billing.edit', ['billing' => $billing]);
    }

    public function postBilling(BillingUpdateRequest $request)
    {
        $input = $request->all();
        $objStripe = new StripeMarketplaceManager();
        $objStripe->Customer->save($input['firstName'] . ' ' . $input['lastName'], $input['email'], $input['stripeToken'], null, auth()->user()->strip_customer_id);
        return redirect()->back()->with(['success' => 'Billing information updated successfully']);
    }

    public function locations()
    {
        return view('account.location.list', ['branches' => Branch::getOwnerBranches(auth()->user()->member->studio->id)]);
    }

    public function postLocation(BranchRequest $request)
    {
        // try {
        $data = $request->all();
        $studio = auth()->user()->member->studio;
        $data['studio'] = $studio->id;
        $branch = Branch::add($data, $studio->stripe_account_id);
        if ($branch !== false) {
            return redirect()->back()->with(['success' => 'You have added a new Location successfully.']);
        }
        return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        /* } catch (\Exception $e) {
    dd($e);
    return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
    }*/
    }
}
