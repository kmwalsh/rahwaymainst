@extends('layouts.app')
@section('title', '404 - content not found')

@section('content')

<section class="page-404">
    <h1><i class="fa fa-exclamation-triangle text-yellow-500"></i> Error 404 &mdash; not found</h1>
    <p>Sorry, the requested item cannot be found. Please <a onclick="window.history.go(-1); return false;" href="#!">go back</a> and try again. If you think this is an error, please <a href="/contact">contact RMS</a>.</p>
</section>
    
@endsection