@include('layouts.links')
@include('layouts.nav')
<h1>Loueur profile</h1>
    

    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">User Name</th>
            <th scope="col">email</th>
           
            <th scope="col">heure debut </th>
            <th scope="col">heure de fin </th>
            <th scope="col">Telephone </th>
            <th scope="col">Adresse </th>
            <th scope="col">Ville </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($table as $item)
        
        
        
        
        
        
        
        

        <tr>
            <th scope="row">{{$item->name}}</th>
            <td>{{$item->email}}</td>
           
            <td>{{$item->h_debut}}</td>
            <td>{{$item->h_fin}}</td>
            
            <td>{{$item->Adresse_loueur}}</td>
            <td>{{$item->tel_loueur}}</td>
            
            <td>{{$item->nom}}</td>
          </tr>
        
    @endforeach
          
          
        </tbody>
      </table>
    <button> <a href="{{route('ProfileLoueur.edit',$item->id)}}">modifier</a></button>


    @include('layouts.footer')