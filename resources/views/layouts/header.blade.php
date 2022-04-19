<header class="header">
    <div class=" d-flex align-items-center justify-content-around container menu">
        <div id="menuBar" class="fas fa-bars d-md-none menu-bar"></div>
        <a href="{{ route('index') }}" class="logo"><img class="logo-hp" src="{{ asset('images/hapo_learn.png') }}" alt="HapoLearn Logo">
        </a>
        <nav class="nav" id="nav">
            <a href="{{ route('index') }}" class="{{ '/' == request()->path() ? 'active' : ''}} menu-nav">home</a>
            <a href="{{ route('courses.index') }}" class="{{ 'courses' == request()->path() ? 'active' : ''}} menu-nav">all courses</a>
            @if (Auth::check())
                <div class="dropdown">
                    <a href="#" class="btn btn-success dropdown-toggle text-white text-auth" data-toggle="dropdown" aria-expanded="false" role="button" id="dropdownMenu">
                        <i class="fas fa-user icon-auth"></i>{{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a href="#" class="dropdown-item">profile</a>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                            @csrf
                            <button class="dropdown-item">logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="#" data-toggle="modal" data-target="#loginModal" class="menu-nav" id="loginRegister">login/register</a>
                <a href="#" class="menu-nav">profile</a>
            @endif
        </nav>
    </div>
</header>
