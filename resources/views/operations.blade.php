@extends('layouts.plantilla')

@section('title', 'Operaciones')


@section('content')
    <!-- Operations Table -->
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
                <h5 class="card-title">Operaciones</h5>

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            {{-- <th scope="col">ID</th> --}}
                            <th scope="col">Artículo</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Entrega</th>
                            <th scope="col">Recogida</th>
                            {{-- <th scope="col">Estado</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operations as $operation)
                            <tr>
                                {{-- <th scope="row"><a href="#">#{{ $operation->id }}</a></th> --}}
                                <td><a href="{{ route('articles.show', ['article'=> $operation->article_id ])}}">{{ $operation->article->type }}</a></td>
                                <td><a href="{{ route('students.show', $operation->student)}}" class="text-primary">{{ $operation->student->name }}</a></td>
                                <td>{{ $operation->user->name }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($operation->created_at)) }}</td>
                                <td>@if ($operation->active == false)
                                    {{ date("d/m/Y H:i:s", strtotime($operation->updated_at)) }}
                                @endif</td>
                                {{-- <td><span class="@include('layouts.partials.badges')">{{ $operation->type }}</span></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Operations Table -->
@endsection