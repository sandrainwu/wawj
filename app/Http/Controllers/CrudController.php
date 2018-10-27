<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{

    public function __construct(Request $request)
    {
    
        $this->middleware('auth:admin');
                    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($table,Request $request)//列表
    {
        
        if($request->filled('pagesize'))
            $pagesize=$request->pagesize;
        else
            $pagesize=20;
        
        $tablealias;
        switch ($table)
        {
        case 'user':
            //code to be executed if expression = label1;
            $tablealias='客户';
        
            break;  
        case 'agent':
            //code to be executed if expression = label2;
            $tablealias='中介业务员';
        
            break;
        case 'agency':
            //code to be executed if expression = label2;
            $tablealias='中介机构';
        
            break;
        case 'administrator':
            //code to be executed if expression = label2;
            $tablealias='系统管理员';
        
            break;
        default:
            //;
        }

        return view('admin.table'.$table)->with(['tablealias'=>$tablealias,'pagesize'=>$pagesize,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($table)//新增
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($table, $id)//删除
    {
        DB::table($table)->where('id', $id)->delete();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$table, $id)//修改
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $table)//查询
    {
        if ($request->filled('keyword')&&$request->filled('field')){
            $temparray=array('account_phone','real_name','email','id_number');
            if(in_array($request->field, $temparray)){
                $list=DB::table($table)->where($request->field,'like','%'.($request->keyword).'%')->get();
            }
            else
                $list=DB::table($table)->where([$request->field=>$request->keyword])->get();
        }
        else
            $list=DB::table($table)->get();

        return $list;
    }

}
