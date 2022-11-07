@extends('layouts.plantilla')

@section('title','Alumnos')

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
        <h5 class="card-title">Tabla de Alumnos</h5>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Ingreso</th>
              <th scope="col">Edad</th>
              <th scope="col">Academia</th>
              <th scope="col">Teléfono</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#">#1</a></th>
              <td>Juan</td>
              <td> Peres Perez</td>
              <td>20/04/1997</td>
              <td>22</td>
              <td>Amarillas</td>
              <td>434234324</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2</a></th>
              <td>Ramiro</td>
              <td> Gonzales Echemendia</td>
              <td>20/04/1997</td>
              <td>22</td>
              <td>Torriente</td>
              <td>434234324</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#3</a></th>
              <td>Yessica</td>
              <td>Alvares Rodirgues</td>
              <td>20/04/1997</td>
              <td>22</td>
              <td>La Habana</td>
              <td>434234324</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#4</a></th>
              <td>Amanda</td>
              <td>Albizu Suarez</td>
              <td>20/04/1997</td>
              <td>22</td>
              <td>Australia</td>
              <td>434234324</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#6</a></th>
              <td>Dayron</td>
              <td> Gonzales Perez</td>
              <td>20/04/1997</td>
              <td>22</td>
              <td>Jaguey Grande</td>
              <td>434234324</td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#5</a></th>
              <td>Manuel</td>
              <td>Castro Davila</td>
              <td>20/04/1997</td>
              <td>22</td>
              <td>Amarillas</td>
              <td>434234324</td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Articles Table -->

@endsection