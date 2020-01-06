@extends('layouts.main')
@section('title', 'Enrolment')
@section('menu', 'enrolment')
@section('content')
{{ $errors }}
<div class="rui-sign">
    {{ Form::open(["id" => "payment-form", "class" => "form rui-sign-form", "style" => "max-width: 100%;padding: 0;"]) }}
    <div class="row w-100" style="margin-left: 0; margin-right: 0;">
        <div class="col-lg-6 d-flex align-items-center justify-content-center" style="padding: 30px;">
                <div class="row vertical-gap sm-gap justify-content-center">
                    {!! unload_messages() !!}
                    <br />
                    <div class="col-12">
                        <h1 class="display-4 mb-10 text-center">Sign Up</h1>
                    </div>
                    <input type="hidden" name="accountId" value="{{ $studio['stripe_account_id'] }}" />
                    <input type="hidden" name="plan" value="{{ $plan['stripeId'] }}" />
                    <input type="hidden" name="role" value="student" />
                    {!! field_wrap($errors, "First Name", "firstName", "", [], "col-6", $member ?? [], 'first_name') !!}
                    {!! field_wrap($errors, "Last Name", "lastName", "", [], "col-6", $member ?? [], 'last_name') !!}
                    {!! field_wrap($errors, "Email Address", "email", "email", [], "col-12", $member ?? [], 'email') !!}
                    {!! field_wrap($errors, "Password", "password", "password", [], "col-6") !!}
                    {!! field_wrap($errors, "Confirm Password", "password_confirmation", "password", [], "col-6") !!}
                    <div class="col-12">
                        <label class="form-control-label">Payment Information</label>
                        <div id="card-element"></div>
                    </div>
                    <div class="col-12">
                        <div class="custom-control justify-content-start">
                            <input type="checkbox" id="rememberMe">
                            <label class="text-grey-5 fs-13" for="rememberMe">I have read and agree to the <a href="#" class="text-2">terms and conditions.</a></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-brand btn-block text-center">Sign up</button>
                    </div>
                    <div class="col-12 text-center text-grey-5 fs-13">
                    Already have an account? <a href="{{ route('login') }}" class="text-2">Sign In</a>
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-image">
                <div style="background-image: url('./assets/images/bg-sign.png');display: flex; align-items: center; justify-content: center;">
                    <div class="col-md-8">
                        <div class="block block-pricing block-raised">
                            <input type="hidden" name="plan" value="{{ $plan["stripeId"] }}" />
                            <input type="hidden" name="role" value="student" />
                            <div class="table table-danger">
                                <h6 class="category">{{ $plan['name'] }}</h6>
                            <h1 class="block-caption"><small>$</small>{{ $plan["amount"] / 100 }} <small>/ {{ $plan['interval'] }}</small></h1>
                                <ul>
                                    @foreach($plan["attributes"] as $key => $attribute)
                                    <li>@if($attribute === '*') Unlimited @else{{ $attribute }} @endif <b>{{ $key }}</b></li>
                                    @endforeach
                                </ul>
                                <button class="btn btn-white btn-raise btn-round">Total @currency(($plan["amount"] / 100))</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection
@section('js')
<script>
    var stripe = Stripe('pk_test_7mkxN0cZ7v4f0c30oYL3e7u600aJDk6Cts');
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
@endsection
