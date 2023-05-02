@extends('layouts.plantilla');

@section('title','Nuevo Estudiante');

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registrar Nuevo Miembro</h5>

            <!-- Custom Styled Validation -->
            <form action="{{route('student.store')}}" method="POST" class="row g-3 needs-validation" novalidate>

                @csrf

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">
                        Proporcione el nombre.
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Sexo</label>
                    <select class="form-select" id="gender" name='gender'>
                        <option value="administrador">Masculino</option>
                        <option value="representante">Femenino</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" date-date-format='DD MM YYYY'>
                </div>
                
                <div class="col-md-4">
                    <label for="phone" class="form-label">Teléfono</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">+53</span>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="inputGroupPrepend">
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type">
                        <option value="administrador">Alumno</option>
                        <option value="representante">Autodidacta</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Academia</label>
                    <select class="form-select" id="id_academy" name="id_academy">
                        @foreach ($academies as $academy)
                            <option value={{$academy->id}}>{{$academy->city}}</option>
                        @endforeach
                    </select>
                </div>

                

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Enviar Datos</button>
                </div>
            </form><!-- End Custom Styled Validation -->
        </div>
    @endsection
    