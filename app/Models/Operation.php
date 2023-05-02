<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function students(){
        return $this->hasOne(student::class, 'id', 'id_student');
    }

    public function articles(){
        return $this->hasOne(article::class, 'id', 'id_article');
    }

    public function users(){
        return $this->hasOne(user::class, 'id', 'id_user');
    }

    
}
