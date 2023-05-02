@extends('layouts.plantilla')

@section('title', 'Operaciones');


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
                            <th scope="col">ID</th>
                            <th scope="col">Artículo</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Operación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operations as $operation)
                            <tr>
                                <th scope="row"><a href="#">#{{ $operation->id }}</a></th>
                                <td>@isset($operation->id_article) <a href="{{ route('articles.show', ['article'=> $operation->articles->id ])}}">{{ $operation->articles->type }}</a>@endisset </td>
                                <td><a href="#" class="text-primary">@isset($operation->students)
                                    {{ $operation->students->name }}
                                @endisset</a></td>
                                <td>{{ $operation->users->username }}</td>
                                <td>{{ $operation->created_at }}</td>
                                <td><span class="{{ estilo($operation->operation) }}">{{ $operation->operation }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Operations Table -->
@endsection


<?php 
  function estilo($oper)
  {
    switch ($oper) {
      case 'Registro':
        return 'badge border-primary border-1 text-primary';
        break;
      
        case 'Préstamo':
        return 'badge border-success border-1 text-success';
        break;

        case 'Eliminación':
        return 'badge border-danger border-1 text-danger';
        break;

        case 'Devolución':
        return 'badge border-warning border-1 text-warning';
        break;

        case 'Edición':
        return 'badge border-info border-1 text-info';
        break;
    }
  }

  function select($collection, $id, $campo, $valor)
  {
    foreach($collection as $object)
    {
        if ($object->$id == $campo) {
            # code...
        }
    }
  }
?>
