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
        $this->create($request->all());
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
            'certificate_number' => 'required',
            'feature' => 'required',
            ],$message
            );
    }


	protected function create(array $data)
    {
       
        return SaleHouse::create([
                'user_id' => $data['user_id'],
                'community' => $data['community'],
                'house_type' => $data['house_type'],
                'area' => $data['area'],
                'certificate_number' => $data['certificate_number'],
                'feature' => $data['feature'],
            ]);
    
    }

    protected function myPostList()
    {
       
        return SaleHouse::create([
                'user_id' => $data['user_id'],
                'community' => $data['community'],
                'house_type' => $data['house_type'],
                'area' => $data['area'],
                'certificate_number' => $data['certificate_number'],
                'feature' => $data['feature'],
            ]);
    
    }










}
