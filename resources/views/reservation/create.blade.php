<?php
use App\Models\Extra;
use App\Models\Reservation;
    
     $extra= $table=DB::table('extras')
      
      ->get();

      $pay=$table=DB::table('pays')
       ->get();
      
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<style>
  #imgfigcar{
   width: 50%;
   margin-left: 30%;
   
  }
  #prix{
   margin-left: 50%;
  }
  #cardcarpf{
   width: 90%;
   height: 100%;
  }
  #date_e{
   background-color:azure;
   width: 50%;
   margin-bottom: 20px;
   margin-left: 30%;
  }
  #formres{
   width: 100%;
  }
  #date_s{
   background-color:azure;
   width: 50%;
   margin-bottom: 20px;
   margin-left: 30%;
  }
  #btn-reserv{
   margin-top: 100px;
   width: 50%;
   margin-left: 25%;
  }
  p{
   padding-left: 20px;
   margin-bottom: 20px;
   margin-left: 20%;
  }
  span{
   margin-left: 50px;
  }
  h4{
   margin-right: 20%;
  }
  h1{
   margin-left: 40%;
  }
  #sdate_e{
   margin-left: 30%;
  }
  #sdate_s{
   margin-left: 30%;
  }
  #check-btn{
   margin-left: 20%;
  }
  .extra{
   border: solid 1px; }
</style>

@include('layouts.nav')
@if(session()->has('message'))
<div class="alert alert-success">
<strong><span>  <i>veuillez consulter votre liste de réservation</i> <a href="/client/reservation">link</a></span>votre réservation a bien été envoyé </strong> 
{{session()->get('message')}}
</div>
@endif

<h1>Reservation</h1>
<h1 hidden>{{$profile->slug}}</h1>



<div class="container overflow-hidden">
   <div class="row gy-5">
     <div class="col-6">
       <div class="p-3 border bg-light" id="cardcarpf">
        
         <form method="POST" action="{{route('store')}}" enctype="multipart/form-data" id="formres">
    
         @csrf
         <input type="text" name="car_id" id="car_id" value="{{$profile->idCar}}" hidden>
         <input type="text" name="client_id" id="client_id"value="{{auth()->user()->id}}"hidden>
         <span id="sdate_e">date entrée</span><br>
         <input type="date" name="date_e" id="date_e" id="date_e"> <br>
         <span id="sdate_s">date de retour</span><br>
         <input type="date" name="date_s" id="date_s"id="date_s"><br>

         <label for="">heure_recuperation</label>
         <input type="time" id="heure_recup" name="heure_recup"><br>
         <label for="">heure_remise</label>
         
         <input type="time" id="heure_remise" name="heure_remise" style="margin-left: 45px;"><br><br>
         
         lieu de recuperation:
          <select name="subject" id="subject">
          @foreach ($lieus as $lieu)
          <option value="" selected="selected">{{$lieu->nom_lieu}}</option>
          
          @endforeach
        </select>
        lieu de remise: 
         <select name="subject" id="subject">
          @foreach ($lieus as $lieu)
          <option value="" selected="selected">{{$lieu->nom_lieu}}</option>
          
          @endforeach
        </select>
        <br><br>
         Mode payment: 
         

   <select name="pay_id" id="subject">
          @foreach ($pay as $pays)
          
          
          
          
            <option value="{{$pays->id_pay}}" selected="selected">{{$pays->pay_mode}}</option>
            
            @endforeach
          </select>
            
       
        
    

         
             
        
         
         <input type="text" name="status" id="status"hidden>  <br>
 
         <span>Extra</span>
         <br>
         <div class="extra">
          @foreach ($extra as $item)
            <div class="form-check form-check-inline" id="check-btn">

               
               
               <input class="form-check-input" name="extra_id" type="checkbox" id="extra_id" value="{{$item->id_extra}}" />
               
               
               <label class="form-check-label" for="inlineCheckbox1">{{$item->lib}} 
                  
                  @if($item->prix>0)
                  <b>Prix:{{$item->prix}} Dh </b> 
                  @endif
               </label>
               
             </div> 
          @endforeach
          <br>
         </div>
          
         <button type="submit" id="btn-reserv">reserver</button>
     </form></div>
     </div>

     <div class="col-6">
       <div class="p-3 border bg-light">
         <div class="contain-car-info">
         <img src="{{asset('storage/'.$profile->image)}}" class="figure-img img-fluid rounded" alt="..." id="imgfigcar">
         <p>  <span>Nom:{{$profile->name}}</span>  <span>marque:{{$profile->marque}}</span>  </p>
         
         <p> <span>model:{{$profile->model}}</span><span>nplace:{{$profile->nplace}}</span></p>
        
         <p> <span>nporte:{{$profile->nporte}} </span><span>Carburant:{{$profile->Carburant}}</span></p>
         
          <p>&nbsp;description:{{$profile->description}}</p>
         </div>
      
      </div>
     </div>
    
     
   </div>
 </div>
 <h1>@foreach ($cat as $item)
   <h4><span id="prix"> prix par jour:  {{$item->prix}}</span></h4>

   @endforeach</h1>

 @include('layouts.footer')


