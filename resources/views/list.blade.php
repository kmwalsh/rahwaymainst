@extends('layouts.app')

@section('title', 'Rahway Main St.')
@section('description', 'Rahway Main St., the digital main street for Rahway, New Jersey')

@section('content')

</div> <!-- container end for full-width --> 

@if (($search) !== true )
<section class="home-hero">
    <div class="container mx-auto">
        <div class="home-hero-container">
            <h2 class="home-hero-header">Shop Rahway local — digitally!</h2> 
            <p class="home-hero-content">Rahway Main St. is a "digital main street" for Rahway, New Jersey. It was created in response to COVID-19. Rahway citizens can discover changes to business hours, church services, organization procedures, and more. Support local organizations in these strange times.</p>

            <a class="button home-hero-button" href="#business-list">Walk Down Rahway Main St.</a>
            @guest                
                <a class="button home-hero-button" href="/register">Open on Rahway Main St.</a>
            @endguest
        </div>
    </div>
</section>
@endif

<div class="container mx-auto home-content-inner">
<!-- Current businesses -->
@if (count($businesses) > 0)

<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="search-input search-home">
        <input type="text" class="search-input" name="q" placeholder="Search Rahway businesses, organizations, freelancers, churches..."> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>

<section class="business-list" id="business-list">
<section class="business-list-businesses">
@foreach ($businesses as $business)
    <section class="standard-box">

        @if ($business->logo )
            <div class="business-list-grid">

            <div class="business-list-information">
        @endif

        <h3 class="business-list-name">{{ $business->name }}</h3>

        @if ( $business->description )
            <section class="business-description">
                {{ $business->description }}
            </section>
        @endif

        @if ( $business->phone || $business->store )
            <section class="business-contact mb-2 flex flex-row mt-8">
                @if ( $business->phone )
                    <section class="phone mb-3 mr-2">
                        <a class="button business-list-button" href="tel:{{ $business->phone }}"><i class="fa fa-phone mr-1"></i> {{ $business->phone }}</a>
                    </section>
                @endif

                @if ( $business->store )
                    <section class="store mb-3">
                        <a target="_blank" rel="noopener" class="button business-list-button" href="{{ $business->store }}"><i class="fa fa-shopping-cart mr-1"></i> Shop Online</a>
                    </section>
                @endif
            </section>
        @endif

        @if ( $business->address )
            <section class="business-location">
                <i class="fa fa-map-marker mr-1"></i> <a href="https://www.google.com/maps/search/{{ $business->address }}" target="_blank" rel="noopener">{{ $business->address }}</a>
            </section>
        @endif

        @if ( $business->hours )
            <section class="business-hours">
                <h3 class="business-hours-header">Special Hours &amp; Procedures</h3>
                {{ $business->hours }}
            </section>
        @endif

        @if ($business->logo )
            </div> <!-- flex class for business with logo -->
        @endif

        @if ($business->logo )
            <div class="flex-left business-logo-wrapper">
                <a target="_blank" rel="noopener" class="modal-open" href="/storage/{{ $business->logo }} "><img class="business-logo-image" src="/storage/{{ $business->logo }}" /></a>
            </div>

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

        @if ($business->logo )
            </div> <!-- flex wrapper class for business with logo -->
        @endif

    </section>
@endforeach
</section>
</section>
@endif
    
@endsection