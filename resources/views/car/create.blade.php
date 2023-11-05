<?php
use App\Models\Categorie;

      $categorie=categorie::get();
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
    
    #btnAjt{
      width: 50%;
      margin-left: 25%;
    }
</style>
@include('layouts.nav')

<div class="containerForme">
  <h1>Ajouter une voiture</h1>
    <form action="/car" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" name="carname" class="form-control" />
              <label class="form-label" for="name">name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="text"  name="Carburant"class="form-control" />
              <label class="form-label" for="form6Example2">Carburant</label>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="file"  name="image"/>
              <label class="form-label" for="image">image</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="text" id="form6Example6" name="slug" class="form-control" />
              <label class="form-label" for="form6Example6">slug</label>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" id="marque" name="marque" class="form-control" />
              <label class="form-label" for="marque">marque</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="string" id="model" name="model" class="form-control" />
              <label class="form-label" for="marque">model</label>
            </div>
          </div>
        </div>
      
       
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="number" id="nplace" name="nplace" class="form-control" />
              <label class="form-label" for="marque">nplace</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="number" id="nporte" name="nporte" class="form-control" />
              <label class="form-label" for="nporte">nporte</label>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <div class="form-outline mb-4">
                <textarea class="form-control" name="description" id="form6Example7" rows="4"></textarea>
                 <label class="form-label" for="description">description</label>
        </div>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              
              <label class="form-check-label" >Categorie </label>
                  @foreach ($categorie as $item)
                 
                  
                  <!-- Default checked radio -->
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="categorie_id" value="{{$item->id_categories}}" id="flexRadioDefault2" checked/>
                    <label class="form-check-label" for="flexRadioDefault2">{{$item->lib}} </label>
                    <label class="form-check-label" for="flexRadioDefault2"> <i>Prix par jour: </i> <span> <i>{{$item->prix}} Dh</i> </span>  </label>
                  </div>
                  @endforeach
                 
                  
                
              
            </div>
          </div>
        </div>

     
        </div>

        <!--DropDown List-->
        
        
        
    
      
       
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" id="btnAjt">Ajouter</button>
      </form>
</div>

@include('layouts.footer')