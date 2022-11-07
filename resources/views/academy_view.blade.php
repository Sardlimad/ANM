@extends('layouts.plantilla')

@section('title','Academias')

@section('content')

<!-- Articles Table -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Opciones</h6>
          </li>

          <li><a class="dropdown-item" href="#">Imprimir</a></li>
          <li><a class="dropdown-item" href="#">PDF</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Tabla de Academias Locales</h5>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Iglesia</th>
              <th scope="col">Representante</th>
              <th scope="col">Teléfono</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Amarillas</td>
              <td>Ramiro Gash DJlas</td>
              <td>15454501</td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Articles Table -->

@endsection