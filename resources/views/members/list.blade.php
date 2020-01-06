@extends('layouts.main')
@section('title', 'Members')
@section('menu','account')
@section('content')
<div class="rui-page-title">
    <div class="container-fluid" style="display:flex">
        <div style="flex: 1">
            <h1 class="display-3">
                Members | <span style="font-size: 0.7em;">{{ $members->count() }} Total</span>
            </h1>
        </div>
        <a href="{{ route('members.create.get') }}" class="btn btn-success btn-sm btn-uniform">Enrol Member</a>
    </div>
</div>


<div class="rui-page-content" style="padding: 0">
    <div class="container-fluid" style="padding: 0">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Enrolment</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($members->items()) > 0)
                @foreach($members->items() as $member)
                <tr>
                    <td>
                        @if($member->photo !== null && $member->photo !== '')
                        <img src="{{ Storage::url($member->photo) }}" />
                        @endif
                    </td>
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->rank }}</td>
                    <td>{{ $member->enrolment }}</td>
                    <td scope="col" style="padding: 0 25px;">
                        <button type="button" class="btn btn-warning btn-sm btn-uniform"><span class="icon"><span data-feather="edit" class="rui-icon rui-icon-stroke-1_5"></span></span></button>
                        <button type="button" class="btn btn-danger btn-sm btn-uniform"><span class="icon"><span data-feather="trash" class="rui-icon rui-icon-stroke-1_5"></span></span></button>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="7">No Members Added</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                    {!! $members->render() !!}
                </tfoot>
            </table>
        </div>
    </div>
@endsection
