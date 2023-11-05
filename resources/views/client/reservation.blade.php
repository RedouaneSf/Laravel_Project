@include('layouts.links')
@include('layouts.nav')




<h2>Votre liste de reservation</h2>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date location</th>
        <th scope="col">Date retour</th>
       
        <th scope="col">Nom de voiture</th>
        <th scope="col">Image</th>
        <th scope="col">Loueur</th>
        <th scope="col">Ville</th>
        <th scope="col">Lieu de recuperation</th>
        <th scope="col">Lieu de remise</th>
        <th scope="col">Heure de recuperation</th>
        <th scope="col">Heure de remise</th>
        <th scope="col">Montant à payer</th>
        <th scope="col">status de reservation</th>
        
        
        
      </tr>
    </thead>
    <tbody>
      
        @foreach ($data as $item)
         <tr> 
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->date_e}}</td>
            <td>{{$item->date_s}}</td>
            
            <td>{{$item->carname}}</td>
            <td><img src="{{asset('storage/'.$item->image)}}" alt=""  style="width:300px;"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->nom}}</td>
            <td>{{$item->nom_lieu}}</td>
            <td>{{$item->nom_lieu}}</td>
            <td>{{$item->heure_recup}}</td>
            <td>{{$item->heure_remise}}</td>
            <td rowspan="3" class="table-active">{{$item->montant}}</td>
            @if ($item->isAccepted==0)
            <td rowspan="3" class="bg-danger" style="color: aliceblue">Refuser</td>  
            @else
            <td rowspan="3" class="bg-success"style="color: aliceblue"> Accepter</td>    
            @endif

        </tr>  
        
            
        @endforeach
        
      
     
    </tbody>
  </table>

  @include('layouts.footer')