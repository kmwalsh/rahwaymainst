@extends('layouts.app')
@section('title', 'Get Listed on Rahway Main St.')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')
<form class="shadow-lg border border-gray-200 rounded-md p-5 mb-10" method="POST" action="/create" add enctype="multipart/form-data">
    @csrf
    
    <h2 class="text-gray-900 text-2xl font-light mt-0">Open on Rahway Main St.</h2>
    <ul>
        <li><b>Post your own businesses, freelance hours, organizations, etc.</b> Do not post for anyone else.</li>
        <li>All posts are verified  before going public. Rahway Main St. will try to verify by internet, but you may receive an e-mail or phone call.</li>
    </ul>

    <fieldset class="mb-4 mt-4">
        <label for="name"><span class="block text-gray-700 text-sm font-bold mb-1">Name<span class="text-red-600">*</span></span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="text" name="name">
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <label><span class="block text-gray-700 text-sm font-bold mb-1">Description<span class="text-red-600">*</span></span>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description"></textarea>
        </label>
    </fieldset>
    <section class="lg:grid lg:grid-cols-3 lg:gap-10">
        <fieldset>
            <label><span class="block text-gray-700 text-sm font-bold mb-1">Address<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="address" value="Rahway, New Jersey">
                <aside class="text-sm text-gray-500">No public office? Leave as "Rahway, New Jersey."</aside>
            </label>
        </fieldset>
        <fieldset>
            <label><span class="block text-gray-700 text-sm font-bold mb-1">Phone<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" name="phone">
            </label>
        </fieldset>
        <fieldset>
            <label><span class="block text-gray-700 text-sm font-bold mb-1">Online Store, Virtual Office, Facebook Account, Etc.</span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="store">
            </label>
        </fieldset>
    </section>
    <fieldset class="mb-4 mt-4">
        <label><span class="block text-gray-700 text-sm font-bold mb-1">Hours (COVID-19 Special Hours, Office Procedures, Etc.)<span class="text-red-600">*</span></span>
        <textarea text-red-600 class="h-32 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="hours"></textarea>
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <label><span class="block text-gray-700 text-sm font-bold mb-1">Logo or Promotional Image</span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="logo">
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <p class="mt-3 text-sm">
            <i class="fa fa-check"></i> I agree to the <a target="_blank" href="/terms">Terms of Service</a>.    
        </p>
        <button type="submit" class="button inline-block mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <i class="fa fa-plus"></i> Create
        </button>
    </fieldset>
</form>
    
@endsection