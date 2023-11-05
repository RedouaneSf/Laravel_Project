<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
     public function DropDown()
    {
       $data=Ville::all();
       return view('auth.register',['data'=>$data]);
    }
}
