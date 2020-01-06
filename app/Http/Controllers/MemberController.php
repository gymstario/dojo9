<?php

namespace App\Http\Controllers;

use App\Http\Models\Member;
use App\Http\Models\Plan;
use App\Http\Requests\MemberCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
        if (!Gate::allows('is-owner')) {
            return redirect()->route('dashboard.get');
        }
    }

    public function index()
    {
        $members = Member::where('studio_id', auth()->user()->member->studio->id)->paginate(env('PAGE_SIZE'));
        return view('members.list', ['members' => $members]);
    }

    public function create()
    {
        //
        $id = auth()->user()->member->studio->stripe_account_id;
        $plans = Plan::getOwnerPlans($id)['data'];
        $plans = array_combine(array_column($plans, 'stripeId'), array_column($plans, 'name'));
        return view('members.create', ['plans' => $plans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MemberCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        try {
            $input = $request->all();
            if ($request->file('photo') !== null) {
                $input['photo'] = $request->file('photo')->storeAs('public/student', auth()->user()->id . '-front.' . $request->file('photo')->extension());
            }

            $member = Member::storeStudent([
                'studio_id' => auth()->user()->member->studio->id,
                'studioName' => auth()->user()->member->studio->name,
                'firstName' => $input['firstName'],
                'lastName' => $input['lastName'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'dob' => $input['dob'],
                'rank' => $input['rank'],
                'enrolment' => $input['enrolment'],
                'stripe_plan_id' => $input['plan'],
                'photo' => isset($input['photo']) ? $input['photo'] : null,
            ]);
            return redirect()->route('members.list.get')->with(['success' => 'A new member has been added successfully']);
        } catch (\Exception $e) {
            dd($e);
            Log::error($e);
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
