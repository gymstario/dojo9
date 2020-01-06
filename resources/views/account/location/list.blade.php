@extends('layouts.main')
@section('title', 'Locations')
@section('menu','account')
@section('content')
<div class="rui-page-title">
    <div class="container-fluid" style="display:flex">
        <div style="flex: 1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Your Plan Support 3 Locations</a></li>
                </ol>
            </nav>
            <h1 class="display-3">
                Account | <span style="font-size: 0.7em;">Locations</span>
            </h1>
        </div>
        <button type="button" class="btn btn-success btn-sm btn-uniform" data-toggle="modal" data-target=".modal-branch">Create Location</button>
    </div>
</div>


<div class="rui-page-content" style="padding: 0">
    <div class="container-fluid" style="padding: 0">
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
                    <td scope="col">{{ $branch['name'] }}</td>
                    <td scope="col">{{ $branch['email'] }}</td>
                    <td scope="col">{{ $branch['phone'] }}</td>
                    <td scope="col">{{ $branch['address'] }}</td>
                    <td scope="col">{{ $branch['city'] }}</td>
                    <td scope="col">{{ $branch['state'] }}</td>
                    <td scope="col" style="padding: 0 25px;">
                        <button type="button" class="btn btn-warning btn-sm btn-uniform"><span class="icon"><span data-feather="edit" class="rui-icon rui-icon-stroke-1_5"></span></span></button>
                        <button type="button" class="btn btn-danger btn-sm btn-uniform"><span class="icon"><span data-feather="trash" class="rui-icon rui-icon-stroke-1_5"></span></span></button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">No Locations Added</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@include('account.location.edit')
@endsection
