@extends('layouts.plantilla')

@section('title', 'Usuarios')

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

                    <li><a class="dropdown-item" href="javascript:void(0)" id="printButton">Imprimir</a></li>
                    
                </ul>
            </div>

            <div class="card-body printableArea">
                <h5 class="card-title">Tabla de Usuarios</h5>

                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            {{-- <th scope="col">Rol</th> --}}
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td><a href="{{ route('user.show', $user)}}">{{ $user->email }}</a></td>
                                {{-- <td>{{ $user->rol }}</td> --}}
                                <td width="10 px"><a type="button" class="btn btn-outline-primary btn-sm rounded-pill" href="{{ route('user.show', $user)}}"><i class="bi bi-info-circle"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Articles Table -->

@endsection
