<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index()
   {
      $loueur=auth()->user()->isLoueur==0;
      
      $user=User::where('isLoueur',$loueur,)->get();
      $villes=Ville::get();
      return view('admin.index',compact('user','villes'));
   }

   public function index2()
   {
      $table=DB::table('users')
      ->join('villes','villes.id_ville',"=",'users.ville_ID')
      ->where('users.isLoueur',"1")
      ->get();
      $COUNT=DB::table('users')
      
      ->where('users.isLoueur',"1")
      ->count();

      

      
      
      return view('admin.loueurShow',compact('table'));
   }



   public function profile()
   {
      $table=DB::table('users')
      ->join('villes','users.ville_ID',"=",'villes.id_ville')
      ->where('users.isAdmin',"1")
      ->where('users.id',auth()->user()->id)
      ->get();
      

      

     
      
      return view('admin.profile',compact('table'));
   }


   public function Dashboard()
   {
      

      

      
      
      return view('admin.index');
   }
    

   public function changeStatusAdmin($id)
    {
        $getStatus = User::select('isActive')->where('id',$id)->first();

        if($getStatus->isActive==1)
        {
            $status=0;
        }
        else
        {
            $status=1;
        }
        User::where('id',$id)->update(['isActive'=>$status]);
        return redirect()->back();
    }

    //update
    public function edit(User $profile)
    {
       return view('admin.profileEdit',compact('profile'));
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
          
        return to_route('admin.profile',$profile->id)->with('success','modifier avec success');
    }
   
}
