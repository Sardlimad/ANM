<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    public function operations(){
        return $this->belongsToMany(operation::class, 'id_article');
    }
    
    
}


