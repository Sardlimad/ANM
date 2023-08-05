@extends('layouts.plantilla')

@section('title', 'Academias')

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

                </ul>
            </div>

            <div class="card-body">
                <h5 class="card-title">Tabla de Academias Locales</h5>

                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Estudiantes</th>
                            <th scope="col" class="no-print">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($academies as $academy)
                            <tr>
                                <td>{{ $academy->city }}</td>
                                <td>{{ $academy->students->count() }}</td>
                                <td width="10 px"  class="no-print">
                                    <a type="button" class="btn btn-outline-primary btn-sm rounded-pill"
                                        href="{{ route('academy.show', $academy) }}"><i class="bi bi-info-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Articles Table -->

@endsection
