<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountStatement;

class AccountStatementController extends Controller
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

        $loans = AccountStatement::all();

        return view('statements.index',[
        	'loans' => $loans
        ]);

    }
}
