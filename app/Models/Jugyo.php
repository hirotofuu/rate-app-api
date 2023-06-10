<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kutikomi;

class Jugyo extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'teacher_name',
        'campus',
        'faculty',
        'field',
        'comments_open',
        'url',
        'content',
    ];

    public function kutikomis()
    {
        return $this->hasMany(Kutikomi::class);
    }

}
