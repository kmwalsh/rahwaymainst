@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="w-full max-w-md mx-auto alert alert-success mb-10" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="w-full max-w-md mx-auto bg-white shadow-md border border-gray-200 rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('password.email') }}">
        <div class="text-gray-900 text-2xl font-light mb-2 mt-0">{{ __('Reset Password') }}</div>
        @csrf

        <div class="form-group row">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mt-4">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
