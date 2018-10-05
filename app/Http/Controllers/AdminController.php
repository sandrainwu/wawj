<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

	public function __construct(Request $request)
    {
      
            $this->middleware('auth:admin');
    
    }
    
	public function homeOfAdmin()
    {
        $count=DB::table('message')
                ->where('to_id',Auth::id())
                ->where('to_group','agent')
                ->where('readed',0)->count();
        $from_agency=DB::table('message')
                ->where('to_id',Auth::id())
                ->where('to_group','agent')
                ->where('readed',0)
                ->where('from_group','agency')
                ->count();
        $from_agent=DB::table('message')
                ->where('to_id',Auth::id())
                ->where('to_group','agent')
                ->where('readed',0)
                ->where('from_group','agent')
                ->count();
        $from_client=DB::table('message')
                ->where('to_id',Auth::id())
                ->where('to_group','agent')
                ->where('readed',0)
                ->where('from_group','user')
                ->count();
        return view('admin.home')->with([
            'message_count'=>$count,
            'from_agency'=>$from_agency,
            'from_agent'=>$from_agent,
            'from_client'=>$from_client,
        ]);
    }

	
	

}