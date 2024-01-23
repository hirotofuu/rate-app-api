<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Str;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReplyRequest;
class CommentController extends Controller
{
    // コメント作成
    public function createComment(CommentRequest $request){
            $comment=new Comment();
            $model=$comment->create([
                    'name' => $request->name,
                    'day' => $request->day,
                    'comment'=> $request->comment,
                    'kutikomi_id'=>$request->kutikomi_id,
                ]);
            return $model->id;
    }

    // コメント削除
    public function deleteComment($request){
        $Comment=Comment::where('id', $request)->first();
        $Comment->delete();
    }

    // 返信削除
    public function deleteReply($request){
        $Reply=Reply::where('id', $request)->first();
        $Reply->delete();
    }

    // コメント取得
    public function fetchComment($request){
        try{
            $comments=Comment::with('replies')->orderBy('id', 'DESC')->where('kutikomi_id', $request)->get();
        }catch(Exception $e){
            throw $e;
        }
        return CommentResource::collection($comments);
    }

    // 返信作成
    public function createReply(ReplyRequest $request){
        $reply=new Reply();
        $model=$reply->create([
                'name' => $request->name,
                'day' => $request->day,
                'reply'=> $request->reply,
                'comment_id'=>$request->comment_id,
            ]);
        }

}
