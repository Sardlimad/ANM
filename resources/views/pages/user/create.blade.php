@extends('layouts.plantilla')

@section('title', 'Nuevo Usuario')

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registrar Nuevo Usuario</h5>

            <!-- Custom Styled Validation -->
            <form class="row g-3 needs-validation" action="{{ route('user.store') }}" method="POST" novalidate>
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">
                        Proporcione el nombre.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Proporcione el correo.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Contraseña</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="" onclick="generatePw();" ><i class="bi bi-arrow-repeat"></i></span>
                        <input type="text" class="form-control" id="password" name="password" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Proporcione la contraseña.
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    {!! Form::label('roles', 'Roles', ['class' => 'form-label']) !!}
                    <div class="col-md-8 col-lg-9">
                        @foreach ($roles as $role)
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}} &nbsp;
                        @endforeach                                        
                    </div>
                </div>                               
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Enviar Datos</button>
                </div>
            </form><!-- End Custom Styled Validation -->
        </div>
    @endsection

    
    <script>
        //General Contraseña aleatoria
        function generatePw() {
            
            var pw = '';
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'+'abcdefghijklmnopqrstuvwxyz1234567890'+'@.$*()[]';
            
            for(i = 0; i < 8; i++) {
                var  char = Math.floor(Math.random()*str.length+1);

                pw += str.charAt(char);
            }
            document.getElementById('password').value = pw;
        }
    </script>
