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


        public function fetchIndex(){
            try{
                $article=Jugyo::orderBy('id', 'DESC')->take(200)->get();
            }catch(Exception $e){
                throw $e;
            }
            return JugyoResource::collection($article);
        }

        public function editJugyo (Request $request){

            Jugyo::where('id', $request->id)
            ->update([
                'campus'=>$this->campus,
                'faculty'=>$this->faculty,
                'field'=>$this->field,
                'url'=>$this->url,
                'content'=>$this->content,
            ]);

        }
}