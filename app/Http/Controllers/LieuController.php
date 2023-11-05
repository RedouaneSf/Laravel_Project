<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LieuController extends Controller
{
    function index()
    {
      $id=auth()->user()->id;
      $data = DB::table('villes')
     ->join('users', 'villes.id_ville', '=', 'users.ville_ID')
     
     ->where('users.id', '=', $id)
     ->get();

     
        return view('lieu.index',compact('data'));
    }

    public function store(Request $request)
    {
        
        Lieu::create([
           'nom_lieu'=>$request->input('nom_lieu'),
           'tarif_lieu'=>$request->input('tarif_lieu'),
           'ville_id'=>$request->input('ville_id'),
           
        ]);
        return redirect('/Lieu/index');
        
    }

    public function selectVille(Request $request)
    {
        
        $v=Ville::get();
        $id_ville=$request->id_ville;

      
      $data = DB::table('lieus')
     ->where('lieus.ville_id', '=', $id_ville)
     
     ->get();
    
        
        return view('lieu.dropdown',compact('v','data'));
        
    }

    public function selectdropdown(Request $request)
    {
        
        
        $id_ville=$request->id_ville;

      
      $data = DB::table('lieus')
     ->where('lieus.ville_id', '=', $id_ville)
     
     ->get();
     dd($data);
        return view('lieu.showdrop');
        
    }
}
