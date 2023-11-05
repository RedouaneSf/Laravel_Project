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

                    {{ __('You are logged in Client!') }}
                     {{ Auth::user()->name }}
                      
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Profile</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="{{route('client.profile')}}"class="btn btn-primary">Consulter votre Profile</a>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Reservation</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="{{route('client.reservation')}}" class="btn btn-primary">Voir plus</a>
                            </div>
                          </div>
                        </div>
                      </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
