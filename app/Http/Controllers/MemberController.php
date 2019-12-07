<?php

namespace App\Http\Controllers;

use App\Http\Models\Member;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\MemberCreateRequest;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Gate::allows('is-owner')) {
            return redirect('401');
        }
        return view('members.list');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MemberCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        $member = Member::create([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob'   => $request->dob,
            'address'   => $request->address,
            'city'  => $request->city,
            'state' => $request->state,
            'zip'   => $request->zip,
            'country' => $request->country,
            'ssn_last_4' => $request->ssn_last_4,
            'title' => $request->title,
            'email' => $request->email,
            'phone' => $request->phone,
            'strip_customer_id' => $request->strip_customer_id,
            'enrolment' => $request->enrolment

        ]);
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
