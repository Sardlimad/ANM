@extends('layouts.plantilla')

@section('title', 'Ficha de Artículo')

@section('content')

    <section class="section profile">
        <div class="row">


            <div class="col-12">

                <div class="card">
                    <div class="card-body pt-3">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Opciones</h6>
                                </li>

                                @if ($article->operations->isNotEmpty() && $article->operations->last()->active == true)
                                    @can('operations.update')
                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#verticalycentered">Devolver</a></li>
                                    @endcan
                                @else
                                    @can('operations.create')
                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#verticalycentered">Prestar</a></li>
                                    @endcan
                                @endif

                                <li><a class="dropdown-item" href="javascript:void(0)" id="printButton">Imprimir</a></li>
                                @can('articles.destroy')
                                    <li><button class="dropdown-item" type="submit" form="destroyArticle"
                                            id="destroyButton">Eliminar</button></li>
                                @endcan

                            </ul>
                        </div>

                        {{-- Destroy Article Form --}}
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" id="destroyArticle">
                            @method('delete') @csrf
                        </form>

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#article-overview">Resumen</button>
                            </li>

                            @can('articles.update')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#article-edit">Editar</button>
                                </li>
                            @endcan

                            @can('operations.index')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#article-operations">Operaciones</button>
                                </li>
                            @endcan

                        </ul>

                        <div class="tab-content pt-2 printableArea">

                            <!-- Article Overview Tab -->
                            <div class="tab-pane fade show active profile-overview" id="article-overview">
                                <h5 class="">Detalles del {{ $article->category }} @if ($article->operations->isNotEmpty() && $article->operations->last()->active == true)
                                        <span class="badge rounded-pill bg-danger"><i class="bi bi-x-lg"></i></span>
                                    @else
                                        <span class="badge rounded-pill bg-success"><i class="bi bi-check-lg"></i></span>
                                    @endif
                                </h5>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div><label class="label">Tipo:</label> {{ $article->type }}</div>
                                        <div><label class="label">Marca: </label> {{ $article->brand }}</div>
                                        <div><label class="label">Modelo: </label> {{ $article->model }}</div>
                                        <div><label
                                                class="label">{{ $article->category == 'Libro' ? 'ISBN' : 'No.Serie' }}:
                                            </label> {{ $article->serial }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <div><label class="label">Estado: </label> {{ $article->status }} </div>
                                        <div><label class="label">Fecha de Registro: </label>
                                            {{ date('d/m/Y H:i:s', strtotime($article->created_at)) }}
                                        </div>
                                        <div><label class="label">Fecha de Actualización:
                                            </label>{{ date('d/m/Y H:i:s', strtotime($article->updated_at)) }}</div>
                                        @if ($article->operations->isNotEmpty() && $article->operations->last()->active == true)
                                            <div><label class="label">Responsable:
                                                </label>{{ $article->operations->last()->student->name }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <div><label class="label">Descripción: </label> {{ $article->description }}</div>
                                    </div>
                                </div>

                            </div>

                            @can('articles.update')
                                <div class="tab-pane fade user-edit pt-3" id="article-edit">

                                    <!-- Article Edit Form -->
                                    <form action="{{ route('articles.update', $article) }}" method="POST"
                                        class="row g-3 needs-validation" novalidate>

                                        @method('put')
                                        @csrf

                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Categoría</label>
                                            <select class="form-select" id="category" onchange="verificar();" name="category">
                                                <option value="Instrumento"
                                                    {{ $article->category == 'Instrumento' ? 'selected' : '' }}>Instrumento
                                                </option>
                                                <option value="Libro" {{ $article->category == 'Libro' ? 'selected' : '' }}>
                                                    Libro</option>
                                                <option value="Accesorio"
                                                    {{ $article->category == 'Accesorio' ? 'selected' : '' }}>Accesorio
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Tipo</label>
                                            <input type="text" class="form-control" id="type" name="type" required
                                                value="{{ $article->type }}">
                                            <div class="invalid-feedback">
                                                Proporcione el tipo.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Marca</label>
                                            <input type="text" class="form-control" id="brand" name="brand" required
                                                value="{{ $article->brand }}">
                                            <div class="invalid-feedback">
                                                Proporcione la marca.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Modelo</label>
                                            <input type="text" class="form-control" id="model" name="model"
                                                required value="{{ $article->model }}">
                                            <div class="invalid-feedback">
                                                Proporcione el modelo.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label"
                                                id='serial_label'>{{ $article->category == 'Libro' ? 'ISBN' : 'No.Serie' }}</label>
                                            <input type="text" class="form-control" id="serial" name="serial"
                                                required value="{{ $article->serial }}">
                                            <div class="invalid-feedback">
                                                Proporcione el Número de Serie.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Estado</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="Bueno" {{ $article->status == 'Bueno' ? 'selected' : '' }}>
                                                    Bueno</option>
                                                <option value="Regular" {{ $article->status == 'Regular' ? 'selected' : '' }}>
                                                    Regular</option>
                                                <option value="Malo" {{ $article->status == 'Malo' ? 'selected' : '' }}>
                                                    Malo</option>
                                            </select>
                                        </div>

                                        <div class="md-4">
                                            <label for="validationCustom01" class="form-label">Descripción</label>
                                            <textarea type="text" class="form-control" id="description" name="description">{{ $article->description }}</textarea>
                                        </div>

                                        <input type="hidden" id="status" name="status" value="{{ $article->status }}">
                                        <input type="hidden" id="created_at" name="created_at"
                                            value="{{ date('d/m/Y H:i:s', strtotime($article->created_at)) }}">
                                        <input type="hidden" id="updated_at" name="updated_at"
                                            value="{{ $article->updated_at }}">

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </form><!-- End Article Edit Form -->

                                </div>
                            @endcan

                            @can('operations.index')
                                <div class="tab-pane fade pt-3" id="article-operations">
                                    <!-- Operations Tab -->
                                    <table class="table table-borderless datatable ">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Alumno</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Entrega</th>
                                                <th scope="col">Recepción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($article->operations as $operation)
                                                <tr>
                                                    <th scope="row"><a href="#">#{{ $operation->id }}</a></th>
                                                    <td>
                                                        @isset($operation->student_id)
                                                            <a href="{{ route('students.show', $operation->student) }}"
                                                                class="text-primary">{{ $operation->student->name }}</a>
                                                        @endisset
                                                    </td>
                                                    <td>{{ $operation->user->name }}</td>
                                                    <td>{{ date('d/m/Y H:i:s', strtotime($operation->created_at)) }}</td>
                                                    <td>
                                                        @if ($operation->active == false)
                                                            {{ date('d/m/Y H:i:s', strtotime($operation->updated_at)) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div><!-- End Operations Tab -->
                            @endcan

                            <!-- Modal Content-->


                            @if ($article->operations->isNotEmpty() && $article->operations->last()->active == true)
                                <!-- Receive Form -->
                                @section('modal_title', 'Devolución')
                            @section('modal_body')
                                <p>¿Desea terminar el préstamo del artículo?</p>
                                <form action="{{ route('operations.update', $article->operations->last()) }}"
                                    method="POST" class="row g-3 needs-validation" novalidate id="receiveForm">
                                    @csrf @method('put')

                                @section('form', 'receiveForm')
                            </form>
                        @endsection
                    @else
                        @section('modal_title', 'Préstamo a:')
                        @section('modal_body')
                            {{-- <label class="label">Responsable: </label> --}}
                            <!-- Give Form -->
                            <form action="{{ route('operations.store', $article) }}" method="POST"
                                class="needs-validation " novalidate id="giveForm">
                                @csrf
                                <select id="students" class="form-control" name="student_id">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                                @section('form', 'giveForm')
                                {{-- <input type="submit" class="btn btn-primary" value="Entregar"> --}}
                            </form>
                        @endsection
                    @endif

                </div><!-- End Modal Content -->
            </div>
        </div>
    </div>
</div>
</div>
</section>

@endsection
