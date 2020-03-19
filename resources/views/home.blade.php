@extends('layouts.app')
@section('title', 'Rahway Main St.')

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

<section class="business-form-list" id="business-list">
<h2 class="mb-2">Your Main St. Rahway Business Listings</h2>

    @foreach ($businesses as $business)
    <section class="shadow-lg border border-gray-200 rounded-md p-5 mb-10">
        
        <header class="business-form-header flex flex-row justify-between">
            <h3 class="business-name text-2xl font-semibold">{{ $business->name }}</h3>
            
            <div class="flex flex-row mb-2">
                @if ($business->approved == 0 )
                    <span class="border p-1 pr-2 pl-2 mr-1 rounded-sm border-yellow-600 text-sm font-hairline uppercase text-yellow-600 bg-yellow-100"><i class="fa fa-hourglass"></i> Pending</span>
                @else
                    <span class="border p-1 pr-2 pl-2 mr-1 rounded-sm border-green-600 text-sm font-hairline uppercase text-green-600 bg-green-100 approved"><i class="fa fa-check"></i> Approved</span>
                @endif
                
                @if( $superadmin )
                    <form class="border p-1 pr-2 pl-2 inline-block rounded-sm border-gray-600 text-sm font-hairline uppercase text-gray-600 bg-gray-100" method="POST" action="/status/{{$business->id}}">
                        @csrf
                        <fieldset>
                            <button type="submit" class="admin-button button">
                                <i class="fa fa-plus"></i> Admin: Change Status
                            </button>
                        </fieldset>
                    </form>
                @endif
            </div>
        </header>

        <form class="business-form business-update-form" method="POST" action="/update/{{$business->id}}" add enctype="multipart/form-data">
        
        @csrf
        
        <h3 class="font-semibold">Public Data</h3>
        <p class="text-sm text-gray-500">This information will be published.</p>

        <fieldset class="mb-4 mt-4">
            <label for="name"><span class="block text-gray-700 text-sm font-bold mb-2">Name<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="text" name="name" value="{{ $business->name }}">
            </label>
        </fieldset>
        <fieldset class="mb-4 mt-4">
            <label for="description"><span class="block text-gray-700 text-sm font-bold mb-2">Description<span class="text-red-600">*</span></span>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  text-red-600 name="description">{{ $business->description }}</textarea>
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
                <textarea text-red-600 class="shadow h-32 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="hours">{{ $business->hours }}</textarea>
            </label>
        </fieldset>
        <section class="bg-gray-100 border border-gray-300 p-2 rounded lg:grid-cols-6 lg:grid lg:gap-3 mt-4">
            @if ($business->logo )
                <a target="_blank" href="/storage/{{ $business->logo }} "><img class="h-40 opacity-75 lg:col-span-2 hover:opacity-100 transition duration-150 ease-in-out" src="/storage/{{ $business->logo }}" /></a>
            @endif
            <fieldset class="lg:col-span-4">
                <label class="business-form-logo-upload"><span class="block text-gray-700 text-sm font-bold mb-2">Replace/Add a Logo or Promo Image</span>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="logo">
                </label>
            </fieldset>
        </section>
        <h3 class="font-semibold mt-5">Private Data</h3>
        <p class="text-sm text-gray-500">This information will not be published.</p>
        <fieldset class="mb-4">
            <label for="email"><span class="block text-gray-700 text-sm font-bold mb-2">Email<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="email" name="email" value="{{ $business->email }}">
            </label>
        </fieldset>
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