<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FenController extends Controller
{
    //
    public function fen_zhan(){
        $data = DB::table('fen')->where('fen_shan', '=','1')->paginate(3);
        return view('hou.fen_zhan',['data'=>$data]);
    }
    public function fen_adds(Request $request){
        $ming = $request->get('ming');
        $xian = $request->get('xian');
        $data = [
            'fen_name'=>$ming,
            'fen_sian'=>$xian,
            'fen_time'=>time(),
        ];
       // json_encode($data);
        $da = DB::table('fen')->insert($data);
        if ($da){
            $ta = ['ming'=>'成功'];
        }else{
            $ta = ['ming'=>'失败'];
        }
        json_encode($ta);
        return $ta;
    }
    public function fen_da(Request $request){
        $id = $request->get('id');
        $da=['fen_shan'=>2];
        $data = DB::table('fen')->where('fen_id'    ,$id)->update($da);
        $ming = ['ming'=>''];
        if ($data){
            $ming['ming'] = "成功";
        }else{
            $ming['ming'] = "失败";
        }
        $ming = json_encode($ming);
        return $ming;
    }
    public function fen_pu(Request $request){
        $id = $request->get('id');
        $data = DB::table('fen')->where('fen_id','=',$id)->get();
        return view('hou.fen_pu',['data'=>$data[0]]);
    }
    public function fen_pus(Request $request){
        $ming = $request->get('ming');
        $xian = $request->get('xian');
        $id = $request->get('id');
        $data = [
            'fen_name'=>$ming,
            'fen_sian'=>$xian,
            'fen_time'=>time(),
        ];
        // json_encode($data);
        $da = DB::table('fen')->where('fen_id',$id)->update($data);
        if ($da){
            $ta = ['ming'=>'成功'];
        }else{
            $ta = ['ming'=>'失败'];
        }
        json_encode($ta);
        return $ta;
    }
}
