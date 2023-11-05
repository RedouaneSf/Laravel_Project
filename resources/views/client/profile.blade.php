@include('layouts.nav')
@include('layouts.links')
<h1>Client profile</h1>


   
<div>
       
<table class="table">
        <thead>
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Date de creation du compte</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Ville</th>
            <th scope="col">Telephone</th>
            <th scope="col">Ville</th>
            <th scope="col">adresse</th>

            
          </tr>
        </thead>
        <tbody>
            @foreach ($table as $item)
          <tr>
            <th scope="row">{{$item->name}}</th>
            <td>{{$item->email}}</td>
            <td>{{$item->created_at}}</td>
            <td> {{$item->nom_client}}</td>
            <td> {{$item->prenom_client}}</td>
            <td>  {{$item->DateNaissance}}</td>
            <td>  {{$item->nom}}</td>
            <td>  {{$item->tel_client}}</td>
            <td>  {{$item->Adresse_client}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <button class="btn btn-info"> <a href="{{route('ProfileClient.edit',$item->id)}}">modifier</a></button>
</div> 


@include('layouts.footer')