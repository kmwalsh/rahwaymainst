@extends('layouts.app')

@section('title', 'Rahway Main St.')
@section('description', 'Rahway Main St., the digital main street for Rahway, New Jersey')

@section('content')

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

@endsection