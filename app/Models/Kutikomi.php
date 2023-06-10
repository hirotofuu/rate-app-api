<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jugyo;
use App\Models\Comment;

class Kutikomi extends Model
{
    use HasFactory;

    protected $fillable = [
        'attend',
        'type',
        'day',
        'text',
        'test',
        'task',
        'field',
        'comment',
        'evaluate',
        'rate',
        'jugyo_id',
    ];

    public function jugyo()
    {
        return $this->belongsTo(Jugyo::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
