@extends('layouts.main')
@section('title', 'Reset Password')
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
            @include('studio.partial.studio')
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
