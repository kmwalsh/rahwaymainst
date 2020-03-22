@extends('layouts.app')

@section('content')
<div class="container mx-auto">

<div class="register-grid">
<section class="register-grid-form">
    <form method="POST" class="form-wrapper" action="{{ route('register') }}">
        @csrf

        <h2 class="form-header">{{ __('Register for Rahway Main St.') }}</h2>


        <fieldset>
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset>
            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <p class="form-description mb-0">Use a valid e-mail address &mdash; accounts must be validated.</p>
        </fieldset>

        <fieldset>
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset>
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="form-input focus:shadow-outline @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
        </fieldset>

        <fieldset>
            <button type="submit" class="button form-button">
                {{ __('Register') }}
            </button>
        </fieldset>
    </form>
</section>
<section class="register-grid-info">
    <h1 class="rms-header">{{ __('Open on Rahway Main St.') }}</h1>
    <section class="rms-content">
        <p>Are you a Rahway business owner, freelancer, contractor, organization, or other public institution? List yourself on Main Street Rahway!</p>

        <p>Any Rahway-based public institution, business, freelancer, church, contractor, landscaper, government organization, office, restaurant, park, etc. may register to join. If you are located in Rahway and you provide a public service or you own a business &mdash; you are welcome to join.</p>

        <p>Joining is completely free. It was created by a Rahway citizen to give back to the community!</p>
    </section>
</section>

</div>
@endsection
