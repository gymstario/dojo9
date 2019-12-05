@extends('layouts.frontend')
@section('title', 'Plans')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        @foreach($plans as $plan)
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="db-wrapper">
                <div class="db-pricing-seven">
                    <ul>
                        <li class="price">
                            <i class="glyphicon glyphicon-qrcode"></i>
                            {{ $plan["name"] }} - @currency($plan["amount"]) / {{$plan["interval"]}}
                        </li>
                        @foreach($plan["attributes"] as $key => $attribute)
                        <li>
                            <b>{{$attribute}}</b>
                            <small>{{$key}}</small>
                        </li>
                        @endforeach
                    </ul>
                    <div class="pricing-footer">
                        <a href="{{ route("register") }}?plan={{ $plan["stripeId"] }}" class="btn btn-default btn-lg">BUY <i class="glyphicon glyphicon-play-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
