<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'lib',
        'prix',
       
         
    ];

    public function car()//propertie 
    {
            return $this->hasMany(Car::class);
    }
}
