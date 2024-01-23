<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugyo;
use App\Http\Resources\JugyoResource;
use App\Http\Resources\JugyoStarResource;
use App\Http\Requests\CreateJugyoRequest;
class JugyoController extends Controller
{
    // 授業作成
    public function createJugyo(CreateJugyoRequest $request){
        $firstjugyo=Jugyo::where('class_name', $request->class_name)->where('teacher_name',$request->teacher_name)->first();
        if($firstjugyo){
        }else{
            $jugyo=new Jugyo();
            $model=$jugyo->create([
                    'class_name' => $request->class_name,
                    'teacher_name' => $request->teacher_name,
                    'campus'=> $request->campus,
                    'faculty'=>$request->faculty,
                    'field'=>$request->field,
                    'url'=>$request->url,
                    'content'=>$request->content,
                ]);
            }
    }

    // 渡された名前の授業が存在しているか確認
    public function isExistJugyo(Request $request){
        $firstjugyo=Jugyo::where('class_name', $request->class_name)->where('teacher_name', $request->teacher_name)->first();
        if($firstjugyo){
            return response()->json([
                'redirect_url' => "/create/kutikomi/{$firstjugyo->class_name}/{$firstjugyo->teacher_name}/{$firstjugyo->id}"
            ]);
        }else{
            return response()->json([
                'redirect_url' => null
            ]);
        }
    }

    // 渡された名前の授業が存在しているか確認->あった場合、授業のurlわたす
    public function isExistJugyoToJugyo(Request $request){
        $firstjugyo=Jugyo::where('class_name', $request->class_name)->where('teacher_name', $request->teacher_name)->first();
        if($firstjugyo){
            return response()->json([
                'redirect_url' => "/class/{$firstjugyo->id}"
            ]);
        }else{
            return response()->json([
                'redirect_url' => null
            ]);
        }
    }

        // 授業削除
        public function deleteJugyo($request){
            $Jugyo=Jugyo::where('id', $request)->first();
            $Jugyo->delete();
        }

        // 授業一つ
        public function showJugyo($request){
            $syosai=Jugyo::find($request);
            return new JugyoResource($syosai);
        }

        // 検索フィルター
        public function filterJugyo(Request $request){
            $query=Jugyo::query();
            if($request->faculty!="all"){
                $query->where("faculty", $request->faculty);
            }
            if($request->campus!="all"){
            $query->where("campus", $request->campus);
            }
            if($request->class_name!="all"){
            $query->where('class_name', 'LIKE',"%{$request->class_name}%");
            }
            if($request->teacher_name!="all"){
            $query->where('teacher_name', 'LIKE',"%{$request->teacher_name}%");
            }
            $res=$query->with('kutikomis')->get();
            return JugyoStarResource::collection($res);
        }


        // 全部取得
        public function fetchIndex(){
            try{
                $article=Jugyo::with('kutikomis')->orderBy('id', 'DESC')->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return JugyoStarResource::collection($article);
        }

        // 検索
        public function Jugyo(Request $request){
            $jugyo=Jugyo::where('class_name', $request->class_name)->where('teacher_name', $request->teacher_name)->first();

            }

        // 編集
        public function editJugyo (CreateJugyoRequest $request){
            Jugyo::where('id', $request->id)
            ->update([
                'campus'=>$request->campus,
                'faculty'=>$request->faculty,
                'field'=>$request->field,
                'url'=>$request->url,
                'content'=>$request->content,
            ]);

        }
}
