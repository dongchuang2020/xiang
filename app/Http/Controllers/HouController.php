<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouController extends Controller
{
    //
    public function  hou_index(){
        return view("hou.hou_index");
    }
    public function banner(){
        $data = DB::table('dao')->where('shan', '=','1')->paginate(3);
        return view("hou.banner",['data'=>$data]);
    }
    public function banner_in(Request $request){
        $ming = $request->get('ming');
        $lian = $request->get('lian');
        $xv = $request->get('xv');
        $xian = $request->get('xian');
        $data = [
            'name'=>$ming,
            'lian'=>$lian,
            'xv'=>$xv,
            'xian'=>$xian,
            'shan'=>1
        ];
        $shi = DB::table('dao')->insert($data);
        $hao=[];
        if ($shi){
            $hao['ming']='成功';
        }else{
            $hao['ming']='失败';
        }
        $hao = json_encode($hao);
        return $hao;
    }
    public function banner_shan(Request $request){
        $id= $request->get('id');
        $da=['shan'=>2];
        $data = DB::table('dao')->where('id'    ,$id)->update($da);
        $ming = ['ming'=>''];
        if ($data){
            $ming['ming'] = "成功";
        }
        $ming = json_encode($ming);
        return $ming;

    }
    public function banner_up(Request $request){
            $id = $request->get('id');
            $data = DB::table('dao')->where('id','=',$id)->get();
             return view('hou.banner_pu',['data'=>$data[0]]);
    }
    public function banner_ups(Request $request){
        $ming = $request->get('ming');
        $lian = $request->get('lian');
        $xv = $request->get('xv');
        $xian = $request->get('xian');
        $id = $request->get('id');
        $data = [
            'name'=>$ming,
            'lian'=>$lian,
            'xv'=>$xv,
            'xian'=>$xian
        ];
        $da = DB::table('dao')->where('id',$id)->update($data);
        if ($da){
            $ta = ['ming'=>'成功'];
        }else{
            $ta = ['ming'=>'失败'];
        }
        $ta = json_encode($ta);
        return $ta;
    }
    public function banner_upd(Request $request){
        $ming = $request->get('ban_ke');
        $lian = $request->get('ban_val');
        $id = $request->get('id');
        $data = [
            $ming=>$lian,
        ];
        $da = DB::table('dao')->where('id',$id)->update($data);
        if ($da){
            $ta = ['ming'=>'成功'];
        }else{
            $ta = ['ming'=>'失败'];
        }
        $ta = json_encode($ta);
        return $ta;
    }
}
