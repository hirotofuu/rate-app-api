<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\StarsResource;

// json化関数（授業２）!

class JugyoStarResource extends JsonResource
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
            'class_name'=>$this->class_name,
            'teacher_name'=>$this->teacher_name,
            'campus'=>$this->campus,
            'faculty'=>$this->faculty,
            'stars'=>StarsResource::collection($this->kutikomis),
        ];
    }
}
