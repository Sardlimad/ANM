@extends('layouts.plantilla');

@section('title','Nueva Academia');

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registrar Academia</h5>

            <!-- Custom Styled Validation -->
            <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="name" required>
                    <div class="invalid-feedback">
                        Proporcione el nombre de la Ciudad.
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Representante</label>
                    <select class="form-select" id="manager" >
                        @foreach ($managers as $manager)
                            <option value={{$manager->id}}>{{$manager->name}}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Enviar Datos</button>
                </div>
            </form><!-- End Custom Styled Validation -->
        </div>
    @endsection