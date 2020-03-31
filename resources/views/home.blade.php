@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="alert alert-success">You are logged in! @if( $superadmin )
You are a super-administrator.
@endif</div>

@if (count($businesses) > 0)
    <section class="business-short-list">
        @foreach ($businesses as $business)
        <section class="business-short-list-item">
            <section class="business-short-list-name">
                @if ($business->approved == 1 )
                    <span class="dashboard-button approved"><i class="icon-check mr-1"></i> Approved</span>
                @else
                    <span class="dashboard-button pending"><i class="icon-hourglass mr-1"></i> Pending</span>
                @endif
                <h3 class="business-short-list-name-label">
                    {{ $business->name }}
                    <section class="business-dashboard-actions">
                        <a class="business-short-list-edit" href="/edit/{{ $business->id }}">Edit</a>
                        @if( $superadmin )
                            <form class="admin inline-form" method="POST" action="/status/{{$business->id}}">
                                @csrf
                                <fieldset>
                                    <button type="submit" class="status-button">Change Status</button>
                                </fieldset>
                            </form>
                        @endif
                    </section>
                </h3>
            </section>
        </section>
        @endforeach
    </section>
@else 

<h2>No Rahway Main St. organizations created.</h2>
<p class="mb-8">You have not created any Rahway Main St. organization listings yet. You can create one now, or you can browse existing listings to see if yours already exists and can be claimed.</p>

<a class="button form-button" href="/create">Create a Listing</a>
<a class="button form-button" href="/">Browse Listings</a>

@endif

@endsection