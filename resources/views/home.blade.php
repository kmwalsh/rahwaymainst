@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="mb-10 shadow border border-gray-300 p-2 rounded text-sm text-green-600 bg-green-100">You are logged in! @if( $superadmin )
You are a super-administrator.
@endif</div>

@if (count($businesses) > 0)

<section class="dashboard-business-list" id="business-list">
<h2 class="mb-2">Your Main St. Rahway Posts</h2>

    @foreach ($businesses as $business)

    <section class="standard-box">

        <h3 class="dashboard-business-name">{{ $business->name }}</h3>

        <header class="dashboard-business-header">
            @if ($business->approved == 1 )
                <span class="dashboard-button approved"><i class="fa fa-check mr-1"></i> Approved</span>
            @endif
            
            @if( $superadmin )
                <form class="dashboard-button admin" method="POST" action="/status/{{$business->id}}">
                    @csrf
                    <fieldset>
                        <button type="submit" class="admin-button button font-bold uppercase">
                            <i class="fa fa-plus mr-1"></i> Change Status
                        </button>
                    </fieldset>
                </form>
            @endif
        </header>
        
        @if ($business->approved == 0 )
            <div class="flex flex-row content-center mb-3">
                <span class="dashboard-button pending"><i class="fa fa-hourglass mr-1"></i> Pending Approval</span>

                <p class="mt-0 mb-0 ml-3 text-sm text-gray-500">Pending administrative review. Please allow up to 1-3 business days for approval.</p>
            </div>
        @endif

        <!-- Display Validation Errors -->
        @include('common.errors')
        <form class="form-wrapper dashboard-business-form" method="POST" action="/update/{{$business->id}}" add enctype="multipart/form-data">
        
        @csrf

        <fieldset>
            <label for="name"><span class="block text-gray-700 text-sm font-bold mb-2">Name<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="text" name="name" value="{{ $business->name }}">
            </label>
        </fieldset>
        <fieldset>
            <label for="description"><span class="block text-gray-700 text-sm font-bold mb-2">Description<span class="text-red-600">*</span></span>
                <textarea maxlength="255" class="js-count-text shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  text-red-600 name="description">{{ $business->description }}</textarea>
                <span class="text-gray-600 text-xs js-count-characters">
                    <span class="counter">0</span>/<span class="maxlength">0</span>
                    <span class="counter-error"></span>
                </span>
            </label>
        </fieldset>
        <section class="lg:grid lg:grid-cols-3 lg:gap-10">
            <fieldset class="mb-4">
                <label for="address"><span class="block text-gray-700 text-sm font-bold mb-2">Address<span class="text-red-600">*</span></span>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="text" name="address" value="{{ $business->address }}">
                    <aside class="text-sm text-gray-500">If you do not have a physical or public office, please enter "Rahway, NJ" instead.</aside>
                </label>
            </fieldset>
            <fieldset class="mb-4">
                <label for="phone"><span class="block text-gray-700 text-sm font-bold mb-2">Phone<span class="text-red-600">*</span></span>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="phone" name="phone" value="{{ $business->phone }}">
                </label>
            </fieldset>
            <fieldset class="mb-4">
                <label for="store"><span class="block text-gray-700 text-sm font-bold mb-2">Online Store, Virtual Office, Facebook Account, Etc.</span>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="store" value="{{ $business->store }}">
                </label>
            </fieldset>
        </section>
        <fieldset class="business-form-hours">
            <label for="hours"><span class="block text-gray-700 text-sm font-bold mb-2">COVID-19 Special Procedures (Hours, Office Procedures, Take-Out, Virtual Appointments, Etc.)<span class="text-red-600">*</span></span>
                <textarea maxlength="1000" class="js-count-text shadow h-32 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="hours">{{ $business->hours }}</textarea>
                <span class="text-gray-600 text-xs js-count-characters">
                    <span class="counter">0</span>/<span class="maxlength">0</span>
                    <span class="counter-error"></span>
                </span>
            </label>
        </fieldset>
        <section class="bg-gray-100 border border-gray-300 p-2 rounded lg:grid-cols-6 lg:grid lg:gap-3 mt-4 mb-4">
            @if ($business->logo )
                <a target="_blank" rel="noopener" class="modal-open" href="/storage/{{ $business->logo }} "><img class="h-40 opacity-75 rounded lg:col-span-2 hover:opacity-100 transition duration-150 ease-in-out" src="/storage/{{ $business->logo }}" /></a>

                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                    
                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    
                    <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                        <span class="text-sm">(Esc)</span>
                    </div>

                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="modal-content py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-3 text-right">
                        <div class="modal-close cursor-pointer z-50">
                            <i class="fa fa-times"></i>
                        </div>
                        </div>

                        <!--Body-->
                        <img src="/storage/{{ $business->logo }}" />

                        <!--Footer-->
                        <div class="flex justify-end pt-2">
                        <button class="modal-close button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
                        </div>
                        
                    </div>
                    </div>
                </div>
            @endif
            <fieldset class="lg:col-span-4">
                <label class="business-form-logo-upload"><span class="block text-gray-700 text-sm font-bold mb-2">Replace/Add a Logo or Promo Image</span>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="logo">
                </label>
            </fieldset>
        </section>
        <fieldset>
            <button type="submit" class="button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <i class="fa fa-plus"></i> Update Business Information
            </button>
        </fieldset>
        </form>
        
        @if ( $business->type )
            {{ $business->type }}
        @endif
    </section>

    @endforeach
</section>
@else 

<p>You have not created any Rahway Main St. listings yet.</p>

<a class="button inline-block mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="/create">Create a Listing</a>

@endif

@endsection