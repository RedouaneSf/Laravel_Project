<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Notifications\Notification;
use App\Notifications\UserRegisterNotification;



class ReservationController extends Controller
{
    
    public function index()
    {
        $profiles=Car::paginate(5);
        return view ('reservation.index',compact('profiles'));
    }
    public function show(Request $request)
    {   $id=(int)$request->idCar;
        $profile=Car::findOrFail($id);
        if($profile===null)
        {
            return abort(404);
        }
      $cat= $table=DB::table('cars')
      ->join('categories','categories.id_categories',"=",'cars.categorie_id')
      ->where('cars.idCar',$id)
      ->get();

      $lieus= $table=DB::table('lieus')
      ->join('villes','villes.id_ville',"=",'lieus.ville_id')
      ->join('users','users.ville_ID',"=",'villes.id_ville')
      ->join('cars','cars.user_id',"=",'users.id')
      ->where('cars.idCar',$id)
      ->get();
        
      
        return view('reservation.create',compact('profile','cat','lieus'));
    }
    public function store(Request$req)
    {  
        

      
        $id=(int)$req->car_id;
        $ex=(int)$req->extra_id;

        $user=DB::table('users')
        ->join('cars','cars.user_id',"=",'users.id')
        ->join('reservations','cars.idCar',"=",'reservations.car_id')
        
        ->where('cars.idCar',$id)
        ->get();
        $user_id=auth()->user()->id;
        $user_send=auth()->user()->name;
        /*Notification::send($user,new UserRegisterNotification($user_id,$user_send));*/
       /* $user->notify(new UserRegisterNotification($user_id,$user_send));*/
        
         
        $cat=DB::table('categories')
        ->join('cars','cars.categorie_id',"=",'categories.id_categories')
        ->where('cars.idCar',$id)
        ->get();
        
          

        $extra=DB::table('extras')
       ->where('extras.id_extra',$ex)
       ->get();
         
           

     
         foreach($cat as $c)
         {
            $prix=$c->prix;
         }

         foreach(  $extra as $extras)
           {
               $extras->prix;     
           }
        $fdate = $req->input('date_e');
        $tdate = $req->input('date_s');
        $datetime1 = strtotime($fdate); // convert to timestamps
        $datetime2 = strtotime($tdate); // convert to timestamps
        $days = (int)(($datetime2 - $datetime1)/86400);
        $mt=$days*$prix+$extras->prix;
      

       Reservation::create([
            'status'=>$req->input('status'),
            'date_s'=>$req->input('date_s'),
            'date_e'=>$req->input('date_e'),
            'heure_recup'=>$req->input('heure_recup'),
            'heure_remise'=>$req->input('heure_remise'),
            'montant'=>$mt,
            'client_id'=>$req->input('client_id'),
            'car_id'=> $req->input('car_id'),
            'extra_id'=> $req->input('extra_id'),
            'pay_id'=> $req->input('pay_id'),
            
         ]);


         
         return redirect()->back()->with('message',' avec succes');
          
      
    }
      
    
}
