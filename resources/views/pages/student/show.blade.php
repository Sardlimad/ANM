@extends('layouts.plantilla')

@section('title', 'Ficha de Estudiante')

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
                                <li><a class="dropdown-item" href="javascript:void(0)" id="printButton">Imprimir</a></li>
                                @can('students.destroy')
                                    <li><button class="dropdown-item" type="submit" form="destroyStudent" id="destroyButton">Eliminar</button></li>
                                @endcan

                            </ul>
                        </div>
                        {{-- Destroy Student Form --}}
                        <form action="{{ route('students.destroy', $student) }}" method="POST" id="destroyStudent">
                            @method('delete') @csrf
                        </form>

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#student-overview">Resumen</button>
                            </li>

                            @can('students.update')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#student-edit">Editar</button>
                                </li>
                            @endcan

                            @can('operations.index')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#student-articles">Artículos</button>
                                </li>
                            @endcan

                        </ul>

                        <div class="tab-content pt-2 printableArea">

                            <!-- student Overview Tab -->
                            <div class="tab-pane fade show active profile-overview" id="student-overview">
                                <h5 class="">Detalles del Estudiante</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div><label class="label">Nombre:</label> {{ $student->name }}</div>
                                        <div><label class="label">Sexo: </label> {{ $student->gender }}</div>
                                        <div><label class="label">Nacimiento: </label>
                                            {{ date('d/m/Y', strtotime($student->birthday)) . ' (' . now()->diff(new DateTime($student->birthday))->y . ' años)' }}
                                        </div>
                                        <div><label class="label">Teléfono: </label> {{ $student->phone }}</div>
                                    </div>



                                    <div class="col-md-6">
                                        <div><label class="label">Tipo: </label> {{ $student->type }} </div>
                                        <div><label class="label">Academia: </label> {{ $student->academy->city }}</div>
                                        <div><label class="label">Registro: </label>
                                            {{ date('d/m/Y h:i:s', strtotime($student->created_at)) }}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @can('students.update')
                                <div class="tab-pane fade user-edit pt-3 printableArea" id="student-edit">

                                    <!-- student Edit Form -->
                                    <form action="{{ route('students.update', $student) }}" method="POST"
                                        class="row g-3 needs-validation" novalidate>

                                        @method('put')
                                        @csrf

                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="name" name="name" required
                                                value="{{ $student->name }}">
                                            <div class="invalid-feedback">
                                                Proporcione el nombre.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Sexo</label>
                                            <select class="form-select" id="gender" name='gender'>
                                                @if ($student->gender == 'Femenino')
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino" selected>Femenino</option>
                                                @else
                                                    <option value="Masculino" selected>Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday"
                                                date-date-format='DD MM YYYY' value="{{ $student->birthday }}" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="phone" class="form-label">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend">+53</span>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    aria-describedby="inputGroupPrepend" value="{{ $student->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Tipo</label>
                                            <select class="form-select" id="type" name="type">
                                                @if ($student->type == 'Alumno')
                                                    <option value="Alumno" selected>Alumno</option>
                                                    <option value="Autodidacta">Autodidacta</option>
                                                @else
                                                    <option value="Alumno">Alumno</option>
                                                    <option value="Autodidacta" selected>Autodidacta</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Academia</label>
                                            <select class="form-select" id="academy_id" name="academy_id">
                                                @foreach ($academies as $academy)
                                                    <option value={{ $academy->id }}
                                                        @if ($academy->id == $student->academy->id) selected @endif>
                                                        {{ $academy->city }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </form><!-- End student Edit Form -->

                                </div>
                            @endcan

                            @can('operations.index')
                                <div class="tab-pane fade pt-3 printableArea" id="student-articles">

                                    {{-- <span>Mostrar: <button class="btn btn-primary btn-sm" onclick="mostrarOperaciones()">Vigentes</button>&nbsp;<button class="btn btn-secondary btn-sm" onclick="mostrarTodo()">Todo</button></span>
                                    <hr> --}}
                                    <!-- Articles Tab -->
                                    <table class="table table-borderless datatable ">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Artículo</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Entrega</th>
                                                <th scope="col">Recepción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->operations as $operation)
                                                <tr class="operation" data-active="{{ $operation->active }}">
                                                    <th scope="row"><a href="#">#{{ $operation->id }}</a></th>
                                                    <td><a href="{{ route('articles.show', $operation->article) }}"
                                                            class="text-primary">{{ $operation->article->type }}</a></td>
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

                                    {{-- <script>
                                        function mostrarOperaciones() {
                                            var operaciones = document.getElementsByClassName('operation');

                                            for (var i = 0; i < operaciones.length; i++) {
                                                var isActive = operaciones[i].getAttribute('data-active');

                                                if (isActive == true) {
                                                    operaciones[i].hidden = false;
                                                } else {
                                                    operaciones[i].hidden = true;
                                                }
                                            }
                                        }

                                        function mostrarTodo(){
                                            var operaciones = document.getElementsByClassName('operation');

                                            for (var i = 0; i < operaciones.length; i++) {
                                                    operaciones[i].hidden = false;
                                            }

                                        }
                                    </script> --}}

                                </div><!-- End Articles Tab -->
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
