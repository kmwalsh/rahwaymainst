@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" class="form-wrapper mx-auto" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <fieldset>
            <h2 class="form-header">{{ __('Reset Password') }}</h2>
            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
            <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
        </fieldset>

        <fieldset>
            <button type="submit" class="btn form-button">
                {{ __('Reset Password') }}
            </button>
        </fieldset>
    </form>
</div>
@endsection
