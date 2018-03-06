<?php

namespace App\Http\Controllers;

use App\Model\SaleHouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

	public function saleHouseSave(Request $request)
	{

        $this->validator($request->all())->validate();
        
        if ( null !== $request->input('post_id')){

            $this->createSaleHouse($request->all());
        }

        elseif  ( null !== $request->input('user_id')){
        
            $this->editSaleHouse($request->all());
        
        }

            return view('user.salehousesavedsuccess');

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
            'user_id' => 'required|integer',
            'house_type' => 'required',
            'area' => 'required',
            'price' => 'required',
            'certificate_number' => 'required',
            'feature' => 'required',
            ],$message
            );
    }


	protected function createSaleHouse(array $data)
    {
       
        return SaleHouse::create([
                'user_id' => $data['user_id'],
                'community' => $data['community'],
                'house_type' => $data['house_type'],
                'area' => $data['area'],
                'price' => $data['price'],
                'certificate_number' => $data['certificate_number'],
                'feature' => $data['feature'],
            ]);
    
    }
    
    protected function editSaleHouse(array $data)
    {
        $mypost = SaleHouse::find($data['post_id']);
        $mypost->user_id = $data['user_id'];
        $mypost->community = $data['community'];
        $mypost->house_type = $data['house_type'];
        $mypost->area = $data['area'];
        $mypost->price = $data['price'];
        $mypost->certificate_number = $data['certificate_number'];
        $mypost->feature = $data['feature'];
        return $mypost->save();
    
    }

    protected function postList($id)
    {
        $count = SaleHouse::where('user_id', $id)->count();
        $list = SaleHouse::where('user_id',$id)->get();
        return view('user.postlist',[
        'list' => $list,
        'count' => $count,
    ]);
    }

    protected function saleHouseEdit($id)
    {
        $list = SaleHouse::find($id);
        return view('user.salehouse',[
        'list' => $list,
        'post_id' => $id,
    ]);

    }


}
