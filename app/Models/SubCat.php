<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub_cat_id'
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
