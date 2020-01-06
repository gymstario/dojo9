@extends('layouts.main')
@section('title', 'Plans')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="rui-page-title">
            <div class="container-fluid">
                <h1 class="display-3 align-center">
                    Flexible Plans
                </h1>
            </div>
        </div>
        <div class="pricing-1" style="width: 100%">
            <div class="container">
                <div class="row">
                    @foreach($plans as $key => $plan)
                    <div class="col-md-4 col-offset-md-4">
                        <div class="block block-pricing block-raised">
                            <form action="{{ route("register") }}" method="GET">
                                <input type="hidden" name="plan" value="{{ $plan["stripeId"] }}" />
                                <input type="hidden" name="role" value="{{ $plan["role"] }}" />
                                <div class="table table-danger">
                                    <h6 class="category">{{ $plan['name'] }}</h6>
                                    <h1 class="block-caption"><small>$</small>{{ $plan["amount"] / 100 }} <small>/ location</small></h1>
                                    <ul>
                                        @foreach($plan["attributes"] as $key => $attribute)
                                        <li>@if($attribute === '*') Any @else{{ $attribute }} @endif <b>{{ $key }}</b></li>
                                        @endforeach
                                        <li><input type="number" name="quantity" value="1" style="width: 74px;font-size: 1.3em; color: #708090; text-align: center" min="1" /></li>
                                    </ul>
                                    <button type="submit" class="btn btn-white btn-raise btn-round">BUY NOW</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
