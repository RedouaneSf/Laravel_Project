@include('layouts.nav')


<h1>Profile</h1>
    @foreach ( $profiles as $item )
    <div class="card">
        <div class="card-body">
          <h4 class="card-title bg-info">{{$item->carname}}</h4>
          <h4 class="card-title ">{{$item->slug}}</h4>
          <p class="card-text">{{$item->bio}}</p>
          <a href="{{route('reservation.show',$item->id)}}" class="card-link">Details</a>
          
        </div>
      </div>
      
    @endforeach