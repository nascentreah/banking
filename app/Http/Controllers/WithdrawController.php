<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
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
     * Shows Loans
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        // $this->authorize('viewAny', [Leave::class]);

        $withdraws = Withdraw::all();

        return view('withdraws.index',[
        	'withdraws' => $withdraws
        ]);

    }
}
