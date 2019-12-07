@extends('layouts.main')
@section('title', 'Login')
@section('menu', 'login')
@section('content')
<div class="rui-sign align-items-center justify-content-center">
    {!! unload_messages() !!}
    <br />
    <div class="bg-image">
        <div class="bg-grey-1"></div>
    </div>
    <div class="row vertical-gap sm-gap justify-content-center">
        <div class="col-12">
            <h1 class="display-4 mb-10 text-center">Verify Your Email Address</h1>
        </div>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        {{ Form::open(["route" => "verification.resend"]) }}
        <div class="col-12">
            <button type="submit" class="btn btn-brand btn-block text-center">Click here to request another</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
