@extends('layouts.main')
@section('title', 'Create Member')
@section('menu','member')
@section('content')
<div class="rui-page-title">
    <div class="container-fluid" style="display:flex">
        <div style="flex: 1">
            <h1 class="display-3">
                Create Member
            </h1>
        </div>
        <a href="{{ route('members.list.get') }}" class="btn btn-success btn-sm btn-uniform my-0">View Members</a>
    </div>
</div>
<div class="rui-page-content">
    <div class="container-fluid">
        {{ Form::open(['enctype' => 'multipart/form-data', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
        <div class="row">
            <div class="col-md-8 col-xs-12 set-col px-0">
                <div class="row vertical-gap sm-gap mx-0">
                    <h4 class="display-4 col-11 mb-0">Profile</h4>
                    <input type="hidden" class="" name="country" value="US" />
                    {!! field_wrap($errors, "First Name", "firstName", "", [], "col-md-6 col-xs-12", $member ?? [], 'first_name') !!}
                    {!! field_wrap($errors, "Last Name", "lastName", "", [], "col-md-6 col-xs-12", $member ?? [], 'last_name') !!}
                    {!! field_wrap($errors, "Email Address", "email", "email", [], "col-md-6 col-xs-12", $member ?? [], 'email') !!}
                    {!! field_wrap($errors, "Phone", "phone", "phone", [], "col-md-6 col-xs-12", $member ?? [], 'phone') !!}
                    {!! field_wrap($errors, "Date of Birth", "dob", "date", [], "col-md-6 col-xs-12", $member ?? [], 'dob') !!}
                    {!! field_wrap($errors, "Gender Identity", "gender", "select", get_gender_dropdown(), "col-md-6 col-xs-6", $member ?? [], 'gender') !!}
                    {!! field_wrap($errors, "Rank", "rank", "select", get_rank_dropdown(), "col-md-6 col-xs-6", $member ?? [], 'rank') !!}
                    {!! field_wrap($errors, "Photo", "photo", "file", [], "col-md-6 col-xs-12") !!}
                    {!! field_wrap($errors, "Comments", "comments", "textarea", [], "col-md-11 col-xs-12", $member ?? [], 'comments') !!}
                </div>
            </div>
            <div class="col-md-4 col-xs-12 set-col px-0">
                <div class="row vertical-gap sm-gap mx-0">
                    <h4 class="display-4 col-11 px-0 mb-0">Plan</h4>
                    {!! field_wrap($errors, "Plan", "plan", "select", $plans, "col-md-12 col-xs-6", $member ?? [], 'plan') !!}
                    {!! field_wrap($errors, "Billing Starts", "enrolment", "date", [], "col-md-12 col-xs-6", $member ?? [], 'enrolment') !!}
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-brand btn-large" style="margin-top: 20px;">
            Save Member
        </button>
        {{ Form::close() }}
    </div>
</div>

@endsection
