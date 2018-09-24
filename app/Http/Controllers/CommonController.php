<?php

namespace App\Http\Controllers;

use App\Model\Agency;
use App\Model\Agent;
use App\Model\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    //
	public function __construct(Request $request)
    {
    
        $this->middleware('islogin:user_agent');
                    
    }
    
   
	public function changePassword(Request $request)
    {
        //dd(Auth::guard($request->get('guardname')));
        return view('auth.passwords.change');
    }

    
    public function changePasswordAjax(Request $request)
    {
        //dd(Auth::guard($request->get('guardname')));
        if($request->filled('account_phone')
            &&$request->filled('password')
            &&$request->filled('newpassword')
            &&$request->filled('retypepassword')){

            if($request->filled('newpassword')==$request->filled('retypepassword')){
                $guardname=$request->get('guardname');
                if(Auth::guard($guardname)->attempt([
                        'account_phone' => $request->get('account_phone'),
                        'password' => $request->get('password'),
                        'active' => 'Active'])){
                    return DB::table($guardname)
                              ->where('id',Auth::guard($guardname)->id())
                              ->update(['password'=>bcrypt($request->get('newpassword'))]);
    
                }
            
            }
        }
        return 0;
    }

    public function agencyDetailAjax(Request $request,$id)
    {
        $result = Agency::where('id', $id)
                    ->where('active','Active')
                    ->select('introduction','address','phone')
                    ->get();
        return $result[0];
    }

    public function agentDetailAjax($id)
    {
        $result = Agent::where('id', $id)
                    ->where('active','Active')
                    ->select('introduction','account_phone')
                    ->get();
        return $result[0];
    }

    public function messageReplyAjax(Request $request,$message_id)
    {
       //if (\Request::ajax()&&$request->has('role'))
       //{
            $group=$request->get('role');
            $subject=$request->get('ps');
            $message_type=$request->get('action');
            //dd($message_type);
            $user_id=Auth::guard($group)->id();
            $result=DB::table('message')
                  ->where(['id'=>$message_id,'to_group'=>$group,'to_id'=>$user_id,])
                  ->get(['from_id','from_group'])
                  ->first();
            if(count($result))
            {
                
                $message = Message::create([
                        'reply_to_id' => $message_id,
                        'from_id' => $user_id,
                        'from_group' => $group,
                        'to_id' => $result->from_id,
                        'to_group' => $result->from_group,
                        'subject' => $subject,
                        'message_type' => $message_type,
                    ]);
                if($message->save()){
                    DB::table('message')
                          ->where(['id'=>$message_id])
                          ->update(['replyed'=>1]);
                    return 'true';
                }
            }
            return 'false';
            
        //}
    }

    public function messageDetailAjax(Request $request,$message_id)
    {
       if (\Request::ajax()&&$request->has('role'))
       {
            $group=$request->get('role');
            $user_id=Auth::guard($group)->id();
            //dd($user_id);
            $list = DB::table('message')
                ->join('user','user.id','=','message.from_id')
                ->where(['message.id'=>$message_id,'message.to_group'=>$group,'message.to_id'=>$user_id])
                ->get(['message.subject','message.message_type','message.appendix','message.readed','user.real_name','user.email as email','user.account_phone as phone'])
                ->first();
            if ($list->readed==0) {
                DB::table('message')->where('id',$message_id)->update(['readed' => 1]);
            }
            // if($list->message_type=='请求代理服务'){
            //     $appendix=$list->appendix;
            //     if(strpos($appendix,'all')){
                    
            //     }
            //     elseif(strpos($appendix,'before')){
            //         $appendix=substr($appendix,6,-1);

            //     }
            //     elseif(strpos($appendix,'after')){
            //         $appendix=substr($appendix,5,-1);

            //     }
            // }
             return response()->json($list);
        }
    }

    public function messageDeleteAjax(Request $request,$message_id)
    {
       if (\Request::ajax()&&$request->has('role'))
       {
            $group=$request->get('role');
            $user_id=Auth::guard($group)->id();
            //dd($user_id);
            $list = DB::table('message')
                ->join('user','user.id','=','message.from_id')
                ->where(['message.id'=>$message_id,'message.to_group'=>$group,'message.to_id'=>$user_id])
                ->get(['message.subject','message.message_type','message.appendix','message.readed','user.real_name','user.email as email','user.account_phone as phone'])
                ->first();
            if ($list->readed==0) {
                DB::table('message')->where('id',$message_id)->update(['readed' => 1]);
            }
            // if($list->message_type=='请求代理服务'){
            //     $appendix=$list->appendix;
            //     if(strpos($appendix,'all')){
                    
            //     }
            //     elseif(strpos($appendix,'before')){
            //         $appendix=substr($appendix,6,-1);

            //     }
            //     elseif(strpos($appendix,'after')){
            //         $appendix=substr($appendix,5,-1);

            //     }
            // }
             return response()->json($list);
        }
    }
    
}