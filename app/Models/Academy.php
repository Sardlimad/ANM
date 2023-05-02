<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Academy extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function students(){
        return $this->hasMany(Student::class, 'id_academy');
    }
    
    //Relacion uno a muchos(inversa)
    public function representa(){
        return $this->belongsTo(User::class, 'id_manager');
    }    
    
}

