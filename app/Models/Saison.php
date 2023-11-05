<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saison extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_d',
        'date_f',
        'tarif',
        'loueur_id',
       
         
    ];
    function user()//prop
    {
         return $this->belongsTo(User::class);
    }
}
