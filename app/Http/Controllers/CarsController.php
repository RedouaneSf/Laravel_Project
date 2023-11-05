<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    public function indexbyuser()
    {
        $user=auth()->user()->id;
        
        
        return view('car.carlouer')->with('cars',Car::where('user_id',$user)->get());
        
    }
    
    public function index()
    {
        $id=auth()->user()->id;
        $data = DB::table('reservations')
       ->join('cars', 'reservations.car_id', '=', 'cars.idCar')
       ->join('users', 'cars.user_id', '=', 'users.id')
       ->join('villes', 'users.ville_ID', '=', 'villes.id_ville')
       ->where('cars.user_id', '=',  $id)
       
       ->get();
  
       
       
        
        
        return view('car.index',compact('data'))->with('cars',Car::orderBy('created_at','DESC')->get());
        
    }

    
    public function create()
    {
        return view('car.create');
    }

    
    public function store(Request $request)
    {
       
        $carname=$request->carname;
        $marque=$request->marque;
        $model=$request->model;
        $nplace=$request->nplace;
        $nporte=$request->nporte;
        $description=$request->description;
        $Carburant=$request->Carburant;
        $status=$request->status;
        $slug=$request->slug;
        
        $categorie_id=$request->categorie_id;
        $user_id=auth()->user()->id;

        
        //validation
        $formFields=$request->validate([
            
            'image'=>'required|image|mimes:png,jpg,svg',
        ]);
        
        $formFields['image']=$request->file('image')->store('profile','public');
        $i= $formFields['image'];
        $formFields=$request;

        $formFields['image']= $request->file('image')->store('profile','public');
        $img=$formFields['image'];
        
        //insertion
         Car::create([
         'carname'=> $carname ,
         'marque'=> $marque ,
         'model'=>$model ,
         'description'=>  $description,
         'nplace'=> $nplace,
         'nporte'=> $nporte,
         'Carburant'=> $Carburant,
         'status'=> $status,
         'slug'=> $slug,
         'categorie_id'=> $categorie_id,
         'user_id'=> $user_id,
         'image'=>  $i,

        ]);
       
      /* Car::create([
           'carname'=>$request->input('carname'),
           'marque'=>$request->input('marque'),
           'model'=>$request->input('model'),
           'nplace'=>$request->input('nplace'),
           'nporte'=>$request->input('nporte'),
           'description'=>$request->input('description'),
           'Carburant'=>$request->input('Carburant'),
           'image'=> $carname,
           'status'=>$request->input('status'),
           
           'slug'=>$request->input('slug'),
           'user_id'=>auth()->user()->id,
           'categorie_id'=>$request->input('categorie_id'),
          
        ]);*/
        
       
        return redirect('/loueur/cars');
        
    }

   
    public function show($slug)
    {
        return view('car.show')
        ->with('cars',Car::where('slug',$slug)->first());
    }

  
    public function edit($slug)
    {
        return view('car.edit')
        ->with('cars',Car::where('slug',$slug)->first());
    }

   
    public function update(Request $request, $slug)
    {
        Car::where('slug', $slug)
        ->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'Carburant'=>$request->input('Carburant'),
           'status'=>$request->input('status'),
            'prix'=>$request->input('prix'),
            'slug'=>$slug,
            'user_id'=>auth()->user()->id
         ]);
         return redirect('/loueur/cars/'. $slug)
         ->with('message','modifier avec succes');
         
    }

   
    public function destroy($slug)
    {
        Car::where('slug', $slug)
        ->delete();
        return redirect('/car')
         ->with('message','supprimer avec succes');
    }

    public function changeStatus($id)
    {
        $getStatus = Car::select('isDisponible')->where('idCar',$id)->first();

        if($getStatus->isDisponible==1)
        {
            $status=0;
        }
        else
        {
            $status=1;
        }
        Car::where('idCar',$id)->update(['isDisponible'=>$status]);
        return redirect()->back();
    }

}
