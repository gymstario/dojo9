@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member')
@section('content')
<div class="rui-page-title">
        <div class="container-fluid">
            <h1 class="display-3">
                Classes
            </h1>
            <div>
                <button class="btn btn-primary btn-property" data-toggle="modal" data-target=".modal-class">Add Class</button>
            </div>
        </div>
    </div>

<div class="rui-page-content">
    <div class="container-fluid">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Branch</th>
                    <th scope="col">Time Start</th>
                    <th scope="col">Time End</th>
                    <th scope="col">Days</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @if(count($classes) > 0)
                @foreach($classes as $class)
                <tr>
                    <th scope="col">{{ $class['branch']->name }}</th>
                    <th scope="col">{{ $class['start'] }}</th>
                    <th scope="col">{{ $class['end'] }}</th>
                    <th scope="col">
                        @foreach(explode(",", $class['days']) as $day)
                        {{ config("days")[$day] }}
                        @endforeach
                    </th>
                    <th scope="col"></th>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">No Classes Added</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@include('studio.class.edit')
@endsection
