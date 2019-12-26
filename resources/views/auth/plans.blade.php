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
        <div class="pricing-2" style="width: 100%">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="block block-pricing block-plain">
                            <div class="table">
                                <h6 class="category">&nbsp;</h6>
                                <h1 class="block-caption">&nbsp;</h1>
                                <ul>
                                    @foreach($plans[0]["attributes"] as $key => $attribute)
                                    <li>{{ $key }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @foreach($plans as $key => $plan)
                    <div class="col-md-3">
                        <div class="block block-pricing block-raised">
                            <div class="table {{ $key == 1 ? 'table-danger' : '' }}">
                            <h6 class="category">{{ $plan['name'] }}</h6>
                            <h1 class="block-caption">@currency($plan["amount"] / 100)</h1>
                                <ul>
                                    @foreach($plans[0]["attributes"] as $keyAttr => $attribute)
                                    <li>{{ $attribute }}</li>
                                    @endforeach
                                </ul>
                                <a href="{{ route("register") }}?plan={{ $plan["stripeId"] }}&role={{ $plan["role"] }}" class="btn {{ $key == 1 ? 'btn-white' : 'btn-danger' }} btn-raise btn-round">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
