@extends('layouts.app')
@section('title', 'Get Listed on Rahway Main St.')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')
<form class="shadow-lg border border-gray-200 rounded-md p-5 mb-10" method="POST" action="/create" add enctype="multipart/form-data">
    @csrf
    
    <h2 class="text-gray-900 text-2xl font-light">Post a Listing</h2>
    <ul class="list-disc list-inside">
        <li><b>Post your own businesses, organizations, etc.</b> Do not post for anyone else.</li>
        <li>All listings on Rahway Main St. are verified and approved by the site administrator before going public. You may receive an e-mail or phone call requesting more information about your submission.</li>
    </ul>

    <fieldset class="mb-4 mt-4">
        <label for="name"><span class="block text-gray-700 text-sm font-bold mb-2">Name<span class="text-red-600">*</span></span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" text-red-600 type="text" name="name">
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <label><span class="block text-gray-700 text-sm font-bold mb-2">Description<span class="text-red-600">*</span></span>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description"></textarea>
        </label>
    </fieldset>
    <section class="lg:grid lg:grid-cols-3 lg:gap-10">
        <fieldset class="mb-4 mt-4">
            <label><span class="block text-gray-700 text-sm font-bold mb-2">Address<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="address">
                <aside class="text-sm text-gray-500">If you do not have a physical or public office, please enter "Rahway, NJ" instead.</aside>
            </label>
        </fieldset>
        <fieldset class="mb-4 mt-4">
            <label><span class="block text-gray-700 text-sm font-bold mb-2">Phone<span class="text-red-600">*</span></span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" name="phone">
            </label>
        </fieldset>
        <fieldset class="mb-4 mt-4">
            <label><span class="block text-gray-700 text-sm font-bold mb-2">Online Store, Virtual Office, Facebook Account, Etc.</span>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="store">
            </label>
        </fieldset>
    </section>
    <fieldset class="mb-4 mt-4">
        <label><span class="block text-gray-700 text-sm font-bold mb-2">Hours (COVID-19 Special Hours, Office Procedures, Etc.)<span class="text-red-600">*</span></span>
        <textarea text-red-600 class="h-32 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="hours"></textarea>
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <label><span class="block text-gray-700 text-sm font-bold mb-2">Logo or Promotional Image</span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="logo">
        </label>
    </fieldset>
    <fieldset class="mb-4 mt-4">
        <p class="mt-3 text-sm"><i class="fa fa-check"></i> I agree to the <a href="/terms">Terms of Service</a>.</p>
        <button type="submit" class="button inline-block mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <i class="fa fa-plus"></i> Submit Business
        </button>
    </fieldset>
</form>
    
@endsection