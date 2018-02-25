<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    //

	public function __construct(Request $request)
    {
      
            $this->middleware('auth:agent');
    
    }
    
	public function HomeOfAgent()
    {
        
        return view('agent.home');
    }

}
