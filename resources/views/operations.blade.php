@extends('layouts.plantilla')




@section('content')


          <!-- Operations Table -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Hoy</a></li>
                  <li><a class="dropdown-item" href="#">Mes actual</a></li>
                  <li><a class="dropdown-item" href="#">Año Actual</a></li>
                  <li><a class="dropdown-item" href="#">Todas</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Operaciones <span>| Todas</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Artículo</th>
                      <th scope="col">Alumno</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Operación</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><a href="#">#2457</a></th>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>@lachy</td>
                      <td>25-09-2021 11:37 AM</td>
                      <td><span class="badge bg-success">Préstamo</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">#2147</a></th>
                      <td>Bridie Kessler</td>
                      <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                      <td>@lachy</td>
                      <td>25-09-2021 11:37 AM</td>
                      <td><span class="badge bg-warning">Devolución</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">#2049</a></th>
                      <td>Ashleigh Langosh</td>
                      <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                      <td>@yiganis</td>
                      <td>25-09-2021 11:37 AM</td>
                      <td><span class="badge bg-success">Préstamo</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Angus Grady</td>
                      <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                      <td>@lachy</td>
                      <td>25-09-2021 11:37 AM</td>
                      <td><span class="badge bg-danger">Eliminación</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                      <td>@lachy</td>
                      <td>25-09-2021 11:37 AM</td>
                      <td><span class="badge bg-success">Préstamo</span></td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Operations Table -->


@endsection