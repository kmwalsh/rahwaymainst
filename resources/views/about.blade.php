@extends('layouts.app')
@section('title', 'About Rahway Main St.')
@section('description', 'About Rahway Main St., the digital main street for Rahway, New Jersey')

@section('content')
<section class="rms-about">
    <section>
        <h1 class="rms-header">Made with <i class="icon-heart text-red-900"></i> in Rahway, New Jersey</h1>
        <p class="rms-text">Rahway Main St. was created by a Rahway citizen in response to the early 2020 COVID-19 outbreak. Many local businesses, government offices, churches, and other organizations have needed to change procedures. We've seen switches to takeout only, off-hours, virtual appointments, and more. With this radical shift in how we do business, Rahway Main St. was created to provide a "digital main street" for Rahway, New Jersey.</p>

        <h2>Credit</h2>
        <p>Thank you <a href="https://laravel.com/" target="_blank">Laravel</a>, <a href="https://tailwindcss.com" target="_blank">Tailwind CSS</a>, &amp; <a href="https://www.tailwindtoolbox.com/" target="_blank">Tailwind Toolbox</a>.</p>

        <p>RMS is hosted by <a href="https://m.do.co/c/af79114d1ab2">DigitalOcean</a>, with domain by <a href="https://namecheap.pxf.io/c/1234756/386170/5618">Namecheap</a>.</p>
    </section>
    <section class="rms-contact">
        <form method="POST" class="form-wrapper" action="contact">
            @include('common.errors')
            @csrf

            <h2 class="form-header">{{ __('Contact Rahway Main St.') }}</h2>
            <fieldset class="mb-4">
                <label for="name"><span class="form-label">Name<span class="text-red-600">*</span></span>
                    <input required type="text" name="name" class="form-input" value="{{ old('name') }}">
                </label>
            </fieldset>
            <fieldset class="mb-4">
                <label for="email"><span class="form-label">Email<span class="text-red-600">*</span></span>
                    <input required type="email" name="email" class="form-input" value="{{ old('email') }}">
                </label>
            </fieldset>
            <fieldset class="mb-4">
                <label for="comments"><span class="form-label">Comments<span class="text-red-600">*</span></span>
                <textarea required maxlength="255" class="js-count-text h-32 form-input" name="comments">{{ old('comments') }}</textarea>
                <span class="form-count-characters js-count-characters">
                    <span class="counter">0</span>/<span class="maxlength">0</span>
                    <span class="counter-error"></span>
                </span>
                <p class="form-description">Please note, <b>we cannot answer any specific questions about any listing on RMS.</b> If you have a question about a business or organization's hours or special procedures, please try to reach out directly to that business.</p>
                </label>
            </fieldset>
            <fieldset>
                <button type="submit" class="form-button">
                    <i class="fa fa-envelope"></i> Contact Rahway Main St.
                </button>
            </fieldset>
        </form>
    </section>
</section>
@endsection