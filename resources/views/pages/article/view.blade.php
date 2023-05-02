@extends('layouts.plantilla')

@section('title', 'Artículos')

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
                <h5 class="card-title">Tabla de Artículos</h5>

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">Categoría</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Serie</th>
                            <th scope="col">Disponibilidad</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->category }}</td>
                                <td>{{ $article->type }}</td>
                                <td>{{ $article->brand }}</td>
                                <td>{{ $article->model }}</td>
                                <td>{{ $article->serial }}</td>
                                <td><span class="{{$article->available == '1' ? 'badge border-success border-1 text-success' : 'badge border-danger border-1 text-danger' }}">{{$article->available == '1' ? 'Disponible' : 'Prestado' }}</span></td>
                               <!-- <td><a href="#">Más Info</a></td>-->
                                <td>
                                    <a type="button" class="btn btn-light btn-sm rounded-pill" href="{{ route('articles.show', ['article'=> $article->id ])}}"><i class="bi bi-info-circle"></i></a>
                                    <a type="button" class="{{$article->available == '1' ? 'btn btn-success btn-sm rounded-pill' : 'btn btn-danger btn-sm rounded-pill' }}"  href="{{ route('articles.show', ['article'=> $article->id ])}}"><i class="{{$article->available == '1' ? 'bi bi-arrow-bar-right' : 'bi bi-arrow-bar-left' }}"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- <th scope="row"><a href="#">#2147</a></th>
                      <td>Guitarra Acústica</td>
                      <td>Blanditiis dolor omnis similique</td>
                      <td>lachy</td>
                      <td>25-09-2021 11:37 AM</td>
                      <td><span class="badge bg-danger">Prestado</span></td>
                    </tr>-->
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Articles Table -->

@endsection
