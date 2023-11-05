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

                    @if (auth()->user()->isAdmin==1)
                          <p> welcom admin</p>
                          <a href={{route('admin.dashboard')}}>Go to the dashboard</a>
                          
                    @endif

                    @if (auth()->user()->isLoueur==1)
                          <p> welcom loueur</p>
                          <a href={{route('loueur.home')}}>Go to the dashboard</a>
                          
                    @endif

                    @if (auth()->user()->isAdmin==0 && auth()->user()->isLoueur==0)
                          <p> welcom client</p>
                          <a href={{route('user.home')}}>Go to profile</a>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection