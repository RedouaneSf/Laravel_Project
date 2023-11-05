<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoursController extends Controller
{
    public function indexbyuser()
    {
        $user=auth()->user()->id;
        
        
        return view('loueur.car')->with('cars',Car::where('user_id',$user)->get());
        
    }

    public function indexbyreservation(Request $req)
    {
       
       

      $id=auth()->user()->id;
      $data = DB::table('reservations')
     ->join('cars', 'reservations.car_id', '=', 'cars.idCar')
     ->join('users', 'reservations.client_id', '=', 'users.id')
     ->join('pays', 'reservations.pay_id', '=', 'pays.id_pay')
     
     ->join('villes', 'users.ville_ID', '=', 'villes.id_ville')
     ->join('lieus', 'villes.id_ville', '=', 'lieus.ville_id')
     
     ->where('cars.user_id', '=',  $id)
     ->orderBy('reservations.id','DESC')
     
     
     
    
     
     ->get();
     

     
     
      return view('loueur.reservation',compact('data'));
        
        
    }

    public function changeStatusCar($id)
    {
        $getStatus = Car::select('isDisponible')->where('idCar',$id)->first();
        $reservation = Reservation::all();

        foreach( $reservation as $item)
        {
           $item->isAccepted;
        }

        if($getStatus->isDisponible==1)
        {
            $status=0;
            $item->isAccepted=1;
        }
        else
        {
            $status=1;
             $item->isAccepted=0;
        }
        Car::where('idCar',$id)->update(['isDisponible'=>$status]);
        Reservation::where('car_id',$id)->update(['isAccepted'=>$item->isAccepted]);
        
        return redirect()->back();
    }

    
    public function profile()
    {
        $table=DB::table('users')
        ->join('villes','users.ville_ID',"=",'villes.id_ville')
        ->where('users.isLoueur',"1")
        ->where('users.id',auth()->user()->id)
        ->get();
        
  
        
         
       
        
        return view('loueur.profile',compact('table'));
    }
     
     //update
     public function edit(User $profile)
     {
        return view('loueur.profileEdit',compact('profile'));
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
           
         return to_route('Loueur.profile',$profile->id)->with('success','modifier avec success');
     }
    




}
