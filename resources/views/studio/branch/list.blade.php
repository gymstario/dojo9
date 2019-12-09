@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member')
@section('content')
<div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="display-3">
                Branches
            </h1>
            <div>
                <button class="btn btn-primary btn-property" data-toggle="modal" data-target=".modal-branch">Add Branch</button>
            </div>
        </div>
    </div>

<div class="rui-page-content">
    <div class="container-fluid">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @if(count($branches) > 0)
                @foreach($branches as $branch)
                <tr>
                    <th scope="col">{{ $branch['name'] }}</th>
                    <th scope="col">{{ $branch['email'] }}</th>
                    <th scope="col">{{ $branch['phone'] }}</th>
                    <th scope="col">{{ $branch['address'] }}</th>
                    <th scope="col">{{ $branch['city'] }}</th>
                    <th scope="col">{{ $branch['state'] }}</th>
                    <th scope="col"></th>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">No Branches Added</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@include('studio.branch.edit')
@endsection
