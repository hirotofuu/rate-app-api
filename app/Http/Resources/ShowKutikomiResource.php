<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentResource;

// json化関数（口コミ詳細）

class ShowKutikomiResource extends JsonResource
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
            'attend'=>$this->attend,
            'type'=>$this->type,
            'day'=>$this->day,
            'text'=>$this->text,
            'test'=>$this->test,
            'task'=>$this->task,
            'comment'=>$this->comment,
            'evaluate'=>$this->evaluate,
            'rate'=>$this->rate,
            'jugyo_id'=>$this->jugyo_id,
        ];
    }
}
