@extends('layouts.plantilla')

@section('title', 'Nuevo Artículo')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registrar Nuevo Artículo</h5>

            <!-- Custom Styled Validation -->

            <form action="{{route('articles.store')}}" method="POST" class="row g-3 needs-validation" novalidate>

                @csrf

                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Categoría</label>
                    <select class="form-select" id="category" onchange="verificar();" name="category">
                        <option value="Instrumento">Instrumento</option>
                        <option value="Libro">Libro</option>
                        <option value="Accesorio">Accesorio</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                    <div class="invalid-feedback">
                        Proporcione el tipo.
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="brand" name="brand" required>
                    <div class="invalid-feedback">
                        Proporcione la marca.
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                    <div class="invalid-feedback">
                        Proporcione el modelo.
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label" id='serial_label'>No.Serie</label>
                    <input type="text" class="form-control" id="serial" name="serial">
                    <div class="invalid-feedback">
                        Proporcione el Número de Serie.
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Estado</label>
                    <select class="form-select" id="status" name="status">
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
                </div>

                <div class="md-4">
                    <label for="validationCustom01" class="form-label">Descripción</label>
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Enviar Datos</button>
                </div>
            </form><!-- End Custom Styled Validation -->
        </div>

    @endsection


