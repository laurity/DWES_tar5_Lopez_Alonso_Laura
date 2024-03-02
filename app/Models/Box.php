<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
   protected $fillable = ['label', 'location'];
    use HasFactory;


    public function items(){
        return $this->hasMany(Item::class);
    }
}
