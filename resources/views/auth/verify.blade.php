@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h2 class="text-2xl font-medium">{{ __('Verify Your Email Address') }}</h2>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }}:
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">{{ __('Request another verification') }}</button>
    </form>
</div>
@endsection
