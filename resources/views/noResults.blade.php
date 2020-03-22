@extends('layouts.app')

@section('title', 'Rahway Main St.')
@section('description', 'Rahway Main St., the digital main street for Rahway, New Jersey')

@section('content')

<h1 class="mb-4">Sorry, no results matching the search &ldquo;{{$q}}.&rdquo;</h1>
<p class="mb-10">Please try searching again. Try searching for a synonym or similar word, for example &mdash; "taco" instead of "Mexican food" or "lawyer" instead of "legal."</p>

<form action="/search" method="POST" role="search" class="">
    {{ csrf_field() }}
    <div class="search-input">
        <input type="text" class="shadow-lg border border-gray-200 rounded-md p-5 mb-10" name="q" placeholder="Search businesses" value="{{ $q }}"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>

@endsection