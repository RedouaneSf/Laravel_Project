<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $user=auth()->user()->id;
        
        
        
        return view('client.index')->with('User',User::where('id',$user)->get());
            
         
        
    }

    public function showreservation()
    {
      $id=auth()->user()->id;
      $data = DB::table('reservations')
    ->join('cars', 'reservations.car_id', '=', 'cars.idCar')
    ->join('users', 'cars.user_id', '=', 'users.id')
    ->join('villes', 'users.ville_ID', '=', 'villes.id_ville')
    ->join('lieus', 'villes.id_ville', '=', 'lieus.ville_id')
    ->join('pays', 'reservations.pay_id', '=', 'pays.id_pay')
    ->where('reservations.client_id', '=',  $id)
    
    ->get();
    
      return view('client.reservation',compact('data'));
        
    }

    public function search(Request $request)
    {
             $date_e=$request->input('date_e');
             $date_s=$request->input('date_s');
             $ville=$request->input('id_ville');

      
    $data = $table=DB::table('cars')
      ->join('users','users.id',"=",'cars.user_id')
      ->where('users.ville_ID', $ville)
      ->get();
      

     /* $data = $table=DB::table('cars')
      ->join('reservations','reservations.car_id',"=",'cars.id')
      ->where('reservations.date_s', $date_s)
      ->get();
       */
    /*$orderList = DB::table('reservations')
    ->join('cars', 'reservations.car_id', '=', 'cars.id')
    ->join('users', 'cars.user_id', '=', 'users.id')
    ->where('users.ville_ID', '=', 2)
    ->where('reservations.date_s','=','2023-07-06')
    ->where('reservations.date_e','=','2023-07-03')
    ->get();*/

    /*$data = DB::table('reservations')
    ->join('cars', 'reservations.car_id', '=', 'cars.id')
    ->join('users', 'cars.user_id', '=', 'users.id')
    ->join('villes', 'users.ville_ID', '=', 'villes.id_ville')
    ->where('users.ville_ID', '=',  $ville)
    
     ->get();
    */
    
   
    
    
      
    

      

      

      /*$cat= $table=DB::table('cars')
      ->join('categories','categories.id_categories',"=",'cars.categorie_id')
      ->where('cars.id',$id)
      ->get();*/
     

      return view('client.search',compact('data'));
        
    }


    public function profile()
    {
        $table=DB::table('users')
        ->join('villes','users.ville_ID',"=",'villes.id_ville')
        ->where('users.isLoueur',"0")
        ->where('users.isLoueur',"0")
        ->where('users.isLoueur',"0")
        
        ->where('users.id',auth()->user()->id)
        ->get();
        
        
        
         
       
        
        return view('client.profile',compact('table'));
    }




     //update
     public function edit(User $profile)
     {
        return view('client.profileEdit',compact('profile'));
     }
 
     public function update(Request$req,User  $profile )
     {
         $name=$req->name;
         
         $email=$req->email;
         $password=$req->password;
         
        
         
     
         $profile->name = $name;
         $profile->email = $email;
         
         $profile->password = $password;
        
         
         
         
         $profile->save();
           
         return to_route('client.profile',$profile->id)->with('success','modifier avec success');
     }
    
}
