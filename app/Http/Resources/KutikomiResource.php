<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KutikomiResource extends JsonResource
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
            'text'=>$this->text,
            'test'=>$this->test,
            'task'=>$this->task,
            'evaluate'=>$this->evaluate,
            'rate'=>$this->rate,
            'jugyo_id'=>$this->jugyo_id,
        ];
    }
}