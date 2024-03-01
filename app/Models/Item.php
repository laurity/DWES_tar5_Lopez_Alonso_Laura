<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'picture',
        'price',
        'box_id'
    ];

    use HasFactory;
    public function box(){
        return $this->belongsTo(Box::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }
}
