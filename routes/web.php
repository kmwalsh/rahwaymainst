<?php

use App\Business;
use App\Deal;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('sitemap', 'SitemapController@generate')->name('sitemap');

Route::get('/', function () {
    $businesses = Business::where('approved', '1')->orderBy('created_at', 'asc')->paginate(10);
    $randomBusinesses = Business::inRandomOrder()->limit(1)->get();

    return view('list', [
        'businesses'        => $businesses,
        'randomBusinesses'  => $randomBusinesses,
        'search'            => false,
        'page'              => 'page-home'
    ]);
});

Route::get('terms', function () {
    return view('terms');
});

Route::get('privacy', function () {
    return view('privacy');
});

Route::get('about', function () {
    return view('about');
});
// contact
Route::post('/contact', 'ContactController@contact')->name('contact');

Route::get('links', function () {
    return view('links');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@index')->name('home');

// search
Route::any('/search', 'SearchController@search')->name('search');

// create
Route::get('/create', 'BusinessController@createBusiness')->name('create');
Route::post('/create', 'BusinessController@makeBusiness')->name('create');

// update
Route::get('/edit/{id}', 'BusinessController@editBusiness');
Route::post('/edit/{id}', 'BusinessController@updateBusiness')->name('edit');

Route::post('/status/{id}', 'BusinessController@changeBusinessStatus')->name('status');

// claim
Route::get('claim/{id?}', 'BusinessController@claimBusinessForm')->name('claim');
Route::post('/claim/{id}', 'BusinessController@claimBusiness')->name('claim');

// Authentication Routes...
Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('auth/login', 'Auth\LoginController@getLogin');
Route::post('auth/login', 'Auth\LoginController@postLogin');
Route::get('auth/logout', 'Auth\LoginController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\RegisterController@getRegister');
Route::post('auth/register', 'Auth\RegisterController@postRegister');

Auth::routes(['verify' => true]);