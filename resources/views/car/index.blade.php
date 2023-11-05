<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

<style>

      .H1{
        margin-left: 600px;
        margin-top: 20px;
        margin-bottom: 20px;
      } 
      .containerCar{
        margin-left: 10px;
      }
      .btnAjt{
        background-color: azure;
        border-radius: 5px;
        margin-left: 10px;
        margin-bottom: 20px;
       
      }
      .btnAjt a {
        text-decoration: none;
        color:black;
      }
      #imgcar{
        height: 55%;
      }

</style>
@include('layouts.nav')

<div class="CarsContainer">
    <h1 class="H1">
        All Cars
    </h1>
    @if(session()->has('message'))
          <div class="alert alert-danger">
          <strong>Danger</strong> {{session()->get('message')}}
        </div>
        @endif
    
       
  

      
  <div class="containerCar">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($cars as $item)
      <div class="col">
        <div class="card h-100">
          <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="Skyscrapers" id="imgcar"/>
          <div class="card-body">
            <h5 class="card-title">{{$item->carname}}</h5>
            <p class="card-text">
              {{$item->status}}
            </p>
            
            <span>  Loueur : <span class="text text-warning">{{$item->user->name}}</span> </span><br/>
            <span>  Ajoutée le  : <span class="text text-warning">{{date('d-m-Y',strtotime($item->created_at))}}</span> </span>

          </div>
          <div class="card-footer">
            <small class="text-muted"> prix par jour : <span class="text text-danger">{{$item->prix}}</span></small>
             <button class="btn bg-warning"> <a href="/car/{{$item->slug}}">Details..</a></button>
          </div>
        </div>
      </div>
      @endforeach
      </div>
</div>    



@include('layouts.footer')