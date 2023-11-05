<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    
    use HasFactory;
    protected $primaryKey = 'idCar';
    protected $fillable = [
        'carname',
        'marque',
        'model',
        'nplace',
        'nporte',
        'Carburant',
        'isDisponible',
        'description',
         'slug',
        'image',
        'user_id',
        'categorie_id',
        
         
    ];

   

    public function user()//propertie 
    {
            return $this->belongsTo(User::class);
    }

    
    public function reservation()//propertie 
    {
            return $this->hasMany(Reservation::class);
    }

    public function categorie()//propertie 
    {
            return $this->belongsTo(Categorie::class);
    }

    
}
