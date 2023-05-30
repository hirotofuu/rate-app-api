<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugyo;
use App\Http\Resources\JugyoResource;

class JugyoController extends Controller
{
    public function createJugyo(Request $request){
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
            $res=$query->get();
            return JugyoResource::collection($res);
        }


        public function fetchIndex(){
            try{
                $article=Jugyo::orderBy('id', 'DESC')->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return JugyoResource::collection($article);
        }

        public function Jugyo(Request $request){
            $jugyo=Jugyo::where('class_name', $request->class_name)->where('teacher_name', $request->teacher_name)->first();

            }

        public function editJugyo (Request $request){

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
