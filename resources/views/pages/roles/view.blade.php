@extends('layouts.plantilla')

@section('title', 'Roles')

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
                <h5 class="card-title">Tabla de Roles</h5>
                
                <table class="table table-striped datatable" >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row"><a href="#">{{$role->id}}</a></th>
                                <td>{{$role->name}}</td>                                
                                <td width="10 px">
                                    <a type="button" class="btn btn-outline-primary btn-sm rounded-pill" href="{{ route('role.edit', $role)}}"><i class="bi bi-pencil-square"></i></a>                                    
                                </td>
                                <td width="10 px">
                                    <form action="{{ route('role.destroy', $role) }}" method="POST" id="destroyRole">
                                        @method('delete') @csrf   
                                        <button class="btn btn-outline-danger btn-sm rounded-pill" type="submit" form="destroyRole" id="destroyButton"><i class="bi bi-trash"></i></button>              
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Articles Table -->

@endsection
