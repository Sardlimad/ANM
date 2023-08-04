<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ url('assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">ANM</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person"></i>{{-- <img src="{{ url('assets/img/profile-img.png') }}" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
              <span>{{ auth()->user()->email }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('user.show', auth()->id()) }}">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/user') }}">
                <i class="bi bi-gear"></i>
                <span>Preferencias</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li> --}}

            <li>
               <button class="dropdown-item d-flex align-items-center" form="logoutForm" type="submit"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</button>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>

  

  <form action="{{ url('logout') }}" method="POST" name="logoutForm" id="logoutForm" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    @csrf
  </form>  