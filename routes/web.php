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
        'product' => 'Open Arms Ministry Donation',
    ]);
});

Route::post('card/update', function (\Illuminate\Http\Request $request) {
    $token = $request->input('token');
    Auth::user()->updateCard($token);
    return redirect('home')->with(['success' => 'Your card has been updated']);
});
Route::post('donation', function (\Illuminate\Http\Request $request) {
    $amount = with(new App\Sanitizers\AmountSanitizer($request->input('amount')))->sanitize(); // in whole dollar
    $amountInCents = $amount * 100;

    $user = Auth::user();

    try {
        $user->charge($amountInCents);
    } catch(\Exception $e) {
        if ( str_contains($e->getMessage(), 'has no attached payment source') ) {
            return redirect('home')->with(['error' => 'It looks like you do not have a credit/debit card set up.  Please set up a card first.']);
        }
    }

    return redirect('home')->with(['success' => 'your donation has been processed.']);
});

Route::post('subscription', function (\Illuminate\Http\Request $request) {
    $amount = $request->input('amount');
    $user = Auth::user();
    try {
        $user->newSubscription('flexible', 'flexible')->quantity($amount)->create();
    } catch(\Exception $e) {
        if ( str_contains($e->getMessage(), 'has no attached payment source') ) {
            return redirect('home')->with(['error' => 'It looks like you do not have a credit/debit card set up.  Please set up a card first.']);
        }
    }

    return redirect('home')->with(['success' => 'your recurring donation is set up.']);
});

Route::post('subscription/update', function (\Illuminate\Http\Request $request) {
    $amount = $request->input('amount');
    $user = Auth::user();
    $user->subscription('flexible', 'flexible')->updateQuantity($amount);
    return redirect('home')->with(['success' => "your recurring donation is updated.  Your card will be charged \$$amount the next cycle."]);
});