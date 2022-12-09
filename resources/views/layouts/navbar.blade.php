<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{route('panel')}}">Panel</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item text-capitalize" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-key"></i> change Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-capitalize" href="{{route('logout')}}"><i class="fa-solid fa-power-off"></i> logout</a></li>
                    </ul>
                  </li>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">login</a>
                </li>
                @endguest
                
            </ul>
        </div>
  </div>
</nav>
