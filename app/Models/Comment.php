<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'name',
        'comment',
        'kutikomi_id',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
