<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugyo;
use App\Http\Resources\JugyoResource;
use App\Http\Resources\JugyoStarResource;
use App\Http\Requests\CreateJugyoRequest;
class JugyoController extends Controller
{
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

        public function deleteJugyo($request){
            $Jugyo=Jugyo::where('id', $request)->first();
            $Jugyo->delete();
        }

        public function showJugyo($request){
            $syosai=Jugyo::find($request);
            return new JugyoResource($syosai);
        }


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


        public function fetchIndex(){
            try{
                $article=Jugyo::with('kutikomis')->orderBy('id', 'DESC')->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return JugyoStarResource::collection($article);
        }

        public function Jugyo(Request $request){
            $jugyo=Jugyo::where('class_name', $request->class_name)->where('teacher_name', $request->teacher_name)->first();

            }

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
