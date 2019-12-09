<?php

namespace App\Http\Controllers;

use App\Http\Models\Studio;
use App\Http\Requests\StudioSetupRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class StudioController extends Controller
{
    //
    public function setup()
    {
        $member = auth()->user()->member;
        $studio = $member->studio;
        return view('studio.edit', ['member' => (array) $member->toArray(), 'studio' => (array) $studio->toArray()]);
    }

    public function postSetup(StudioSetupRequest $request)
    {
        try {
            $data = $request->all();
            $data['studio']['frontPath'] = storage_path() . '/app/' . $request->file('store_front')->storeAs('public/verification/studio', auth()->user()->id . '-front.' . $request->file('store_front')->extension());
            $data['studio']['backPath'] = storage_path() . '/app/' . $request->file('store_front')->storeAs('public/verification/studio', auth()->user()->id . '-back.' . $request->file('store_back')->extension());

            $data['owner']['frontPath'] = storage_path() . '/app/' . $request->file('owner_front')->storeAs('public/verification/owner', auth()->user()->id . '-front.' . $request->file('owner_front')->extension());
            $data['owner']['backPath'] = storage_path() . '/app/' . $request->file('owner_back')->storeAs('public/verification/owner', auth()->user()->id . '-back.' . $request->file('owner_back')->extension());

            $data['studio']['ip'] = $request->ip();
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
