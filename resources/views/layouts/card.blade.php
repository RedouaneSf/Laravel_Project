<?php
   use App\Models\Car;

   $data=Car::all();
  ?>


<style>
#reslinl{
  text-decoration: none;
  color: whitesmoke;

}


</style>
<div class="container">

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($data as $item)
        <div class="col">
          <div class="card">
            <img src="{{asset('storage/'.$item->image)}}" class="card-img-top"  id ="imgcar" alt="#"/>
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <p class="card-text">
                MODÈLE:{{$item->slug}}
              </p>
              <p class="card-text">
               ANNEE: {{$item->model}}
              </p>
              <p class="card-text">

                     @if ($item->isDisponible==1)
                        <span class="btn btn-success">Disponible</span>
                         
                     @else
                     <span class="btn btn-danger">Indisponible</span>
                     @endif
               </p>
               
              @auth
               @if (!auth()->user()->isLoueur==1 && $item->isDisponible==1)
                   
               <button class="btn bg-warning" style="text-decoration: none;"><a href="{{route('reservation.show',$item->idCar)}}" style="text-decoration: none;color:white;">Reserver</a></button>  
               @endif
               @endauth
              @guest
                 <span class="btn btn-danger">  <a id="reslinl" href="/login">connectez vous pour reserver</a> </span> 
              @endguest
              
            </div>
          </div>
        </div>
        @endforeach
        
   
        </div>
      </div>


</div>