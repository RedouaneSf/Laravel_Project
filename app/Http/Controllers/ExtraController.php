<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extra;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    public function index()
    {
      $id=auth()->user()->id;
      $data = DB::table('extras')
     
    
    ->get();
    
      return view('extra.index',compact('data'));
        
    }

    public function create()
    {
    
    
      return view('extra.create');
        
    }


    public function store(Request $request)
    {
        
        Extra::create([
           'lib'=>$request->input('lib'),
           'prix'=>$request->input('prix'),
           
           
        ]);
        return redirect('/extra/index');
        
    }

    //delete
    public function destroy( $id)
    {
        
        Extra::where('id_extra', $id)
        ->delete();
        return redirect('/extra/index')
         ->with('message','supprimer avec succes');
    }

    //update
    public function edit(Extra $profile)
    {
       return view('extra.edit',compact('profile'));
    }

    public function update(Request $request, $id)
    {
        Extra::where('id_extra', $id)
        ->update([
            'lib'=>$request->input('lib'),
            'prix'=>$request->input('prix'),
        
         ]);
         return redirect('/extra/index')
         ->with('message','modifier avec succes');
         
    }


}
