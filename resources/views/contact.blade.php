@extends('layouts.app')
@section('title', 'Contact Rahway Main St.')

@section('content')

<form method="POST" action="/contact">
    @csrf
    <fieldset>
        <label for="name">Name<span class="required">*</span>
            <input type="email" name="email">
        </label>
    </fieldset>
    <fieldset>
        <label for="email">Email<span class="required">*</span>
            <input type="email" name="email">
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <label for="comments"><span class="block text-gray-700 text-sm font-bold mb-2">Comments<span class="text-red-600">*</span></span>
        <textarea text-red-600 class="h-32 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="comments"></textarea>
        </label>
    </fieldset>
    <fieldset>
        <p class="form-description"><a href="/terms">Terms of Service</a></p>
        <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Submit
        </button>
    </fieldset>
</form>
    
@endsection