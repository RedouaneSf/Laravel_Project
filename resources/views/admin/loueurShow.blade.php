<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@include('layouts.nav')

Admin Dashboard
<h1>Liste des Loueurs</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">user</th>
        <th scope="col">email</th>
        <th scope="col">Ville id</th>
        <th scope="col">Ville</th>
        <th scope="col">status</th>
       
      </tr>
    </thead>
    <tbody>
        
@foreach ($table as $item)

 
     <tr>
        <th scope="row">{{$item->id;}}</th>
        <td>{{$item->name;}}</td>
        <td>{{$item->email;}}</td>
        <td>{{$item->id_ville;}}</td>
        <td>{{$item->nom;}}</td>
        
        
        <td>
          @if($item->isActive==1)

            <a href="{{url('change-status-admin/'.$item->id)}}" class="btn btn-sm btn-success">Active</a>
                
            @else
            <a href="{{url('change-status-admin/'.$item->id)}} " class="btn btn-sm btn-danger">Inactive</a>  
            @endif
          </td>
        
        
        
       
        
        
      </tr>
      
@endforeach 
 



  </table>