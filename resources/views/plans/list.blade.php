@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member')
@section('content')
    <div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="member-heading">Plans</h1>
            <span><input type="text" placeholder="Search" class="form-control set-search-input"><span class="fa fa-search form-control-feedback set-icon-input"></span></span>
            <div>
                <button class="btn btn-primary btn-property" data-toggle="modal" data-target=".modal-plan">Add Plan</button>
            </div>
        </div>
    </div>

    <div class="rui-page-content">
        <div class="container-fluid">
            @if(count($plans['data']) > 0)
            @foreach($plans['data'] as $plan)
            <div class="col-6 col-floting-set">
                <div class="bg-div">
                    <div class="dropdown dropdown-triangle dropleft set-dot">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="-20">
                            <span data-feather="more-vertical" class="rui-icon rui-icon-stroke-1_5"></span>
                        </div>
                        <ul class="dropdown-menu nav">
                            <li><a class="nav-link" href="#"><span data-feather="plus-circle" class="rui-icon rui-icon-stroke-1_5"></span><span>Action</span><span class="rui-nav-circle"></span></a></li>
                            <li><a class="nav-link" href="#"><span data-feather="x-circle" class="rui-icon rui-icon-stroke-1_5"></span><span>Another action</span><span class="rui-nav-circle"></span></a></li>
                            <li><a class="nav-link" href="#"><span data-feather="check-circle" class="rui-icon rui-icon-stroke-1_5"></span><span>Something else here</span><span class="rui-nav-circle"></span></a></li>
                        </ul>
                    </div>

                    </span>
                    <div class="media media-success body-success">
                        <div class="media-img circle-image-1">S</div>
                        <div class="media-body set-body">
                        <div class="media-title main-title">{{ $plan['name'] }}</div>
                            <small class="media-subtitle subtitle-set">Plan Option</small>
                            <p class="plan-price">@currency($plan['amount']) / {{ $plan['interval'] }}</p>
                            <p class="plan-price">For: {{ $plan['product']['name'] }}</p>
                            <small class="media-subtitle subtitle-set">Plan Features</small>
                            @foreach($plan['attributes'] as $key => $val)
                            <p class="duration"> {{ $key }}: {{ $val }}</p>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @else
            No Plans created
            @endif
        </div>
    </div>
    @include("plans.edit")

@endsection
@section('js')
<script>
    function addMore($this) {
        $this.attr('onclick', 'remove($(this))');
        $('.add-more').addClass('fa-minus remove-more').removeClass('fa-plus').removeClass('add-more');
        $(".fields").append(`
            <div class="input-group attributes" style="margin-bottom: 18px;">
                <div class="input-group-prepend" onclick="addMore($(this))">
                    <div class="input-group-text">
                        <span class="add-more fa fa-plus"></span>
                    </div>
                </div>
                <input type="text" class="form-control" name="attributes[name][]" placeholder="Name" />
                <input type="text" class="form-control" name="attributes[value][]" placeholder="Value" />
            </div>
        `);
    }
    function remove($this) {
        $this.parent().remove();
    }
</script>
@endsection
