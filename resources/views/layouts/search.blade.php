<?php
use App\Models\Ville;
$ville= Ville::get();
?>

<style>
    .containerform{
        margin-left: 400px;
        margin-top: 20px;
        margin-bottom: 30px;
        
    }
   
</style>
<div class="containerform">
<form class="row row-cols-lg-auto g-3 align-items-center" method="POST" action="{{url('/search')}}">

  @csrf
    <div class="col-12">
      <label class="visually-hidden" >date_e</label>
      <div class="input-group">
        <div class="input-group-text">
          <span>DATE DE RÉSERVATION :</span>
        </div>
        
        <input type="date" class="form-control"  name="date_e" />
      </div>
    </div>
  
        <div class="col-12">
          <label class="visually-hidden" >date_s</label>
          <div class="input-group">
            <div class="input-group-text">
              <span>DATE DE RESTITUTION :</span>
            </div>
            
            <input type="date" class="form-control" name="date_s" />
            
          </div>
        </div>

    <div class="col-12">
      <label class="visually-hidden" for="inlineFormSelectPref">Ville</label>
      <select class="select" name="id_ville" style="width: 350px;margin-left:5%;" >
        @foreach ($ville as $item)
        <option value="{{$item->id_ville}}" >{{$item->nom}}</option>
        @endforeach
        
        
       
      </select>
    </div>
  
    
  
    <div class="col-12">
      <button type="submit" class="btn btn-primary">chercher</button>
    </div>
  </form>

</div>