<?php


      $COUNT=DB::table('users')
      
      ->where('users.isLoueur',"1")
      ->count();

      $ncars=DB::table('cars')
      ->count();

      $ncclient=DB::table('users')
      
      ->where('users.isLoueur',"0")
      ->where('users.isAdmin',"0")
      ->where('users.isClient',"0")
      ->count();
       

      $create=DB::table('users')
      
      ->where('users.isLoueur',"1")
      ->orderby('users.id','desc')
      ->get();

      $updateclient=DB::table('users')
      
      ->where('users.isLoueur',"0")
      ->where('users.isAdmin',"0")
      ->where('users.isClient',"0")
      ->get();
       
      $updatecars=DB::table('cars')
      ->get();


      foreach ($create as $key) {
       $time= $key->updated_at;
      }

      foreach ($updateclient as $key) {
       $uc= $key->updated_at;
      }

      foreach ($updatecars as $key) {
       $ucar= $key->updated_at;
      }

       


      

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@include('layouts.nav')

<h1 style="margin-left: 40%;">Admin Dashboard</h1>
<div class="card-group">
  <div class="card">
    <img src="https://laquotidienne.ma/uploads/actualites/642820c49e8fa_Location%20voitures%20lq%20.jpeg" class="card-img-top" alt="Hollywood Sign on The Hill" height="250px;"/>
    <div class="card-body">
      <h5 class="card-title">Loueurs</h5>
      <p class="card-text">
        Total:{{$COUNT}}
      </p>
    </div>

    <button><a href="/Admin/index">Plus..</a></button>
    <div class="card-footer">
      <small class="text-muted">Last updated {{ $time}}</small>
    </div>
   
    
  </div>

  <div class="card">
    <img src="https://www.marketing-management.io/hubfs/0%20-%20Couverture%20Blog/trouver-des-clients-couverture.png" class="card-img-top" alt="Hollywood Sign on The Hill" height="250px;"/>
    <div class="card-body">
      <h5 class="card-title">Clients</h5>
      <p class="card-text">
        Total:{{$ncclient}}
      </p>
    </div>

    <div class="card-footer">
      <small class="text-muted">Last updated  {{ $uc}}</small>
    </div>
    
  </div>

  <div class="card">
    <img src="https://leblogdemonsieur.com/wp-content/uploads/2022/09/picture-occasion-voiture-peugeot-choisir.jpg" class="card-img-top" alt="Hollywood Sign on The Hill"  style="height: 250px;"/>
    <div class="card-body">
      <h5 class="card-title">Cars</h5>
      <p class="card-text">
        Total:{{$ncars}}
      </p>
    </div>

    <div class="card-footer">
      <small class="text-muted">Last updated  {{ $ucar}}</small>
    </div>
    
   </div>
    
   <div class="card">
    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="card-img-top" alt="Hollywood Sign on The Hill" height="250px;"/>
    <div class="card-body">
      <h5 class="card-title">My profile</h5>
      <p class="card-text">
       
      </p>
    </div>
    <button><a href="/Admin/profile">Plus..</a></button>
    <div class="card-footer">
      <small class="text-muted">Profil updated last time..</small>
    </div>
    
    
  </div>

 






</div>








      
