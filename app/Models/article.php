<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'type',
        'brand',
        'model',
        'serial',
        'description',
        'status'
    ];

    public function operations(){
        return $this->hasMany('App\Models\Operation');
    }

    public function loans(){
        return $this->belongsTo(loan::class);
    }
    
    
}


