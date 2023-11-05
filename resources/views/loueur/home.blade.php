@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in Loueur : ') }} {{ Auth::user()->name }}
                   @if (auth()->user()->isActive==1)
                   <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Car</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="/car/create"class="btn btn-primary">Ajouter une voiture</a>
                          <a href="{{route('loueur.car')}}"class="btn btn-primary">Voir voiture</a>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Reservation</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="{{route('loueur.reservation')}}" class="btn btn-primary">Voir plus</a>
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Profile</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="{{route('Loueur.profile')}}" class="btn btn-primary">Voir plus</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6" style="margin-top: 10px;">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Ajouter des lieus</h5>
                          <p class="card-text">Ajouter des lieus</p>
                          <a href="{{route('Lieu.index')}}" class="btn btn-primary">Voir plus</a>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Consulter des lieus</h5>
                          <p class="card-text">Consulter des lieus</p>
                          <a href="{{route('Lieu.index')}}" class="btn btn-primary">Voir plus</a>
                        </div>

                        

                        <div class="card-body">
                          <h5 class="card-title">Consulter des Extras</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="{{route('extra.index')}}" class="btn btn-primary">Voir plus</a>
                        </div>
                      </div>
                    </div>

                  </div>
                   @else
                         <p> Merci pour votre enregistrement dans notre site  </p>
                         <p> attendez la raponse de l'administateur..........</p>
                   @endif   
                    
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
