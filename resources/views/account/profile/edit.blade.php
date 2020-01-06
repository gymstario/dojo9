@extends('layouts.main')
@section('title', 'Merchant Service')
@section('menu','member')
@section('content')
    <div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="display-3">
                Account | <span style="font-size: 0.7em;">Profile</span>
            </h1>
        </div>
    </div>

    <div class="rui-page-content">
        <div class="container-fluid">
            {{ Form::open(['class' => 'form rui-sign-form rui-sign-form-cloud']) }}
            <div class="row px-20">
                <div class="col-md-8 col-xs-12 set-col pl-0">
                    <h4 class="display-4 mt-20 mb-40">Profile</h4>
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "First Name", "firstName", "", [], "col-md-6 col-xs-12", $user ?? [], 'first_name') !!}
                        {!! field_wrap($errors, "Last Name", "lastName", "", [], "col-md-6 col-xs-12", $user ?? [], 'last_name') !!}
                        {!! field_wrap($errors, "Email Address", "email", "email", [], "col-md-6 col-xs-12", $user ?? [], 'email') !!}
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 set-col px-20">
                    <div class="row vertical-gap sm-gap">
                        <h4 class="display-4 mt-40">Update Password</h4>
                        {!! field_wrap($errors, "Current Password", "current_password", "password", [], "col-md-12 col-xs-12") !!}
                        {!! field_wrap($errors, "New Password", "new_password", "password", [], "col-md-12 col-xs-12") !!}
                        {!! field_wrap($errors, "Confirm Password", "new_password_confirmation", "password", [], "col-md-12 col-xs-12") !!}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-brand btn-large" style="margin-top: 20px;">
                Update Profile
            </button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
