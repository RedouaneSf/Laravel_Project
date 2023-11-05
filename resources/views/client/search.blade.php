<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>





@include('layouts.nav')
<h2>resultat de recherche</h2>
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($data  as $item)
  <div class="col">
    <div class="card h-100">
      <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
      <div class="card-body">
        <h5 class="card-title"><p>{{$item->marque;}} {{$item->id}}</p>
          <p>{{$item->model;}}</p></h5>
          <p>carburant:{{$item->Carburant;}}</p>

          <h6> loueur: {{$item->name;}}</h6> 

          @if($item->isDisponible==1)

      <h6>status <span class="badge bg-success">Disponible</span></h6>

      <a href="{{route('reservation.show',$item->idCar)}}" class="btn btn-primary">Reserver</a>
          
      @else
      <h6>status <span class="badge bg-danger"> InDisponible</span></h6>  
      @endif
      </div>
    </div>
  </div>
  @endforeach


</div>


  















@include('layouts.footer')

