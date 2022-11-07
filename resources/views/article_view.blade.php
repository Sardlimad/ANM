@extends('layouts.plantilla')

@section('title','Artículos')

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
        <h5 class="card-title">Tabla de Artículos</h5>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tipo</th>
              <th scope="col">Marca</th>
              <th scope="col">Modelo</th>
              <th scope="col">Serie</th>
              <th scope="col">Disponibilidad</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#">#2457</a></th>
              <td>Flauta Transversal</td>
              <td>Armstrong</td>
              <td>101</td>
              <td>67445A</td>
              <td><span class="badge bg-success">Disponible</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2147</a></th>
              <td>Guitarra Acústica</td>
              <td>Blanditiis dolor omnis similique</td>
              <td>@lachy</td>
              <td>25-09-2021 11:37 AM</td>
              <td><span class="badge bg-danger">Prestado</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2049</a></th>
              <td>Teclado</td>
              <td>At recusandae consectetur</td>
              <td>@yiganis</td>
              <td>25-09-2021 11:37 AM</td>
              <td><span class="badge bg-success">Disponible</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2645</a></th>
              <td>Trompeta</td>
              <td>Ut voluptatem id earum et</td>
              <td>@lachy</td>
              <td>25-09-2021 11:37 AM</td>
              <td><span class="badge bg-danger">Prestado</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">#2644</a></th>
              <td>Corneta</td>
              <td>Sunt similique distinctio</td>
              <td>@lachy</td>
              <td>25-09-2021 11:37 AM</td>
              <td><span class="badge bg-success">Disponible</span></td>
            </tr>
            <tr>
                <th scope="row"><a href="#">#2648</a></th>
                <td>Violin</td>
                <td>Sunt similique distinctio</td>
                <td>@lachy</td>
                <td>25-09-2021 11:37 AM</td>
                <td><span class="badge bg-success">Disponible</span></td>
              </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Articles Table -->

@endsection