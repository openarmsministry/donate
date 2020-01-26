<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// TODO: delete these
// Route::get('/test', function (Request $request) {
//     return response()->json(['data' => 'hi!!!']);
// });

// Route::post('/payment', function (Request $request) {
//     $token = $request->input('token');
//     $name = $request->input('name');
//     $email = $request->input('email');
//     $amount = with(new App\Sanitizers\AmountSanitizer($request->input('amount')))->sanitize(); // in whole dollar
//     $amountInCents = $amount * 100;

//     $user = \App\User::where('email', $email)->first();
//     if ($user) {
//         $user->updateCard($token);
//     } else {
//         $newUser = new App\User();
//         $newUser->newCustomerWithCard($token, ['email' => $email], ['name'=>$name, 'password'=> uniqid()]);
//         $user = $newUser;
//     }

//     try {
//         $user->invoiceFor('One Time Donation', $amountInCents);
//     } catch (Exception $e) {
//         return response()->json(['status' => $e->getMessage()], $e->getCode());
//     }

//     return response()->json(['status' => 'Successful']);
// });
