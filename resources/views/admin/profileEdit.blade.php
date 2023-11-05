<h1>
    edit profile
</h1>
<form action="{{route('Profile.update',$profile->id)}}" method="Post">
    @method('PUT')
          
    @csrf
    <input type="text" name="name" id="" value="{{$profile->name}}">
    <input type="text" name="email" id="" value="{{$profile->email}}">
    <input type="password" name="password" id=""value="{{$profile->password}}" >
    
    <button class="bg-info" type="submit">Modifier</button>
</form>