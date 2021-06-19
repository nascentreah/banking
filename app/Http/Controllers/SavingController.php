<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saving;

class SavingController extends Controller
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

        $savings = Saving::all();

        return view('savings.index',[
        	'savings' => $savings
        ]);

    }
}
