@extends('layouts.plantilla')

@section('title', 'Academia Local')

@section('content')

    <section class="section profile">
        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#academy-overview">Resumen</button>
                            </li>

                            @can('academy.update')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#academy-edit">Editar</button>
                                </li>
                            @endcan

                            @can('articles.index')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#articles-academy">Artículos</button>
                                </li>
                            @endcan

                            @can('students.index')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#students-academy">Estudiantes</button>
                                </li>
                            @endcan

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="academy-overview">

                                <h5 class="card-title">Detalles de Academia</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Ciudad</div>
                                    <div class="col-lg-9 col-md-8">{{ $academy->city }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Estudiantes</div>
                                    <div class="col-lg-9 col-md-8">{{ $academy->students->count() }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fecha de Creación</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ date('d/m/Y H:i:s', strtotime($academy->created_at)) }}
                                    </div>
                                </div>

                            </div>

                            @can('academy.update')
                                <div class="tab-pane fade profile-edit pt-3" id="academy-edit">

                                    <!-- Academy Edit Form -->

                                    {!! Form::model($academy, ['route' => ['academy.update', $academy], 'method' => 'put']) !!}
                                    <div class="row mb-3">
                                        {!! Form::label('city', 'Ciudad', ['class' => 'col-form-label']) !!}
                                        <div class="">
                                            {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

                                    {!! Form::close() !!}

                                </div>
                            @endcan

                            <div class="tab-pane fade pt-3" id="articles-academy">
                                <!-- Articles Tab -->

                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Categoría</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Obtengo la coleccion de estudiantes de la academia --}}
                                        @foreach ($academy->students as $student)
                                            {{-- Obtengo la coleccion de operaciones de un estudiante --}}
                                            @foreach ($student->operations as $operation)
                                                {{-- Obtengo las propiedades necesarias del articulo perteneciente a una operacion --}}

                                                @if ($operation->active == true)
                                                    <tr>
                                                        <td>{{ $operation->article->id }}</td>
                                                        <td>{{ $operation->article->category }}</td>
                                                        <td>{{ $operation->article->type }}</td>
                                                        <td>{{ $operation->student->name }}</td>
                                                        <td><a class="btn btn-outline-primary btn-sm rounded-pill"
                                                                href="{{ route('articles.show', $operation->article) }}"><i
                                                                    class="bi bi-info-circle"></i></a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>



                            </div>

                            <div class="tab-pane fade pt-3" id="students-academy">
                                <!-- Students Tab -->

                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">&nbsp;</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($academy->students as $student)
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->created_at }}</td>
                                                <td width="10px"><a class="btn btn-outline-primary btn-sm rounded-pill"
                                                        href="{{ route('students.show', $student) }}"><i
                                                            class="bi bi-info-circle"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
