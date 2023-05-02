<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
      
    //Relacion Uno a Muchos
    public function academia(){
        return $this->belongsTo(Academy::class, 'id_academy');
    }

    //Relacion Muchos a Muchos
    public function operations(){
        return $this->belongsToMany(Operation::class);
    } 

}
