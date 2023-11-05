<h1>Show</h1>
    <div class="card" style="width:400px;">
       <div class="card-body">
        <h4 class="card-title">{{$profile->id}}</h4>
        <h4 class="card-title">{{$profile->carname}}</h4>
        <h4 class="card-title">{{$profile->email}}</h4>
        <h4 class="card-title">{{$profile->genre}}</h4>
        <div style="width: 100px;">
          <img style="width: 200px;"  class="is-rounded" src="{{asset('storage/'.$profile->image)}}">
        </div>
        <p class="card-text"> {{$profile->bio}}</p>
        <form action="{{route('Profile.destroy',$profile->id)}}" method="post" style="margin-bottom: 20px;">
          @method('DELETE')
          @csrf
          <button class="bg-danger" type="submit">supprimer</button>
        </form>
        
        <form action="{{route('Profile.edit',$profile->id)}}" method="get">
          
          @csrf
          
          <button class="bg-info" type="submit">Modifier</button>
        </form>
        
        
      </div>
    </div>
        
   
</x-master-component>