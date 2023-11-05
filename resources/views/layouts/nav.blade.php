<style>
    .navbar a{
        text-decoration: none;
        padding-right: 10px;
        margin-left: 50px;
        color:lightslategrey;
        
    }
</style>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" hidden>
            {{ config('app.name', 'Laravel') }}
        </a>
        <a class="navbar-brand" href="{{ url('/') }}" >
           <b style="color:gray;">Pfa2023</b> 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            
                 <ul class="navbar-nav me-auto">

                    
                      
                   
                            
                           <a href="{{ route('pages.home') }}">Home</a>
                           
                               
                          
                            <a href="/car">Cars</a>
                            <a href="{{ route('pages.about') }}">About</a>
                            <a href="{{ route('pages.gallerie') }}">Gallerie</a>
                            <a href="{{ route('pages.contact') }}">contact</a>
                             
                         
               </ul>
             
            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                @else
                <li class="nav-item" style="margin-top: 7px;">
                    <a href="/auth/home">
                       Accueuil
                    </a>
                </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
