<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kutikomi;
use Illuminate\Http\Request;
use App\Http\Resources\KutikomiResource;
use App\Http\Resources\ShowKutikomiResource;
use App\Http\Requests\KutikomiRequest;
class KutikomiController extends Controller
{
    // 口コミ作成
    public function createKutikomoi(KutikomiRequest $request){
        $kutikomi=new Kutikomi();
        $mdoel=$kutikomi->create([
                'attend' => $request->attend,
                'type' => $request->type,
                'day' => $request->day,
                'text' => $request->text,
                'test'=> $request->test,
                'task'=>$request->task,
                'comment'=>$request->comment,
                'evaluate'=>$request->evaluate,
                'rate'=>$request->rate,
                'jugyo_id'=>$request->jugyo_id,
            ]);
        }

        // 口コミ削除
        public function deleteKutikomi($request){
            $kutikomi=Kutikomi::where('id', $request)->first();
            $kutikomi->delete();
        }

        // 授業ごとに口コミfetch
        public function fetchJugyoKutikomi($request){
            try{
                $kutikomi=Kutikomi::orderBy('id', 'DESC')->where('jugyo_id', $request)->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return KutikomiResource::collection($kutikomi);
        }


        // 一つ口コミfetch
        public function showJugyoKutikomi($request){
            try{
                $kutikomi=Kutikomi::find($request);
            }catch(Exception $e){
                throw $e;
            }
            return new ShowKutikomiResource($kutikomi);
        }


}
