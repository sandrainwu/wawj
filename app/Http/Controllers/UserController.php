<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
 	public function __construct(Request $request)
    {
      
            $this->middleware('auth:user');
       
    }

	public function HomeOfUser()
    {

        return view('user.home');

    }

	

	public function SaleHouse()
	{

        return view('user.salehouse');

    }

	



}
