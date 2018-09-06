<?php

namespace App\Http\Controllers;

use App\Model\Agency;
use App\Model\Agent;
use App\Model\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    //

	public function __construct(Request $request)
    {
      
   
    }
    
	
    public function agencyInfo($id)
    {
        $result = Agency::where('id', $id)->where('active','Active')->select('introduction','address','phone')->get();
        return $result[0];
    }
    public function agentInfo($id)
    {
        $result = Agent::where('id', $id)->where('active','Active')->select('introduction','account_phone')->get();
        return $result[0];
    }


}