@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="w-full max-w-md mx-auto alert alert-success mb-10" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-wrapper mx-auto" method="POST" action="{{ route('password.email') }}">
        <h2 class="form-header">{{ __('Reset Password') }}</h2>
        @csrf

        <fieldset>
            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset>
            <button type="submit" class="button form-button">
                {{ __('Send Password Reset Link') }}
            </button>
        </fieldset>
    </form>
</div>
@endsection
