@extends('layouts.main')
@section('title', 'Merchant Service')
@section('menu','member')
@section('content')
    <div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="display-3">
                Account | <span style="font-size: 0.7em;">Merchant Service</span>
            </h1>
        </div>
    </div>

    <div class="rui-page-content">
        <div class="container-fluid">
            {{ Form::open(['enctype' => 'multipart/form-data', 'route' => 'studio.post', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
            <div class="row px-20">
                <div class="col-md-12 col-xs-12 set-col">
                    <div class="alert alert-content alert-success mb-20" role="alert">
                        <h4 class="h3">Merchant Service</h4>
                        <p>Payment processing for you account is provided by Stripe. Apply with Stripe to Start accepting credit card payment for you Business</p>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 col-xs-12 set-col px-0">
                    <h4 class="display-4 mt-40">Business Information</h4>
                    <div class="row vertical-gap sm-gap">
                        <input type="hidden" name="studio[country]" value="US" />
                        {!! field_wrap($errors, "Business Name", "studio[name]", "", [], "col-md-6 col-xs-12", $studio ?? [], 'name') !!}
                        {!! field_wrap($errors, "Business Type", "studio[mcc]", "select", get_mcc_dropdown(), "col-md-6 col-xs-6", $studio ?? [], 'mcc') !!}
                        {!! field_wrap($errors, "Date Established", "studio[date]", "date", [], "col-md-6 col-xs-12", $studio ?? [], 'date') !!}
                        {!! field_wrap($errors, "Business Entity", "studio[type]", "select", get_entity_dropdown(), "col-md-6 col-xs-6 business-entity", $studio ?? [], 'mcc') !!}
                        {!! field_wrap($errors, "URL", "studio[url]", "", [], "col-md-6 col-xs-12", $studio ?? [], 'url') !!}
                        {!! field_wrap($errors, "Description", "studio[description]", "textarea", [], "col-md-6 col-xs-12", $studio ?? [], 'description') !!}
                    </div>
                    <div style="display: none;" class="contact-information">
                        <h4 class="display-4 mt-40">Contact Information</h4>
                        <div class="row vertical-gap sm-gap">
                            {!! field_wrap($errors, "Address", "studio[address]", "", [], "col-md-8 col-xs-12", $studio ?? [], 'address') !!}
                            {!! field_wrap($errors, "State", "studio[state]", "select", config('state'), "col-md-4 col-xs-6", $studio ?? [], 'state') !!}
                            {!! field_wrap($errors, "City", "studio[city]", "", [], "col-md-6 col-xs-12", $studio ?? [], 'city') !!}
                            {!! field_wrap($errors, "Zip", "studio[zip]", "", [], "col-md-6 col-xs-6", $studio ?? [], 'zip') !!}
                            {!! field_wrap($errors, "Email Address", "studio[email]", "email", [], "col-md-6 col-xs-12", $studio ?? [], 'email') !!}
                            {!! field_wrap($errors, "Phone", "studio[phone]", "phone", [], "col-md-6 col-xs-12", $studio ?? [], 'phone') !!}
                            {!! field_wrap($errors, "Tax ID", "studio[tax]", "tax", [], "col-md-6 col-xs-12", $studio ?? [], 'tax_id') !!}
                        </div>
                        <h4 class="display-4 mt-40">Company Verification Documents</h4>
                        @if(isset($account['verficiationStatus']) && $account['verficiationStatus'] === 'verified')
                        <div class="row vertical-gap sm-gap">
                            <div class="col-md-6 col-xs-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title display-1"><i class="fa fa-check"></i></h5>
                                        <span class="card-subtitle h4 text-muted">Verification Successful</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row vertical-gap sm-gap">
                            {!! field_wrap($errors, "Front Photo", "store_front", "file", [], "col-md-6 col-xs-12") !!}
                            {!! field_wrap($errors, "Back Photo", "store_back", "file", [], "col-md-6 col-xs-12") !!}
                        </div>
                        @endif
                    </div>
                    <h4 class="display-4 mt-40">Owner Details</h4>
                    <div class="row vertical-gap sm-gap">
                        <input type="hidden" name="owner[country]" value="US" />
                        {!! field_wrap($errors, "First Name", "owner[firstName]", "", [], "col-md-6 col-xs-12", $member ?? [], 'first_name') !!}
                        {!! field_wrap($errors, "Last Name", "owner[lastName]", "", [], "col-md-6 col-xs-12", $member ?? [], 'last_name') !!}
                        {!! field_wrap($errors, "SSN", "owner[ssn]", "", [], "col-md-6 col-xs-12", $member ?? [], 'ssn') !!}
                        {!! field_wrap($errors, "Date of Birth", "owner[dob]", "date", [], "col-md-6 col-xs-12", $member ?? [], 'dob') !!}
                        {!! field_wrap($errors, "Address", "owner[address]", "", [], "col-md-8 col-xs-12", $member ?? [], 'address') !!}
                        {!! field_wrap($errors, "State", "owner[state]", "select", config('state'), "col-md-4 col-xs-6", $member ?? [], 'state') !!}
                        {!! field_wrap($errors, "City", "owner[city]", "", [], "col-md-6 col-xs-12", $member ?? [], 'city') !!}
                        {!! field_wrap($errors, "Zip", "owner[zip]", "", [], "col-md-6 col-xs-6", $member ?? [], 'zip') !!}
                        {!! field_wrap($errors, "Job Title", "owner[title]", "", [], "col-md-6 col-xs-12", $member ?? [], 'title') !!}
                        {!! field_wrap($errors, "Email Address", "owner[email]", "email", [], "col-md-6 col-xs-12", $member ?? [], 'email') !!}
                        {!! field_wrap($errors, "Phone", "owner[phone]", "phone", [], "col-md-6 col-xs-12", $member ?? [], 'phone') !!}
                    </div>
                    <h4 class="display-4 mt-40">Social Security Document</h4>
                    @if(isset($account['verficiationStatus']) && $account['verficiationStatus'] === 'verified')
                    <div class="row vertical-gap sm-gap">
                        <div class="col-md-6 col-xs-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title display-1"><i class="fa fa-check"></i></h5>
                                    <span class="card-subtitle h4 text-muted">Verification Successful</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "Front Photo", "owner_front", "file", [], "col-md-6 col-xs-12") !!}
                        {!! field_wrap($errors, "Back Photo", "owner_back", "file", [], "col-md-6 col-xs-12") !!}
                    </div>
                    @endif
                    <h4 class="display-4 mt-40">Banking Information</h4>
                    @if(isset($account) && count($account['banks']) > 0)
                    <div class="row vertical-gap sm-gap">
                        @foreach($account['banks'] as $bank)
                        <div class="col-md-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title h2">{{ $bank['name'] }}</h5>
                                    <h6 class="card-subtitle h4 text-muted">****** *** {{ $bank['account'] }}</h6>
                                    <a href="#" class="card-link">Edit</a>
                                    <a href="#" class="card-link">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "Routing Number", "studio[routing]", "", [], "col-md-6 col-xs-12") !!}
                        {!! field_wrap($errors, "Account Number", "studio[account]", "", [], "col-md-6 col-xs-12") !!}
                    </div>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-brand btn-large" style="margin-top: 20px;">
                Save Studio
            </button>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.business-entity').change(function() {
                if($(this).val() === 'Sole Proprietor') {
                    $('.contact-information').hide();
                } else {
                    $('.contact-information').show();
                }
            });
        });
    </script>
@endsection
