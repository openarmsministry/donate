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
    if ($amount <= 0) {
        return redirect()->back()->with(['error' => 'Please input a numeric value.']);
    }

    $amountInCents = $amount * 100;

    $user = Auth::user();

    try {
        $user->invoiceFor('One Time Donation', $amountInCents);
    } catch(\Exception $e) {
        if ( str_contains($e->getMessage(), 'has no attached payment source') ) {
            return redirect('home')->with(['error' => 'It looks like you do not have a credit/debit card set up.  Please set up a card first.']);
        }
    }

    return redirect('home')->with(['success' => 'your donation has been processed.']);
});

Route::post('subscription', function (\Illuminate\Http\Request $request) {
    $inputAmount = $request->input('amount');
    $sanitizedFloat = with(new App\Sanitizers\AmountSanitizer($inputAmount))->sanitize();
    $amount = floor($sanitizedFloat);
    if ($amount <= 0) {
        return redirect()->back()->with(['error' => 'Please input a numeric value greater than 1.']);
    }
    $user = Auth::user();
    try {
        $subscription = $user->newSubscription('flexible', 'flexible')->quantity($amount)->create();

        $stripeSubscription = $subscription->asStripeSubscription();
        $stripeSubscription->prorate = false;
        $stripeSubscription->save();

    } catch(\Exception $e) {
        if ( str_contains($e->getMessage(), 'has no attached payment source') ) {
            return redirect('home')->with(['error' => 'It looks like you do not have a credit/debit card set up.  Please set up a card first.']);
        }
    }

    return redirect('home')->with(['success' => 'your recurring donation is set up.']);
});

Route::delete('subscription', function () {
    $user = Auth::user();
    $user->subscription('flexible')->cancelNow();
    return redirect('home')->with(['success' => 'your recurring donation has been canceled.']);
});

Route::get('faq', function () {
  return view('faq');
});

Route::post('subscription/update', function (\Illuminate\Http\Request $request) {
    /**
     * @var $user \App\User
     * @var $model \Laravel\Cashier\Subscription
     */
    $inputAmount = $request->input('amount');
    $sanitizedFloat = with(new App\Sanitizers\AmountSanitizer($inputAmount))->sanitize();
    $amount = floor($sanitizedFloat);
    if ($amount <= 0) {
        return redirect()->back()->with(['error' => 'Please input a numeric value greater than 1.']);
    }
    $user = Auth::user();
    $model = $user->subscription('flexible');
    $subscription = $model->asStripeSubscription();
    $subscription->quantity = $amount;
    $subscription->prorate = false;
    $subscription->save();
    $model->quantity = $amount;
    $model->save();

    return redirect('home')->with(['success' => "your recurring donation is updated.  Your card will be charged \$$amount the next cycle."]);
});

Route::post('users/address', function (\Illuminate\Http\Request $request) {
    $user = Auth::user();
    $user->address_line_one = $request->get('line_one');
    $user->address_line_two = $request->get('line_two');
    $user->address_city = $request->get('city');
    $user->address_state = $request->get('state');
    $user->address_zip = $request->get('zip');
    $user->save();

    $customer = $user->asStripeCustomer();
    $customer->metadata = [
        'name' => $user->name,
        'address_line1' => trim($user->address_line_one) ? $user->address_line_one : null,
        'address_line2' => trim($user->address_line_two) ? $user->address_line_two : null,
        'address_city' => trim($user->address_city) ? $user->address_city: null,
        'address_state' => trim($user->address_state) ? $user->address_state: null,
        'address_zip' => trim($user->address_zip) ? $user->address_zip: null
    ];
    $customer->save();
    return redirect('home')->with(['success' => "Thank you! Your mailing address is updated"]);
});