<?php

namespace App\Http\Controllers;

use App\Members;
use Illuminate\Http\Request;
use App\Http\Requests\MemberCreateRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $members)
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
    public function update(Request $request, Members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $members)
    {
        //
    }
}
