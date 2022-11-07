<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="{{ request()-> routeIs('dashboard') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Resumen</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="{{ request()-> routeIs('') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Registrar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="{{ request()-> routeIs('') ? 'nav-content collapse show' : 'nav-content collapse ' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('') }}" class="{{ request()-> routeIs('') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Artículo</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/students/create') }}">
              <i class="bi bi-circle"></i><span>Alumno</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/academy/create') }}">
              <i class="bi bi-circle"></i><span>Academia Local</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tablas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/articles/list') }}">
              <i class="bi bi-circle"></i><span>Artículos</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/students/list') }}">
              <i class="bi bi-circle"></i><span>Alumnos</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/academy/list') }}">
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
            <a href="{{ url('/operations') }}">
              <i class="bi bi-circle"></i><span>Ver Operaciones</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-heading">Avanzado</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/users/list') }}">
          <i class="bi bi-person"></i>
          <span>Usuarios</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/users/create') }}">
          <i class="bi bi-card-list"></i>
          <span>Registrar Usuario</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside>