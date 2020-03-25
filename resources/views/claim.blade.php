@extends('layouts.app')

@section('title', 'Rahway Main St.')
@section('description', 'Rahway Main St., the digital main street for Rahway, New Jersey')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>

    <p><a href="/" class="button">Back to Rahway Main St.</a></p>
@else 

@if($businesses->user_id === 1)
<section class="business-claim">
    <form method="POST" class="form-wrapper form-business-claim js-form-business-claim" action="contact">
        @include('common.errors')
        @csrf

        <h2 class="form-header">Claim <b>{{$businesses->name}}</b></h2>
        <p class="form-description">If you are a business owner and you'd like to claim this business to make alterations to the hours or business information, please fill the form.</p>
        <fieldset class="mb-4 mt-4">
            <label for="name"><span class="form-label">Name<span class="text-red-600">*</span></span>
                <input required type="text" name="name" class="form-input" value="{{ old('name', $user->name ) }}">
            </label>
        </fieldset>
        <fieldset class="mb-4">
            <label for="email"><span class="form-label">Email<span class="text-red-600">*</span></span>
                <input required type="email" name="email" class="form-input" value="{{ old('email') }}">
            </label>
        </fieldset>
        <fieldset class="mb-4">
            <label for="phone"><span class="form-label">Phone<span class="text-red-600">*</span></span>
                <input required type="phone" name="phone" class="form-input" value="{{ old('phone') }}">
            </label>
        </fieldset>
        <fieldset class="mb-4">
            <label for="comments"><span class="form-label">Comments<span class="text-red-600">*</span></span>
            <textarea required maxlength="255" class="js-count-text h-32 form-input" name="comments">{{ old('comments') }}</textarea>
            <span class="form-count-characters js-count-characters">
                <span class="counter">0</span>/<span class="maxlength">0</span>
                <span class="counter-error"></span>
            </span>
            </label>
        </fieldset>
        <fieldset>
            <button type="submit" class="form-button">
                <i class="fa fa-envelope"></i> Claim {{$businesses->name}}
            </button>
        </fieldset>
    </form>
</section>
@else
    <h1>Error &mdash; business already claimed</h1>
    <p>Sorry, this business is already claimed. If you believe this is in error please <a href="/about">contact Rahway Main St.</a></p>
@endif

@endif

@endsection