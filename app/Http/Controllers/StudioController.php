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
            $data['studio']['frontPath'] = storage_path() . '/app/' . $request->file('front')->storeAs('public/verification', auth()->user()->id . '-front.' . $request->file('front')->extension());
            $data['studio']['backPath'] = storage_path() . '/app/' . $request->file('back')->storeAs('public/verification', auth()->user()->id . '-back.' . $request->file('back')->extension());

            $data['studio']['ip'] = $request->ip();
            $studio = Studio::setupStudio($data, auth()->id());
            if ($studio !== false) {
                return redirect('dashboard.get')->with(['success' => 'Your request for account setup has been submitted. Please provide us 48 hours to review your application.']);
            }
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        } catch (\Exception $e) {
            dd($e);
            Log::error($e);
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        }
    }
}
