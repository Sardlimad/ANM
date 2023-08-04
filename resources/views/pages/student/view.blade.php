@extends('layouts.plantilla')

@section('title', 'Alumnos')

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
            <div class="card-body  printableArea">
                <h5 class="card-title">Tabla de Alumnos</h5>
                
                <table class="table table-striped datatable" >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            {{-- <th scope="col">Ingreso</th>
                            <th scope="col">Edad</th> --}}
                            <th scope="col">Academia</th>
                            {{-- <th scope="col">Teléfono</th> --}}
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th scope="row"><a href="#">{{$student->id}}</a></th>
                                <td>{{$student->name}}</td>
                                {{-- <td>{{date("d/m/Y H:i:s", strtotime($student->created_at))}}</td>
                                <td>{{now()->diff(new DateTime($student->birthday))->y}} años</td> --}}
                                <td>{{$student->academy->city}}</td>
                                {{-- <td>{{$student->phone}}</td> --}}
                                <td width="10 px">
                                    <a type="button" class="btn btn-outline-primary btn-sm rounded-pill" href="{{ route('students.show', $student)}}"><i class="bi bi-info-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Articles Table -->

@endsection
