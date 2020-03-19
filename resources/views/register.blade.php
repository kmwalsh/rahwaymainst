@extends('layouts.app')
@section('title', 'Open Your Business on Rahway Main St.')

@section('content')

<form method="POST" action="/auth/register">
    @csrf
    <fieldset>
        <label>Name<span class="required">*</span>
            <input type="email" name="email">
        </label>
    </fieldset>
    <fieldset>
        <label>Email<span class="required">*</span>
            <input type="email" name="email">
        </label>
    </fieldset>
    <fieldset>
        <label>Password<span class="required">*</span>
            <input type="password" name="password">
        </label>
    </fieldset>
    <fieldset>
        <label>Confirm Password<span class="required">*</span>
            <input type="password" name="password_confirmation">
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