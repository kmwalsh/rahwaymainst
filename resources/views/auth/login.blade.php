@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" class="mx-auto form-wrapper" action="{{ route('login') }}">
    @csrf

    <h2 class="form-header">{{ __('Login to Rahway Main St.') }}</h2>
    
    <fieldset>
        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </fieldset>


    <fieldset class="mb-2">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </fieldset>

    <fieldset>
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </fieldset>

    <fieldset>
        <button type="submit" class="button form-button">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </fieldset>
    <p class="register-no-account-text">Don't have an account? <a href="/register">Register an account</a></p>
</form>

</div>
@endsection
