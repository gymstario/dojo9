@extends('layouts.main')
@section('title', 'Merchant Service')
@section('menu','member')
@section('content')
    <div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="display-3">
                Account | <span style="font-size: 0.7em;">Billing</span>
            </h1>
        </div>
    </div>

    <div class="rui-page-content">
        <div class="container-fluid">
            {{ Form::open(['class' => 'form rui-sign-form rui-sign-form-cloud']) }}
            <div class="row px-20">
                <div class="col-md-8 col-xs-12 set-col pl-0">
                    <h4 class="display-4 mt-20 mb-40">Billing Information</h4>
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "Name", "name", "", [], "col-6", $billing ?? [], 'name') !!}
                        {!! field_wrap($errors, "Email Address", "email", "email", [], "col-6", $billing ?? [], 'email') !!}
                        <div class="col-12">
                            <label class="form-control-label">Payment Information</label>
                            <div id="card-element"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-brand btn-large" style="margin-top: 20px;">
                Update Billing Method
            </button>
            {{ Form::close() }}
        </div>
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

