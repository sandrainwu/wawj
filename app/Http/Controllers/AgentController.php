<?php

namespace App\Http\Controllers;

use App\Model\Agency;
use App\Model\Agent;
use App\Model\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    //

	public function __construct(Request $request)
    {
      
            $this->middleware('auth:agent');
    
    }
    
	public function homeOfAgent()
    {
        $count=DB::table('message')->where('to_id',Auth::id())->where('to_group','agent')->where('readed',0)->count();
        $from_agency=DB::table('message')->where('to_id',Auth::id())->where('to_group','agent')->where('readed',0)->where('from_group','agency')->count();
        $from_agent=DB::table('message')->where('to_id',Auth::id())->where('to_group','agent')->where('readed',0)->where('from_group','agent')->count();
        $from_client=DB::table('message')->where('to_id',Auth::id())->where('to_group','agent')->where('readed',0)->where('from_group','user')->count();
        return view('agent.home')->with(['message_count'=>$count,'from_agency'=>$from_agency,'from_agent'=>$from_agent,'from_client'=>$from_client,]);
    }

	public function joinAgency()
    {
        $id=Auth::id();
        $temp = Agent::where('id',$id)->get(['belong_to_agency','apply_to_agency']);
        $belong_to_agency = $temp[0]['belong_to_agency'];
        $apply_to_agency = $temp[0]['apply_to_agency'];
        $count = Agency::where('active','Active')->count();
        $list = Agency::where('active','Active')->orderBy('created_at','desc')->get();
        return view('agent.joinagency',[
        'list' => $list,
        'count' => $count,
        'belong_to_agency' => $belong_to_agency,
	    'apply_to_agency' => $apply_to_agency,
	    ]);
    }

    public function getClientMessage()
    {
        $id=Auth::id();
        $temp = Message::where(['to_group','agent'])->get(['belong_to_agency','apply_to_agency']);
        $belong_to_agency = $temp[0]['belong_to_agency'];
        $apply_to_agency = $temp[0]['apply_to_agency'];
        $count = Agency::where('active','Active')->count();
        $list = Agency::where('active','Active')->orderBy('created_at','desc')->get();
        return view('agent.joinagency',[
        'list' => $list,
        'count' => $count,
        'belong_to_agency' => $belong_to_agency,
        'apply_to_agency' => $apply_to_agency,
        ]);
    }

    public function joinAgencySubmit(Request $request)
    {
        if ( $request->filled('tobeselected')){
            $id=Auth::id();
            $sql="update agent set apply_to_agency=concat(apply_to_agency,'";
            foreach ($request->tobeselected as $b=>$c){
            	Message::create(['from_id' => $id,'to_id' => $c, 'message_type'=>'请求加盟','from_group'=>'agent','to_group'=>'agency']);
            	$result[$b]=$c;
            	$sql.="|$c|";
            }
            $sql.="') where id=".$id;
            DB::update($sql);
			return $result;
        }
        	return "false";
    }
	public function joinAgencyDrawback(Request $request)
    {
   		if ($request->filled('agencyid')){
            $id=Auth::id();
            $sql="update agent set apply_to_agency=REPLACE(apply_to_agency,'|$request->agencyid|', '') where id=$id";
            DB::update($sql);
			return $request->agencyid;
        }
        	return "false";
    }
	

}