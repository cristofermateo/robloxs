<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'type'
    ];

    public function chat(){
        return $this->hasOne(Chat::class);
    }


    public function rules(){
        return $this->hasMany(Rule::class);
    }


    public function servers(){
        return $this->hasMany(Server::class);
    }
}


