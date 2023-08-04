<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Academy extends Model
{
    use HasFactory;

    protected $fillable = [
        'city'
    ];

    //Relacion uno a muchos
    public function students(){
        return $this->hasMany(Student::class);
    }

}

