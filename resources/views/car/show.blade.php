<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<style>
  .btn-status{
    background-color:transparent;
    border-radius: 5px;
    margin-left: 20px;
    height: ;
     
    
  }
</style>
@include('layouts.nav')
    

    <div class="showcontainer">
        <h1>{{$cars->slug}}</h1>

        @if(session()->has('message'))
          <div class="alert alert-success">
          <strong>Success!</strong> {{session()->get('message')}}
        </div>
        @endif
       
        
        <div class="card mb-3" style="max-width: 700px; margin-left: 30%;">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  src="{{asset('storage/'.$cars->image)}}"
                  alt="Trendy Pants and Shoes"
                  class="img-fluid rounded-start"
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$cars->carname}}</h5>
                  <h3 class="card-title"><span>loueur:</span>{{$cars->user->name}}</h3>
                  <p class="card-text">
                    {{$cars->status}}
                  </p>
                  <p class="card-text">
                   <span>Prix par jour:</span> {{$cars->prix}}
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Ajoutée le {{$cars->created_at}}</small>
                  </p>
                </div>
                
                    <div>
                        <table>
                          <tr>
                            <td></td>
                          </tr>
                        </table>
                    </div>
                @if (auth::user() && auth::user()->id ==$cars->user_id)

                      <table>

                        <tr>

                          <td>
                            <button class="btn bg-warning" style="margin-bottom: 15px;"> <a href="/car/{{$cars->slug}}/edit" style="text-decoration: none;color:white;">Modifier</a></button> 
                          </td>
                          

                            <td> <form method="POST" action="/car/{{$cars->slug}}" style="margin-left: 20px;">
                              @csrf
                              @method('delete')
          
                              <button class="btn bg-danger" type="submit" style="color: aliceblue;" > Supprimer</button>  
                             </form></td>

                             <td>
                               @if($cars->isDisponible==1)
                               
                               <a href="{{url('change-status/'.$cars->idCar)}}" class="btn btn-sm btn-success" style="width: 100px;margin-bottom:15px;height:37px;margin-left:20px;">Disponible</a>
                              
                                
                            @else
                            <a href="{{url('change-status/'.$cars->idCar)}}" class="btn btn-sm btn-danger"  style="width: 100px;margin-bottom:15px;height:37px;margin-left:20px;">InDisponible</a>  
                            
                            @endif
                          </td>
                        </tr>
                      </table>

               

                   @endif
                
              </div>
            </div>
          </div>
    </div>
@include('layouts.footer')