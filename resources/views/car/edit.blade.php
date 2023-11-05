<?php
use App\Models\Categorie;
use App\Models\Car;
use App\Models\User;

   $categorie=categorie::all();
   $id=auth()->user()->id;

   $user=DB::table('users')
        ->join('cars','cars.user_id',"=",'users.id')
        ->where('users.id','=',$id)
        ->get();
        
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .containerForme{
        margin-top: 20px;
        width: 90%;
        margin-left: 50px;
    }
    .btn{
        width: 100%;
    }

    h1{
        margin-bottom: 30px;
    }
</style>
@include('layouts.nav')

<div class="containerForme">
  <h1>Modifier une voiture</h1>
    <form action="/car/{{$cars->slug}}" method="POST">
        @csrf
        @method('PUT')
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" name="name" class="form-control" placeholder="{{$cars->carname}}"/>
              <label class="form-label" for="name">nom de voiture</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="text"  name="Carburant"class="form-control" placeholder="{{$cars->Carburant}}" />
              <label class="form-label" for="form6Example2">carburant</label>
            </div>
          </div>
        </div>
      
        <!-- Text input -->
        
        <div class="form-outline mb-4">
          
           <input type="file" class="form-control" name="image" id="image" />
           <label class="form-label" for="image">image</label>
        </div>
        <!-- Text input -->
       
      
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example5"name="prix" class="form-control" placeholder="{{$cars->prix}}" />
          <label class="form-label" for="prix">prix</label>
        </div>
      
        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example6" name="slug" class="form-control" placeholder="{{$cars->slug}}" />
          <label class="form-label" for="form6Example6">slug</label>
        </div>
        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example6" name="marque" class="form-control" placeholder="{{$cars->marque}}" />
          <label class="form-label" for="form6Example6">marque de voiture</label>
        </div>
        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example6" name="model" class="form-control" placeholder="{{$cars->model}}" />
          <label class="form-label" for="form6Example6">modèle</label>
        </div>
        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example6" name="nplace" class="form-control" placeholder="{{$cars->nplace}}" />
          <label class="form-label" for="form6Example6">nombre de places</label>
        </div>
        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example6" name="nporte" class="form-control" placeholder="{{$cars->nporte}}" />
          <label class="form-label" for="form6Example6">nombre de porte</label>
        </div>

        <!--user_id-->
        <div class="form-outline mb-4">
          @foreach($user as $users)
            <input type="text" id="form6Example6" name="user_id" class="form-control" placeholder="{{$users->id}}" hidden/>
          @endforeach
          
        </div>


      
        <!-- Message input -->
        <div class="form-outline mb-4">
          <textarea class="form-control" name="description" id="form6Example7" rows="4">{{$cars->description}}</textarea>
          <label class="form-label" for="description">description</label>
        </div>
       
        <label class="form-check-label" >Categorie </label>
        @foreach ($categorie as $item)
       
        
        <!-- Default checked radio -->
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie_id" value="{{$item->id_categories}}" id="flexRadioDefault2" checked/>
          <label class="form-check-label" for="flexRadioDefault2">{{$item->lib}} </label>
          <label class="form-check-label" for="flexRadioDefault2"> <i>Prix par jour: </i> <span> <i>{{$item->prix}} Dh</i> </span>  </label>
        </div>
        @endforeach 
        
      
         
      
       
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" >Modifier</button>
      </form>
</div>

@include('layouts.footer')