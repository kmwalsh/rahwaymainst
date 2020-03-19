    @extends('layouts.app')

@section('title', 'Rahway Main St.')

@section('content')

</div> <!-- container end for full-width --> 

<section class="home-hero">
    <div class="container mx-auto">
        <div class="home-hero-content">
            <h2>Rahway Main St.</h2>
            <p>Rahway Main St. is a "digital main street" for Rahway, New Jersey. It was created in response to the COVID-19 outbreak. Rahway citizens can easily discover changes to business hours, church services, and more. Help support your local businesses in these strange times.</p>

            <a class="button" href="#business-list">Walk Down Rahway Main St.</a>
            @guest                
                <a class="button" href="/register">Open on Rahway Main St.</a>
            @endguest
        </div>
    </div>
</section>

<div class="container mx-auto">
<!-- Current businesses -->
@if (count($businesses) > 0)
<section class="business-list" id="business-list">
<h2>Shop Rahway local — digitally!</h2>
<section class="business-list-businesses">
@foreach ($businesses as $business)
    <section class="business">
        <h3>{{ $business->name }}</h3>        

        @if ($business->logo )
            <img src="/storage/{{ $business->logo }} " />
        @endif

        @if ( $business->description )
            {{ $business->description }}
        @endif

        @if ( $business->phone )
        <i class="fa fa-phone"></i> {{ $business->phone }}
        @endif

        @if ( $business->store )
            <a href="{{ $business->store }}">Shop Online</a>
        @endif

        @if ( $business->hours )
            {{ $business->hours }}
        @endif
    </section>
@endforeach
</section>
</section>
@endif

<section class="rms-about">
    <p>Rahway Main St. was created by a Rahway citizen in response to the early 2020 COVID-19 outbreak. Many local businesses, government offices, churches, and other organizations have needed to change procedures. We've seen switches to takeout only, off-hours, virtual appointments, and more. With this radical shift in how we do business, Rahway Main St. was created to provide a "digital main street" for Rahway, New Jersey.</p>
</section>
    
@endsection