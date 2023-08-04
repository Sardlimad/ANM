<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
      
    //Relacion Uno a Muchos
    public function academy(){
        return $this->belongsTo(Academy::class);
    }

    //Relacion Muchos a Muchos
    public function operations(){
        return $this->hasMany(Operation::class);
    } 

}
