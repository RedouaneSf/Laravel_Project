@include('layouts.nav')
@include('layouts.links')
<h1>
    Edit profile
</h1>
<form action="{{route('ProfileLoueur.update',$profile->id)}}" method="Post">
    @method('PUT')
          
    @csrf
    <input type="text" name="name" id="" value="{{$profile->name}}">
    <input type="text" name="email" id="" value="{{$profile->email}}">
    <input type="password" name="password" id=""value="{{$profile->password}}" >
    
    <button class="bg-info" type="submit">Modifier</button>
</form>
@include('layouts.footer')