@extends('layouts.app')


@section('content')

<style>
    .mom{
        
        padding: 50px;
    }
</style>
<div class="mom" style="width: 40%;border:solide 1px;" >
    <h3 style="margin-left: 300px;">Contact us </h3>
    <label for="inputPassword5" class="form-label">Name</label>
    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
    <label for="inputPassword5" class="form-label">Eamil</label>
    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
    <label for="inputPassword5" class="form-label">Message</label>
   <textarea name="" id="" cols="100" rows="10"></textarea> <br>
   <button style="width: 500px;  margin-left: 50px;">Envoyer</button>
      

</div>

@endsection