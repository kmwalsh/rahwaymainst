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

@include('partials.search')

<section class="business-list" id="business-list">

    @if (($search) !== true && ($businesses->currentPage() === 1)) 
        <section class="business-list-count"><strong>{{$businesses->total()}}</strong> Rahway local organizations</section>
    @endif

    @if (($search) == true)
        <section class="business-list-count"><strong>{{$businesses->total()}}</strong> Rahway-local organizations related to your search <strong>"{{$q}}"</strong></section>
    @endif

    <section class="business-list-businesses">
        @foreach ($businesses as $business)
            @include('partials.business')
        @endforeach
    </section>

</section>
@endif

@if ($businesses->hasPages())
    {{ $businesses->links() }}
@endif

</div> <!-- container end for full-width --> 

@if ((($search) !== true) && ( $businesses->currentPage() === 1 ))
    <section class="section-block support-local">
        <div class="container mx-auto">
            <h2 class="section-header support-local-header">How to Support Rahway Local Businesses</h2>

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

    <section class="section-block random-business">
        <div class="container mx-auto">
            <h2 class="section-header random-header">Have You Heard of this Rahway Organization?</h2>
            <p class="section-description">Here's a random Rahway business or organization. Check them out and share your support.</p>

            @foreach ($randomBusinesses as $business)
                @include('partials.business')
            @endforeach
        </div>
    </section>
@endif

@endsection