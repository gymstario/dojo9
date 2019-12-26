@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member')
@section('content')
<div class="rui-page-title">
    <div class="container-fluid">
        <h1 class="display-3">
            Create Branch
        </h1>
        <div>
            <button class="btn btn-primary btn-property" data-toggle="modal" data-target=".modal-branch">Add Branch</button>
        </div>

    </div>
</div>
<div class="rui-page-content">
    <div class="container-fluid">
                {{ Form::open(['route' => 'branch.post', 'method' => 'POST', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
                <div class="modal-body">
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "Branch Name", "name", "", [], "col-md-12 col-xs-12", $branch ?? [], 'name') !!}
                        {!! field_wrap($errors, "Email Address", "email", "email", [], "col-md-6 col-xs-12", $branch ?? [], 'email') !!}
                        {!! field_wrap($errors, "Phone", "phone", "phone", [], "col-md-6 col-xs-12", $branch ?? [], 'phone') !!}
                        {!! field_wrap($errors, "Address", "address", "address", [], "col-md-12 col-xs-12", $branch ?? [], 'address') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brand">
                        Create Branch
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
@endsection
