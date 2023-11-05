<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'status',
        

    ];

    public function user()//propertie
    {
           return $this->hasMany(User::class,'ville_ID','id');
    }
    public function lieu()//propertie
    {
           return $this->hasMany(Lieu::class,'ville_id','id');
    }

    

    
}
