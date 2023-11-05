@include('layouts.nav')
@include('layouts.links')
<h1>admin profile</h1>
@if(session()->has('message'))
<div class="alert alert-success">
<strong><span>  a bien été envoyé </strong> 
{{session()->get('message')}}
</div>
@endif



  
  
  
  

 
    


<table class="table">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Ville</th>
      <th scope="col">Date de creation</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($table as $item)
    <tr>
      <th scope="row">{{$item->name}}</th>
      <td>{{$item->email}}</td>
      <td>{{$item->nom}}</td>
      <td>{{$item->created_at}}</td>
    </tr>
    @endforeach
  
  </tbody>
</table>



<button> <a href="{{route('Profile.edit',$item->id)}}">modifier</a></button>
@include('layouts.footer')