<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'date_e',
        'date_s',
        'isAccepted',
        'montant',
        'heure_recup',
        'heure_remise',
        'client_id',
        'car_id',
        'extra_id',
        'pay_id',
        
        
         
    ];

    function client()//prop
    {
         return $this->belongsTo(User::class);
    }
    function car()//prop
    {
         return $this->belongsTo(Car::class);
    }
    function pay()//prop
    {
         return $this->belongsTo(Pay::class);
    }
     
    public function extra()//propertie 
    {
            return $this->hasMany(Extra::class);
    }
}
