<?php

namespace App\Http\Controllers;

use App\Model\Agent;
use App\Model\Agency;
use App\Model\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
 	public function __construct(Request $request)
    {
      
            $this->middleware('auth:user');
       
    }

	public function homeOfUser()
    {

        return view('user.home');

    }
	

    public function saleHouse()
    {

        return view('user.salehouse');

    }

    public function buyHouse()
    {
        return view('user.buyhouse');

    }

    public function rentHouse()
    {

        return view('user.renthouse');

    }

    public function letHouse()
    {

        return view('user.lethouse');

    }

    public function employAgent()
    {

        return view('user.employagent');

    }

	public function transactionSave(Request $request)
	{

        $this->validator($request->all())->validate();
        
        if ( $request->filled('post_id')){

            $this->editTransaction($request->all());
        }

        else {
            
            $this->createTransaction($request->all());
        
        }
        
        return view('user.transactionsavesuccess');

    }

	
 	protected function validator(array $data)
    {
        
         $message=['community.Required'=>'请填写 住宅小区名称',
            'house_type.required'=>'请选择房产类型',
            'area.Required'=>'请填写建筑面积',
        	'certificate_number.Required'=>'请填写房产证编号',
        	'feature.Required'=>'请填写房产特点',
        ];
        return Validator::make($data, [
            'house_type' => 'required',
            'area' => 'required',
            'price' => 'required',
            'certificate_number' => 'required',
            'feature' => 'required',
            ],$message
            );
    }


	protected function createTransaction(array $data)
    {
       
        return Transaction::create([
                'user_id' => Auth::id(),
                'transaction' => $data['transaction'],
                'community' => $data['community'],
                'house_type' => $data['house_type'],
                'area' => $data['area'],
                'price' => $data['price'],
                'certificate_number' => $data['certificate_number'],
                'feature' => $data['feature'],
            ]);
    
    }
    
    protected function editTransaction(array $data)
    {
        $mypost = Transaction::find($data['post_id']);
        $mypost->user_id = $data['user_id'];
        $mypost->community = $data['community'];
        $mypost->house_type = $data['house_type'];
        $mypost->area = $data['area'];
        $mypost->price = $data['price'];
        $mypost->certificate_number = $data['certificate_number'];
        $mypost->feature = $data['feature'];
        return $mypost->save();

    }

    protected function postListDelete(Request $request)
    {
        if ( $request->filled('tobedeleted')){
            $id=Auth::id();
            $deleted = array();
            foreach ($request->tobedeleted as $b=>$c){
                $v="delete from transaction where id=$c and user_id=$id";
                if(DB::delete($v)){
                    $deleted[$b]=$c;
                }
            }
            return $deleted;
        }
        return "false";
    }


    protected function postList()
    {
        $id=Auth::id();
        $count = Transaction::where('user_id', $id)->count();
        $list = Transaction::where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('user.postlist',[
        'list' => $list,
        'count' => $count,
    ]);
    }

    protected function searchPost(Request $request)
    {
        $id=Auth::id();
        //$count = Transaction::where('user_id', $id)->count();
        $result = Transaction::where('user_id',$id)->where('community','like','%'.$request->search.'%')->select('id','transaction','community')->get();
        return $result;
    }
    protected function postInfo($id)
    {
        $user_id=Auth::id();
        //$count = Transaction::where('user_id', $id)->count();
        $result = Transaction::where('id',$id)->where('user_id',$user_id)->select('community','transaction','house_type','area','feature','price')->get();
        return $result[0];
    }

    protected function saleHouseEdit($id)
    {
        $list = Transaction::find($id);
        return view('user.salehouse',[
        'list' => $list,
        'post_id' => $id,
        'backto' =>$this->backto($_SERVER['HTTP_REFERER']),
        ]);

    }
   
    protected function rentHouseEdit($id)
    {
        $list = Transaction::find($id);
        return view('user.renthouse',[
        'list' => $list,
        'post_id' => $id,
        'backto' =>$this->backto($_SERVER['HTTP_REFERER']),
        ]);

    }
    protected function letHouseEdit($id)
    {
        $list = Transaction::find($id);
        return view('user.lethouse',[
        'list' => $list,
        'post_id' => $id,
        'backto' =>$this->backto($_SERVER['HTTP_REFERER']),
        ]);

    }
    

    private function backto($refer)
    {
        $backto=route('userHome');
        if(strpos($refer, 'postList')){
            $backto=$refer;
        }
        return($backto);

    }

    protected function buyHouseEdit($id)
    {
        $list = Transaction::find($id);
        return view('user.buyhouse',[
        'list' => $list,
        'post_id' => $id,
        'backto' =>$this->backto($_SERVER['HTTP_REFERER']),
        ]);

    }

    public function searchAgent(Request $request){
        $result = Agent::where('real_name','like','%'.$request->search.'%')->where('active', 'Active')->select('id','real_name','account_phone')->get();
        return $result;
    }
    
    public function searchAgency(Request $request){
        $result = Agency::where('agency_name','like','%'.$request->search.'%')->orWhere('introduction','like','%'.$request->search.'%')->where('active', 'Active')->select('id','agency_name','phone')->get();
        return $result;
    }

    public function bindAgentTransaction(Request $request){
        $bind_agent=$request->bind_agent;
        $bind_transaction=$request->bind_transaction;
        if($bind_agent!="" and $bind_transaction!=""){
            $t = explode("-", $bind_agent);
            $sql="insert into message (from_group,from_id,to_group,to_id,message_type,appendix) values ('user','".Auth::id()."','".$t[0]."','".$t[1]."','请求代理业务','";
            if($bind_transaction=='all' or  $bind_transaction=="before" or  $bind_transaction=="after"){
                $s= DB::table('transaction')->max('id');
                $sql.=$bind_transaction."|".$s."')";
            }
            else{
                $sql.=$bind_transaction."')";
            }
            if(DB::insert($sql))
                return 'true';
            else
                return 'false';
        }

    }
}