<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ReplyResource;

// json化関数（コメント）!

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'uid'=>$this->uid,
            'name'=>$this->name,
            'day'=>$this->day,
            'comment'=>$this->comment,
            'replies'=>$this->replies,
        ];
    }
}
