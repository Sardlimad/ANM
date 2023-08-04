<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @can('dashboard')
        <li class="nav-item">
          <a class="{{ request()-> routeIs('dashboard') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('/') }}">
            <i class="bi bi-grid"></i>
            <span>Resumen</span>
          </a>
        </li><!-- End Dashboard Nav -->
      @endcan

      @canany(['articles.create', 'students.create','academy.create'])          
        <li class="nav-item">
          <a class="{{ request()-> routeIs('*.create') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Registrar</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="{{ request()-> routeIs('*.create') ? 'nav-content collapse show' : 'nav-content collapse ' }}" data-bs-parent="#sidebar-nav">
            @can('articles.create')
              <li>
                <a href="{{ route('articles.create') }}" class="{{ request()-> routeIs('articles.create')  ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Artículo</span>
                </a>
              </li>
            @endcan
            @can('students.create')
              <li>
                <a href="{{ route('students.create') }}" class="{{ request()-> routeIs('students.create')  ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Alumno</span>
                </a>
              </li>
            @endcan
            @can('academy.create')
              <li>
                <a href="{{ route('academy.create') }}" class="{{ request()-> routeIs('academy.create')  ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Academia Local</span>
                </a>
              </li>
            @endcan
          </ul>
        </li><!-- End Register Nav -->
      @endcan

      @canany(['articles.index', 'students.index', 'academy.index'])
        <li class="nav-item">
          <a class="{{ request()-> routeIs('*.index') && !request()->routeIs('user.*') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tablas</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="{{ request()-> routeIs('*.index') && !request()->routeIs('user.*') ? 'nav-content collapse show' : 'nav-content collapse ' }}" data-bs-parent="#sidebar-nav">
            @can('articles.index')
              <li>
                <a href="{{ route('articles.index') }}" class="{{ request()-> routeIs('articles.index','articles.show')  ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Artículos</span>
                </a>
              </li>
            @endcan
            @can('students.index')
              <li>
                <a href="{{ route('students.index') }}" class="{{ request()-> routeIs('students.index')  ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Alumnos</span>
                </a>
              </li>
            @endcan
            @can('academy.index')
              <li>
                <a href="{{ route('academy.index') }}" class="{{ request()-> routeIs('academy.index')  ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Academias Locales</span>
                </a>
              </li>
            @endcan
          </ul>
        </li><!-- End Tables Nav -->
      @endcanany

      @can('operations.index')
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('operations') }}">
            <i class="bi bi-bar-chart"></i>
            <span>Operaciones</span>
          </a>
        </li><!-- End Operation Page Nav -->
      @endcan

      
      @canany(['user.index', 'user.create', 'role.index', 'role.create'])
        <li class="nav-heading">Administración</li>
      @endcanany
      
      @canany(['user.create', 'user.index'])
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('user.create') }}">
                <i class="bi bi-circle"></i><span>Registrar</span>
              </a>
            </li>
            <li>
              <a href="{{ route('user.index') }}">
                <i class="bi bi-circle"></i><span>Tabla</span>
              </a>
            </li>
          </ul>
        </li><!-- End Charts Nav -->          
      @endcanany


      @canany(['role.create', 'role.index'])
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#roles-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-lines-fill"></i><span>Roles</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="roles-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('role.create') }}">
                <i class="bi bi-circle"></i><span>Crear</span>
              </a>
            </li>
            <li>
              <a href="{{ route('role.index') }}">
                <i class="bi bi-circle"></i><span>Tabla</span>
              </a>
            </li>
          </ul>
        </li><!-- End Charts Nav -->
      @endcanany

    </ul>

  </aside>