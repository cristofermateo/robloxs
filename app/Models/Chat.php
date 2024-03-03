<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
    ];

    

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
