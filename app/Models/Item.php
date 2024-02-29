<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function box(){
        return $this->belongsTo(Box::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
