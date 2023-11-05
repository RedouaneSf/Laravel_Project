@include('layouts.links')
@include('layouts.nav')

<h1>list des reservation</h1>

<table class="table">
    <thead>
      <tr>
      
        <th scope="col">Client id</th>
        <th scope="col">Client Prenom</th>
        <th scope="col">Client Nom</th>
        <th scope="col">Date de location</th>
        <th scope="col">Date de retour</th>
        <th scope="col">Heure de recuperation</th>
        <th scope="col">Heure de remise</th>
        <th scope="col">Lieu de recuperation</th>
        <th scope="col">Lieu  de remise</th>
        <th scope="col">Telephone</th>
        <th scope="col">Adresse</th>
        <th scope="col">Voiture</th>
        <th scope="col">Image</th>
        <th scope="col">Ville</th>
        <th scope="col">Montant a payer</th>
        <th scope="col">status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
           
            <td>{{$item->client_id}}</td>
            <td>{{$item->nom_client}}</td>
            <td>{{$item->prenom_client}}</td>
            <td>{{$item->date_e}}</td>
            <td>{{$item->date_s}}</td>
            <td>{{$item->heure_recup}}</td>
            <td>{{$item->heure_remise}}</td>
            <td>{{$item->nom_lieu}}</td>
            <td>{{$item->nom_lieu}}</td>
            <td>{{$item->tel_client}}</td>
            <td>{{$item->Adresse_client}}</td>
               
            
            
           
            <td>{{$item->carname}}</td>
            <td><img src="{{asset('storage/'.$item->image)}}" alt="" style="width:100px;"></td>
            <td>{{$item->nom}}</td>
            <td>{{$item->montant}}</td>
            <td>
              @if($item->isDisponible==1)
    
                <a href="{{url('change-status-loueur/'.$item->idCar)}}" class="btn btn-sm btn-success">Accepter</a>
                
                    
                @else
                <a href="{{url('change-status-loueur/'.$item->idCar)}} " class="btn btn-sm btn-danger">Refuser</a>  
                @endif
              </td>
            
          </tr>
        @endforeach
      
    
    </tbody>
  </table>

