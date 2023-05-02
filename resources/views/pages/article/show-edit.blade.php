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

                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#verticalycentered">{{ $article->available == 1 ? 'Prestar' : 'Devolver' }}</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0)" id="printButton">Imprimir</a></li>

                            </ul>
                        </div>

                    @section('modal_title', 'Realizar Préstamo')

                    @section('modal_body')                                            
                                
                                <form action="" method="POST" class="row g-1 needs-validation" novalidate>
                                    @csrf  @method('put')
                                    
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="CheckAcademy" onclick="Loan();">                                        
                                        <label class="form-check-label" for="CheckAcademy" onclick="Loan();">Responsabilizar a Academia</label>
                                    </div>
                                    <hr>

                                    <div class="label" id="labelLoanTo">Nombre del Estudiante </div>
                                    <input type="text" id="loanToStudent" class="form-control" name="id_student" list="list_students">
                                    <input type="text" id="loanToAcademy" class="form-control" name="id_academies" list="list_academies" hidden>
                                    <datalist id="list_students" name="list_students">
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}}</option>                                        
                                        @endforeach
                                    </datalist>

                                    <datalist id="list_academies" name="list_academies">
                                        @foreach($academies as $academy)
                                            <option value="{{$academy->id}}">{{$academy->city}}</option>                                        
                                        @endforeach
                                    </datalist>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form><!-- End Student Tab Form -->
                            
                                <script>
                                    function Loan(){
                                        var checker = document.getElementById("CheckAcademy");
                                        var label = document.getElementById("labelLoanTo");
                                        var student = document.querySelector("#loanToStudent");
                                        var academy = document.querySelector("#loanToAcademy");
                                                                                
                                        if(checker.checked){
                                            label.innerHTML = "Nombre de Academia";
                                            student.hidden = true;
                                            academy.hidden = false;
                                            
                                        }else{
                                            label.innerHTML = "Nombre del Estudiante";
                                            student.hidden = false;
                                            academy.hidden = true;                                        
                                        }
                                    }

                                   
                                </script>


                        @endsection

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Resumen</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">Editar</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Operaciones</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2 printableArea">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="">Detalles del {{ $article->category }} <span class="{{ $article->available == '1' ? 'badge rounded-pill bg-success' : 'badge bg-danger' }}">{{ $article->available == '1' ? 'Disponible' : 'Prestado' }}</span></h5>
                                
                                <div class="row g-3">

                                <div class="col-md-4">                                    
                                    <div class="label">Tipo: </div>
                                    <div>{{ $article->type }}</div>
                                
                                    <div class="label">Marca: </div>
                                    <div>{{ $article->brand }}</div>

                                    <div class="label">Modelo: </div>
                                    <div>{{ $article->model }}</div>
                                </div>

                                <div class="col-md-4">                                    
                                    <div class="label">{{ $article->category == 'Libro' ? 'ISBN' : 'No.Serie' }}</div>
                                    <div>{{ $article->serial }}</div>

                                    <div class="label">Estado: </div>
                                    <div>{{ $article->status }}</div>

                                    <div class="label">Descripción: </div>
                                    <div>{{ $article->description }}</div>
                                </div>

                                <div class="col-md-4">                                                                
                                    <div class="label">Fecha de Registro: </div>
                                    <div>{{ $article->created_at }}</div>
                                
                                    <div class="label">Fecha de Actualización: </div>
                                    <div>{{ $article->updated_at }}</div>
                                </div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3 printableArea" id="profile-edit">

                                <!-- Article Edit Form -->
                                <form action="{{ route('articles.update', $article) }}" method="POST"
                                    class="row g-3 needs-validation" novalidate>

                                    @method('put')
                                    @csrf

                                    <div class="col-md-4">
                                        <label for="validationCustom04" class="form-label">Categoría</label>
                                        <select class="form-select" id="category" onchange="verificar();"
                                            name="category">
                                            <option value="Instrumento"
                                                {{ $article->category == 'Instrumento' ? 'selected' : '' }}>Instrumento
                                            </option>
                                            <option value="Libro"
                                                {{ $article->category == 'Libro' ? 'selected' : '' }}>
                                                Libro</option>
                                            <option value="Accesorio"
                                                {{ $article->category == 'Accesorio' ? 'selected' : '' }}>Accesorio
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Tipo</label>
                                        <input type="text" class="form-control" id="type" name="type"
                                            required value="{{ $article->type }}">
                                        <div class="invalid-feedback">
                                            Proporcione el tipo.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Marca</label>
                                        <input type="text" class="form-control" id="brand" name="brand"
                                            required value="{{ $article->brand }}">
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
                                            <option value="Bueno"
                                                {{ $article->status == 'Bueno' ? 'selected' : '' }}>
                                                Bueno</option>
                                            <option value="Regular"
                                                {{ $article->status == 'Regular' ? 'selected' : '' }}>Regular</option>
                                            <option value="Malo" {{ $article->status == 'Malo' ? 'selected' : '' }}>
                                                Malo</option>
                                        </select>
                                    </div>

                                    <div class="md-4">
                                        <label for="validationCustom01" class="form-label">Descripción</label>
                                        <textarea type="text" class="form-control" id="description" name="description">{{ $article->description }}</textarea>
                                    </div>

                                    <input type="hidden" id="status" name="status"
                                        value="{{ $article->status }}">
                                    <input type="hidden" id="created_at" name="created_at"
                                        value="{{ $article->created_at }}">
                                    <input type="hidden" id="updated_at" name="updated_at"
                                        value="{{ $article->updated_at }}">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form><!-- End Article Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3 printableArea" id="profile-change-password">
                                <!-- Operations Tab -->
                                <table class="table table-borderless datatable ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
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
                                                <td><a href="#"
                                                        class="text-primary">{{ $operation->id_student }}</a></td>
                                                <td>{{ $operation->users->username }}</td>
                                                <td>{{ $operation->created_at }}</td>
                                                <td><span
                                                        class="{{ estilo($operation->operation) }}">{{ $operation->operation }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div><!-- End Operations Tab -->

                    </div>
                </div>

            </div>
        </div>
</section>

@endsection

<?php
function estilo($oper)
{
    switch ($oper) {
        case 'Registro':
            return 'badge bg-primary';
            break;

        case 'Préstamo':
            return 'badge bg-success';
            break;

        case 'Eliminación':
            return 'badge bg-danger';
            break;

        case 'Devolución':
            return 'badge bg-warning';
            break;

        case 'Edición':
            return 'badge bg-info';
            break;
    }
}

function select($collection, $id, $campo, $valor)
{
    foreach ($collection as $object) {
        if ($object->$id == $campo) {
            # code...
        }
    }
}
?>

<script>
    function Loan(){
        if(document.getElemntById("CheckAcademy").checked){
            document.getElemntById("labelLoanTo").innerHTML = "Nombre de Academia";
            document.getElemntById("loanTo").list = "list_academies";
            document.getElemntById("loanTo").name = "id_academy";
        }else{
            document.getElemntById("labelLoanTo").innerHTML = "Nombre del Estudiante";
            document.getElemntById("loanTo").list = "list_students";
            document.getElemntById("loanTo").name = "id_student";
        }
    }
</script>