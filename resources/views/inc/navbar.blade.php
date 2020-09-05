<header id="header">
  <nav class="navbar navbar-expand-md navbar-light shadow-sm">
      <div class="container">
          <a id="logo-ime" class="navbar-brand" href="{{ url('/') }}">
              Trend Style
          </a>
          <button id="hamburger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <i id="hamburger" class="fas fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Desna strana Navbara -->
              <ul id="navigacija" class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">POČETNA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/o-nama">O NAMA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/usluge">USLUGE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cene">CENE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/galerija">GALERIJA</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link" href="/kontakt">KONTAKT</a>
                </li>
                  <!-- Authentication Linkovi -->
                  @guest

                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div id="admin-lista" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->is_admin == 1)
                              <a class="dropdown-item" href="{{ route('admin') }}">
                                Admin Panel
                              </a>
                            @endif
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
</header>
