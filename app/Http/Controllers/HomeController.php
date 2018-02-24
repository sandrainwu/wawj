<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
      
       if ($request->path() == 'user')
            $this->middleware('auth:user');
       elseif ($request->path() == 'agent')
            $this->middleware('auth:agent');
       

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }



    public function indexOfUser()
    {

        return view('user.home');
    }

    public function indexOfAgent()
    {
        
        return view('agent.home');
    }
}