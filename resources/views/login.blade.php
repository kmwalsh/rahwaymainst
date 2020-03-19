@extends('layouts.app')
@section('title', 'Login to Rahway Main St.')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')

<form method="POST" action="/auth/login">
    @csrf
    <fieldset>
        <label>Username (Email)<span class="required">*</span>
            <input type="email" name="email">
        </label>
    </fieldset>
    <fieldset>
        <label>Password<span class="required">*</span>
            <input type="password" name="password">
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