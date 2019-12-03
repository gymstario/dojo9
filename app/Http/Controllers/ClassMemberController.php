<?php

namespace App\Http\Controllers;

use App\Class_Member;
use Illuminate\Http\Request;

class ClassMemberController extends Controller
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
     * @param  ClassMembRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassMembRequest $request)
    {
        $class_Member = Class_Member::create([

            'joining' => $request->joining,
            'days' => $request->days,
            'type' => $request->type,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Class_Member  $class_Member
     * @return \Illuminate\Http\Response
     */
    public function show(Class_Member $class_Member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Class_Member  $class_Member
     * @return \Illuminate\Http\Response
     */
    public function edit(Class_Member $class_Member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Class_Member  $class_Member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Class_Member $class_Member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Class_Member  $class_Member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Class_Member $class_Member)
    {
        //
    }
}
