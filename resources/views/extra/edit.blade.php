@include('layouts.nav')
@include('layouts.links')

<h1>Modifier Extra</h1>
<div class="container">
<form method="POST" action="{{route('extra.store')}}" enctype="multipart/form-data">
    @csrf

    <legend>Ajouter des extras</legend>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">libellé</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="libellé" name="lib" value="{{$profile->lib}}">
      </div>

      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Prix</label>
        <input type="text" id="disabledTextInput" class="form-control"  name="prix" value="{{$profile->id_extra}}">
      </div>
     

      
     
      <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>