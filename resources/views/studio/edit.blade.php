@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member')
@section('content')
    <div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="display-3">
                Studio Setup
            </h1>
            <div>
                <button class="btn btn-primary btn-property">Branchesain</button>
            </div>
        </div>
    </div>

    <div class="rui-page-content">
        <div class="container-fluid">
            {{ Form::open(['enctype' => 'multipart/form-data', 'route' => 'studio.post', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
            @include('studio.partial.studio')
            <button type="submit" class="btn btn-brand btn-large">
                Save Studio
            </button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
