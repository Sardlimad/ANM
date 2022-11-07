@extends('layouts.plantilla')

@section('title', 'Nuevo Usuario')

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registrar Nuevo Usuario</h5>

            <!-- Custom Styled Validation -->
            <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" required>
                    <div class="invalid-feedback">
                        Proporcione el nombre.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="Username" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Introduzca un nombre de usuario válido.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Contraseña</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="" onclick="generatePw();" ><i class="bi bi-arrow-repeat"></i></span>
                        <input type="text" class="form-control" id="password" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Proporcione la contraseña.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="phone" class="form-label">Teléfono</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">+53</span>
                        <input type="text" class="form-control" id="phone" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Introduzca un Teléfono.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Rol</label>
                    <select class="form-select" id="rol" onchange="hide();">
                        <option value="administrador">Administrador</option>
                        <option value="representante">Representante</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Academia</label>
                    <select class="form-select" id="academy" disabled>
                        <option value="Amarillas">Amarillas</option>
                        <option value="Jaguey Grande">Jaguey Grande</option>
                    </select>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Enviar Datos</button>
                </div>
            </form><!-- End Custom Styled Validation -->
        </div>
    @endsection

    
    <script>
        //Deshabilitar el campo academia
        function hide() {
            if (document.getElementById('rol').value == 'representante') {
                document.getElementById('academy').disabled = false;
            } else {
                document.getElementById('academy').disabled = true;
            }

        }

        function generatePw() {
            
            var pw = '';
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'+'abcdefghijklmnopqrstuvwxyz1234567890';
            
            for(i = 0; i < 8; i++) {
                var  char = Math.floor(Math.random()*str.length+1);

                pw += str.charAt(char);
            }
            document.getElementById('password').value = pw;
        }
    </script>
