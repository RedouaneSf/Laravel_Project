

Your Profile
@foreach ($User as $user)

<h2> {{$user->id}}</h2>
<h2> {{$user->name}}</h2>
<h2> {{$user->ville_ID}}</h2>
@endforeach
