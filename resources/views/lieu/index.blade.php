@include('layouts.links')
@include('layouts.nav')
<style>
   .formLieu{
    border: solid 1px;
    width: 50%;
    margin: 20px;
    padding: 50px;
    
   }   
</style>

<?php

foreach ($data as $key => $value) {
  $value->id_ville;
  $value->nom;
}
?>

<div class="formLieu" style="margin-left: 300px;">


  <h3>Ajouter un lieu</h3>
    <form method="POST">
        @csrf
        <div class="mb-3 ">
         
          <input type="text" class="form-control" name="ville_id" value="{{$value->id_ville}}" hidden>
        </div>
        <div class="mb-3 ">
          <label for="exampleInputPassword1" class="form-label">Ville</label>
          <input type="text" class="form-control" name="tarif_lieu" value="{{$value->nom}}" disabled>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Lieu</label>
          <input type="text" class="form-control" name="nom_lieu">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Tarif</label>
          <input type="text" class="form-control" name="tarif_lieu">
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
</div>