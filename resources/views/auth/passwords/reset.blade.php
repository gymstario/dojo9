@extends('layouts.frontend')
@section('title', 'Reset Password')
@section('menu', 'login')
@section('content')
<div class="rui-sign align-items-center justify-content-center">
    {!! unload_messages() !!}
    <br />
    <div class="bg-image">
        <div class="bg-grey-1"></div>
    </div>
    {{ Form::open(["route" => "password.update", "class" => "form rui-sign-form rui-sign-form-cloud"]) }}
        <input type="hidden" name="token" value="{{ $token ?? '' }}">
        <div class="row vertical-gap sm-gap justify-content-center">
            <div class="col-12">
                <h1 class="display-4 mb-10 text-center">Reset Password</h1>
            </div>
            {!! field_wrap($errors, "Email Address", "email", "email", [], "col-12") !!}
            {!! field_wrap($errors, "Password", "password", "password", [], "col-12") !!}
            {!! field_wrap($errors, "Confirm Password", "password_confirmation", "password", [], "col-12") !!}
            <div class="col-12">
                <button type="submit" class="btn btn-brand btn-block text-center">Reset Password</button>
            </div>
        </div>
    {{ Form::close() }}
    <div class="mt-20 text-grey-5">
        Have an account? <a href="{{ route("login") }}" class="text-2">Sign In</a>
    </div>
</div>
@endsection
