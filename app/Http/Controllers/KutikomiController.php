<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kutikomi;
use Illuminate\Http\Request;
use App\Http\Resources\KutikomiResource;

class KutikomiController extends Controller
{
    public function createKutikomoi(Request $request){
        $kutikomi=new Kutikomi();
        $mdoel=$kutikomi->create([
                'attend' => $request->attend,
                'text' => $request->text,
                'test'=> $request->test,
                'task'=>$request->task,
                'evaluate'=>$request->evaluate,
                'rate'=>$request->rate,
                'jugyo_id'=>$request->jugyo_id,
            ]);
        }

        public function deleteKutikomi($request){
            $kutikomi=Kutikomi::where('id', $request)->first();
            $Jugyo->delete();
        }


        public function fetchJugyoKutikomi($request){
            try{
                $kutikomi=Kutikomi::orderBy('id', 'DESC')->where('jugyo_id', $request)->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return KutikomiResource::collection($kutikomi);
        }


        public function showJugyoKutikomi($request){
            try{
                $kutikomi=Kutikomi::orderBy('id', 'DESC')->where('id', $request)->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return KutikomiResource::collection($kutikomi);
        }

}
