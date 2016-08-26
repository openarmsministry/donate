<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUpdate()
    {
        $user = \Auth::user();
        try {
            $invoices = $user->invoices();
        } catch (\Exception $e) {
            $invoices = [];
        }

        return view('home', compact('invoices', 'user'));
    }
}
