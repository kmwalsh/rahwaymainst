@extends('layouts.app')

@section('title', 'Rahway Main St.')
@section('description', 'Rahway Main St., the digital main street for Rahway, New Jersey')

@section('content')

</div> <!-- container end for full-width --> 

@if ((($search) !== true) && ( $businesses->currentPage() === 1 ))
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

<!-- reopen full width -->
<div class="container mx-auto home-content-inner">

<!-- Current businesses -->
@if (count($businesses) > 0)

<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="search-input search-home">
        <label class="hidden" aria-label="Search">Search</label>
        <input type="text" class="search-input" name="q" placeholder="Search Rahway businesses, organizations, freelancers, places of worship..." value="{{ $q ?? '' }}"> <span class="input-group-btn">
        <button aria-label="Search" type="submit" class="btn btn-default">
            <i class="icon-search"></i>
        </button>
        </span>
    </div>
</form>

<section class="business-list" id="business-list">

@if (($search) !== true && ($businesses->currentPage() === 1)) 
    <section class="business-list-count"><strong>{{$businesses->total()}}</strong> Rahway local organizations</section>
@endif

@if (($search) == true)
    <section class="business-list-count"><strong>{{$businesses->total()}}</strong> Rahway-local organizations related to your search <strong>"{{$q}}"</strong></section>
@endif

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
                {!! nl2br(e($business->description)) !!}
            </section>
        @endif

        @if ( $business->phone || $business->store )
            <section class="business-contact">
                @if ( $business->phone )
                    <section class="phone">
                        <a class="button business-list-button" href="tel:{{ \App\Http\Controllers\BusinessController::formatPhoneForDialing($business->phone) }}"><i class="icon-phone mr-1"></i> {{ \App\Http\Controllers\BusinessController::formatPhone($business->phone) }}</a>
                    </section>
                @endif

                @if ( $business->store )
                    <section class="store">
                        <a target="_blank" rel="noopener" class="button business-list-button" href="{{ $business->store }}"><i class="icon-shopping-cart mr-1"></i> Visit &amp; Shop</a>
                    </section>
                @endif
                
                @if ( $business->address )
                    <section class="business-location">
                        <a class="button business-list-button" href="https://www.google.com/maps/search/{{ $business->address }}" target="_blank" rel="noopener"><i class="icon-map-marker mr-1"></i> {{ $business->address }}</a>
                    </section>
                @endif

            </section>
        @endif

        @if ( $business->hours )
            <section class="business-hours">
                <h3 class="business-hours-header">Special Hours &amp; Procedures</h3>
                {!! nl2br(e($business->hours)) !!}
            </section>
        @endif

        @if ($business->logo )
            </div> <!-- flex class for business with logo -->
        @endif

        @if ($business->logo )
            <div class="flex-left business-logo-wrapper">
                <a target="_blank" rel="noopener" class="modal-open" href="/storage/{{ $business->logo }} "><span class="screen-reader-text">{{$business->name}}</span><img alt="{{$business->name}}" class="business-logo-image" src="/storage/{{ $business->logo }}" /></a>
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
                        <i class="icon-times"></i>
                    </div>
                    </div>

                    <!--Body-->
                    <img src="/storage/{{ $business->logo }}" />

                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                    <button aria-label="close" class="modal-close button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
                    </div>
                    
                </div>
                </div>
            </div>
        @endif

        @if ($business->logo )
            </div> <!-- flex wrapper class for business with logo -->
        @endif

        @guest        
            @if ( $business->user_id === 1 ) 
                <p class="business-claim-link"><a href="/register/">Own this organization? Register to claim it.</a></p>
            @endif
        @endguest
        @auth
            @if ( $business->user_id === 1 ) 
                <p class="business-claim-link"><a href="/claim/{{$business->id}}" class="js-form-business-claim-open">Claim this organization</a></p>
            @endif
        @endauth

    </section>
@endforeach
</section>
</section>
@endif

@if ($businesses->hasPages())
    {{ $businesses->links() }}
@endif

</div> <!-- container end for full-width --> 

@if ((($search) !== true) && ( $businesses->currentPage() === 1 ))
    <section class="support-local">
        <div class="container mx-auto">
            <h2 class="support-local-header">How to Support Rahway Local Businesses</h2>

            <div class="support-wrapper">
                <div class="support-box">
                    <span class="support-graphic"><i class="icon-globe"></i></span>
                    <span class="support-label">Online Ordering</span>
                    <p class="support-description">Several Rahway businesses have shifted to online operations. You can even get <strong>same-day drop-off shipping</strong> from some Rahway businesses.</p>
                </div>
                <div class="support-box">
                    <span class="support-graphic"><i class="icon-truck"></i></span>
                    <span class="support-label">Food Delivery &amp; Carry-Out</span>
                    <p class="support-description">Numerous Rahway restaurants have enabled home delivery as well as take-out options. You can even purchase <strong>alcohol packages</strong> for home delivery.</p>
                </div>
                <div class="support-box">
                    <span class="support-graphic"><i class="icon-gift"></i></span>
                    <span class="support-label">Gift Cards</span>
                    <p class="support-description">Gift cards are a great way to help our local businesses out. Many Rahway businesses are offering <strong>gift card sales</strong> &mdash; there are some great deals right now!</p>
                </div>
                <div class="support-box">
                    <span class="support-graphic"><i class="icon-eye"></i></span>
                    <span class="support-label">Watch Virtual Classes &amp; Livestreams</span>
                    <p class="support-description">Even if you can't attend your yoga, karate, or exercise class in person, numerous Rahway organizations have shifted to <strong>live-streamed, virtual</strong> classes and meet-ups.</p>
                </div>
                <div class="support-box">
                    <span class="support-graphic"><i class="icon-comments-o"></i></span>
                    <span class="support-label">Leave Online Reviews</span>
                    <p class="support-description">Leave positive reviews for our Rahway businesses. <strong>Google reviews</strong> are great, but <strong>Facebook reviews</strong> are just as wonderful.</p>
                </div>
                <div class="support-box">
                    <span class="support-graphic"><i class="icon-mail-forward"></i></span>
                    <span class="support-label">Share on Social</span>
                    <p class="support-description">Share Rahway businesses and organizations on your <strong>personal social media feeds</strong>. Facebook likes and Twitter retweets can help get the word out!</p>
                </div>
            </div>
        </div>
    </section>
@endif

@endsection