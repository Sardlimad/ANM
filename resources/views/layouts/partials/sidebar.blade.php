<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="{{ request()-> routeIs('dashboard') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Resumen</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="{{ request()-> routeIs('*.create') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Registrar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="{{ request()-> routeIs('*.create') ? 'nav-content collapse show' : 'nav-content collapse ' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('articles.create') }}" class="{{ request()-> routeIs('articles.create')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Artículo</span>
            </a>
          </li>
          <li>
            <a href="{{ route('student.create') }}" class="{{ request()-> routeIs('student.create')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Alumno</span>
            </a>
          </li>
          <li>
            <a href="{{ route('academy.create') }}" class="{{ request()-> routeIs('academy.create')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Academia Local</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="{{ request()-> routeIs('*.index') && !request()->routeIs('user.*') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tablas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="{{ request()-> routeIs('*.index') && !request()->routeIs('user.*') ? 'nav-content collapse show' : 'nav-content collapse ' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('articles.index') }}" class="{{ request()-> routeIs('articles.index','articles.show')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Artículos</span>
            </a>
          </li>
          <li>
            <a href="{{ route('student.index') }}" class="{{ request()-> routeIs('student.index')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Alumnos</span>
            </a>
          </li>
          <li>
            <a href="{{ route('academy.index') }}" class="{{ request()-> routeIs('academy.index')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Academias Locales</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Operaciones</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('operations') }}">
              <i class="bi bi-circle"></i><span>Ver Operaciones</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-heading">Administradores</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.index') }}">
          <i class="bi bi-person"></i>
          <span>Usuarios</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.create') }}">
          <i class="bi bi-card-list"></i>
          <span>Registrar Usuario</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside>