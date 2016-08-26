<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('user/invoice/{invoice}', function ($invoiceId) {
    return Auth::user()->downloadInvoice($invoiceId, [
        'vendor'  => 'Open Arms Ministry',
        'product' => 'One Time Donation',
    ]);
});

Route::post('card/update', function (\Illuminate\Http\Request $request) {
    $token = $request->input('token');
    Auth::user()->updateCard($token);
    return redirect('home')->with(['success' => 'Your card has been updated']);
});