@extends('layouts.app')
@section('title', 'Open on Rahway Main St.')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')
<form class="form-wrapper form-create-rms" method="POST" action="/create" add enctype="multipart/form-data">
    @csrf
    
    <h2 class="form-header">Open on Rahway Main St.</h2>
    <ul class="mb-8">
        <li><b>Post your own businesses, freelance hours, organizations, etc.</b> Do not post for anyone else.</li>
        <li>Your business may already be posted with data taken from websites or Facebook posts. You can claim existing listings, but you're also welcome to start fresh.</li>
        <li>All posts are verified before going public. Rahway Main St. will try to verify by internet, but you may receive an e-mail or phone call.</li>
    </ul>

    <fieldset>
        <label for="name"><span class="form-label">Name<span class="form-required">*</span></span>
            <input class="form-input" text-red-600 type="text" name="name" value="{{ old('name') }}">
        </label>
    </fieldset>
    <fieldset>
        <label>
            <span class="form-label">Description<span class="form-required">*</span></span>
            <textarea maxlength="255" class="js-count-text form-input" name="description">{{ old('description') }}</textarea>
            <span class="form-count-characters js-count-characters">
                    <span class="counter">0</span>/<span class="maxlength">0</span>
                    <span class="counter-error"></span>
            </span>
        </label>
    </fieldset>
    <section class="form-grid">
        <fieldset>
            <label><span class="form-label">Address<span class="form-required">*</span></span>
                <input class="form-input"  type="text" name="address" value="Rahway, New Jersey" value="{{ old('address') }}">
                <aside class="text-sm text-gray-500">No public office? Leave as "Rahway, New Jersey."</aside>
            </label>
        </fieldset>
        <fieldset>
            <label><span class="form-label">Phone<span class="form-required">*</span></span>
                <input class="form-input" type="tel" name="phone">
            </label>
        </fieldset>
        <fieldset>
            <label><span class="form-label">Online Store, Virtual Office, Facebook Account, Etc.</span>
                <input class="form-input" type="text" name="store" value="{{ old('store') }}">
            </label>
        </fieldset>
    </section>
    <fieldset>
        <label>
            <span class="form-label">Hours (COVID-19 Special Hours, Office Procedures, Etc.)<span class="form-required">*</span></span>
            <textarea maxlength="1000" class="js-count-text h-32 form-input" name="hours">{{ old('hours') }}</textarea>
            <span class="form-count-characters js-count-characters">
                <span class="counter">0</span>/<span class="maxlength">0</span>
                <span class="counter-error"></span>
            </span>
        </label>
    </fieldset>
    <fieldset>
        <label><span class="form-label">Logo or Promotional Image</span>
            <input class="form-input" type="file" name="logo" accept="image/*">
        </label>
    </fieldset>
    <fieldset>
        <p class="mt-3 text-sm">
            <i class="icon-check"></i> I agree to the <a target="_blank" href="/terms">Terms of Service</a>.    
        </p>
        <button type="submit" class="button form-button">
            <i class="icon-plus"></i> Create
        </button>
    </fieldset>
</form>
    
@endsection