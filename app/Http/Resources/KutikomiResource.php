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
            'day'=>$this->day,
            'comment'=>$this->comment,
            'evaluate'=>$this->evaluate,
            'rate'=>$this->rate,
        ];
    }
}
