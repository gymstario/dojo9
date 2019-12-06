@extends('layouts.frontend')
@section('title', 'Login')
@section('menu', 'login')
@section('content')
<div class="rui-sign align-items-center justify-content-center">
    {!! unload_messages() !!}
    <br />
    <div class="bg-image">
        <div class="bg-grey-1"></div>
    </div>
    {{ Form::open(["class" => "form rui-sign-form rui-sign-form-cloud"]) }}
        <div class="row vertical-gap sm-gap justify-content-center">
            <div class="col-12">
                <h1 class="display-4 mb-10 text-center">Sign In</h1>
            </div>
            {!! field_wrap($errors, "Email Address", "email", "email", [], "col-12") !!}
            {!! field_wrap($errors, "Password", "password", "password", [], "col-12") !!}
            <div class="col-sm-6">
                <div class="custom-control custom-checkbox d-flex justify-content-start">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember">
                    <label class="custom-control-label fs-13" for="rememberMe">Remember me</label>
                </div>
            </div>
            @if (Route::has('password.request'))
            <div class="col-sm-6">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('password.request') }}" class="fs-13">Forget password?</a>
                </div>
            </div>
            @endif
            <div class="col-12">
                <button type="submit" class="btn btn-brand btn-block text-center">Sign in</button>
            </div>
            <div class="col-12">
                <div class="rui-sign-or mt-2 mb-5">or</div>
            </div>
            <div class="col-12">
                <ul class="rui-social-links">
                    <li>
                        <a href="dashboard.html" class="rui-social-github">
                            <span class="fab fa-github"></span>
                            Github
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html" class="rui-social-facebook">
                            <span class="fab fa-facebook-f"></span>
                            Facebook
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html" class="rui-social-google">
                            <span class="fab fa-google"></span>
                            Google
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
    <div class="mt-20 text-grey-5">
        Don't you have an account? <a href="{{ route("auth.plans.get") }}" class="text-2">Sign Up</a>
    </div>
</div>



@endsection
