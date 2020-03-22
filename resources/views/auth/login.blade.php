@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" class="w-full max-w-md mx-auto bg-white shadow-md border border-gray-200 rounded px-8 pt-6 pb-8 mb-4" action="{{ route('login') }}">
    @csrf

    <h2 class="text-gray-900 text-2xl mb-3 mt-0 font-light">{{ __('Login to Rahway Main St.') }}</h2>
    <div class="form-group row">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

        <div class="mb-4">
            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

        <div class="mb-2">
            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0 mt-4">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</form>

<p class="w-full max-w-md text-center mx-auto text-xs text-gray-600">Don't have an account? <a href="/register">Register an account</a></p>
</div>
@endsection
