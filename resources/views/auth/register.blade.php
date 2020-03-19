@extends('layouts.app')

@section('content')
<div class="container mx-auto">

<div class="lg:grid lg:grid-cols-3 lg:gap-10">
<section class="lg:col-span-1">
    <form method="POST" class="w-full max-w-md mx-auto bg-white shadow-md border border-gray-200 rounded px-8 pt-6 pb-8 mb-4" action="{{ route('register') }}">
        @csrf

        <h2 class="text-gray-900 text-2xl font-light">Register for Rahway Main St.</h2>

        <div class="form-group row">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

            <div class="mb-4">
                <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

            <div class="mb-4">
                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <p class="text-gray-700 text-xs mb-3 mt-1">Use a valid e-mail address &mdash; accounts must be validated.</p>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

            <div class="mb-4">
                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>

            <div class="mb-4">
                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</section>
<section class="lg:col-span-2">
    <h1 class="text-4xl mb-4">{{ __('Open on Rahway Main St.') }}</h1>
    <p class="text-xl mb-8">Are you a Rahway business owner, freelancer, contractor, organization, or other public institution? List yourself on Main Street Rahway!</p>

    <p class="text-xl mb-8">Any Rahway-based public institution, business, freelancer, church, contractor, landscaper, government organization, office, restaurant, park, etc. may register to join. If you are located in Rahway and you provide a public service or you own a business &mdash; you are welcome to join.</p>

    <p class="text-xl">Joining is completely free. It was created by a Rahway citizen to give back to the community!</p>
</section>

</div>
@endsection
