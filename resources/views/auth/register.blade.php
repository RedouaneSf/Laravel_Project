<?php
   use App\Models\Ville;

   $data=Ville::all();
   ?>
@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#radio1").click(function(){
    $("#formLoueur").show();
    $("#formClient").hide();
  });
  $("#radio2").click(function(){
    $("#formLoueur").hide();
    $("#formClient").show();
  });

});
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">User Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Ville" class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                            <div class="col-md-6">
                                <select name="ville_ID" id="ville">
                                    @foreach ($data as $row)
                                    <option value=" {{$row->id_ville}}" >{{$row->nom}}</option>
                                      
                                    @endforeach
                                  </ul>
                                </select>
                                <div class="form-check" style="margin-bottom:5px;margin-top: 10px;">
                                    <input class="form-check-input" type="radio" name="isLoueur" id="radio1" value="1" >
                                    <label class="form-check-label" for="1">
                                      Loueur
                                </label>
                                      
                                   <div id="formLoueur" >
                                    <div class="row mb-3">
                                        
            
                                        <div class="col-md-6">
                                            
                                             <label > heure d'ebut</label>  <input  id="name"  type="text"  name="h_debut">
                                             <label > heure fin</label>  <input type="text" name="h_fin">
                                             <label > telephone</label>  <input type="text" name="tel_loueur">
                                             <label for="">ADRESSE</label> <input id="name" type="text" name="Adresse_loueur" >
                                            
                                        </div>
                                    </div>
                                   </div>
                                

                                    
                                  </div>
                                  <div class="form-check" style="margin-bottom:10px;margin-top:5px;">
                                    <input class="form-check-input" type="radio" name="isLoueur" id="radio2"  value="0"  checked>
                                    <label class="form-check-label" for="2">
                                      Client
                                    </label>

                                    <div id="formClient">
                                        <div class="row mb-3">
                                            
                
                                            <div class="col-md-6">
                                                
                                               <label for="">Nom</label> <input id="name" type="text" name="nom_client" >
                                               <label for="">Prenom</label> <input id="name" type="text" name="prenom_client">
                                               <label for="">ADRESSE</label> <input id="name" type="text" name="Adresse_client" >
                                               <label for="">Tel</label> <input id="name" type="string" name="tel_client"> 
                                               <label for="">DateNaissance</label> <input id="DateNaissance" type="date" name="DateNaissance">
                                               
                                                
                                            </div>
                                        </div>
                                   </div>
                                  </div>
                            </div>

                         

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 400px;margin-top: 20px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
