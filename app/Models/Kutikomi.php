<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Jugyo;

class Kutikomi extends Model
{
    use HasFactory;

    protected $fillable = [
        'attend',
        'text',
        'test',
        'task',
        'field',
        'evaluate',
        'rate',
        'jugyo_id',
    ];

    public function comments()
    {
        return $this->belongsTo(Jugyo::class);
    }
}
