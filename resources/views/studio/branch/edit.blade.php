@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member')
@section('content')
<div class="modal modal-branch" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title display-4">Create Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route' => 'branch.post', 'method' => 'POST', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
                <div class="modal-body">
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "Branch Name", "name", "", [], "col-md-12 col-xs-12", $branch ?? [], 'name') !!}
                        {!! field_wrap($errors, "Email Address", "email", "email", [], "col-md-6 col-xs-12", $branch ?? [], 'email') !!}
                        {!! field_wrap($errors, "Phone", "phone", "phone", [], "col-md-6 col-xs-12", $branch ?? [], 'phone') !!}
                        {!! field_wrap($errors, "Address", "address", "", [], "col-md-8 col-xs-12", $branch ?? [], 'address') !!}
                        {!! field_wrap($errors, "City", "city", "", [], "col-md-4 col-xs-12", $branch ?? [], 'city') !!}
                        {!! field_wrap($errors, "State", "state", "select", config('state'), "col-md-6 col-xs-6", $branch ?? [], 'state') !!}
                        {!! field_wrap($errors, "Zip", "zip", "", [], "col-md-6 col-xs-6", $branch ?? [], 'zip') !!}
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
    </div>
