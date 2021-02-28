<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
    <a class="navbar-brand" href="/">
        <span class="sr-only">Italian PSQ</span>
        <img src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="logo">
        <span class="text-primary">PSQ</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0">
            <li class="nav-item text-center">
                @if (Request::is('/'))
                <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                @else
                <a class="nav-link" href="/">Home</a>
                @endif
            </li>
            @auth
            <li class="nav-item text-center">
                @if (Request::is('dashboard'))
                <a class="nav-link active" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                @else
                <a class="nav-link" href="/dashboard">Dashboard</a>
                @endif
            </li>
            @if (auth()->user()->role != 'U')    
            <li class="nav-item text-center dropdown">
                @if (Request::is('users*'))
                <a id="navbarDropdownUsers" class='nav-link dropdown-toggle active' href="#dropdown-users" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__("Users")}} <span class="sr-only">({{__("current")}})</span>
                </a>
                <div class="dropdown-menu text-primary" aria-labelledby="navbarDropdownUsers" id="dropdown-users">
                    <a class="dropdown-item text-primary @if (Request::is('users/create')) active @endif" href="{{ route('users.create') }}">
                        <i class="fas fa-edit"></i> {{__("New user")}}
                    </a>
                    <a class="dropdown-item text-primary @if (Request::is('users')) active @endif" href="{{ route('users') }}">
                        <i class="far fa-eye"></i> {{__("View users")}}
                    </a>
                </div>    
                @else
                <a id="navbarDropdownUsers" class='nav-link dropdown-toggle' href="#dropdown-users" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__("Users")}} <span class="sr-only">({{__("current")}})</span>
                </a>
                <div class="dropdown-menu text-primary" aria-labelledby="navbarDropdownUsers" id="dropdown-users">
                    @if (auth()->user()->role != 'P')  
                    <a class="dropdown-item text-primary" href="{{ route('users.create') }}">
                        <i class="fas fa-edit"></i> {{__("New user")}}
                    </a>
                    @endif
                    <a class="dropdown-item text-primary" href="{{ route('users') }}">
                        <i class="far fa-eye"></i> {{__("View users")}}
                    </a>
                </div>      
                @endif
            </li>
            @endif
            <li class="nav-item text-center dropdown">
                <a id="navbarDropdownSurveys" class='nav-link dropdown-toggle @if (Request::is('surveys*')) active @endif' href="#dropdown-survey" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__("Questionari")}} @if (Request::is('surveys*'))<span class="sr-only">({{__("current")}})</span>@endif
                </a>
                <div class="dropdown-menu text-primary" aria-labelledby="navbarDropdownSurveys" id="dropdown-survey">
                    @if (auth()->user()->role != 'P')  
                    <a class="dropdown-item text-primary @if (Request::is('surveys/create')) active @endif" href="{{ route('surveys.create') }}">
                        <i class="fas fa-edit"></i> {{__("New survey")}}
                    </a>
                    @endif
                    <a class="dropdown-item text-primary @if (Request::is('surveys')) active @endif" href="{{ route('surveys') }}">
                        <i class="far fa-eye"></i> {{__("View surveys")}}
                    </a>
                </div>
              </li>
            @endauth
        </ul>
        <!-- Authentication Links -->
        <ul class="navbar-nav">
            @guest
            @if (Route::has('login'))
                <li class="nav-item text-center">
                    @if (Request::is('login'))
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }} <span class="sr-only">(current)</span></a>
                    @else
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#dropdown-logout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropdown-logout">
                    <a class="dropdown-item @if (Request::is('users/'.auth()->user()->id))
                        active
                    @endif" href="/users/{{auth()->user()->id}}">{{__("My profile")}}</a>
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
</nav>