<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
