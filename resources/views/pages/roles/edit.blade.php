@extends('layouts.plantilla')

@section('title','Editar Rol')

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Rol</h5>

            {!! Form::model($role, ['route' => ['role.update', $role], 'method' => 'put']) !!}
                
            @include('pages.roles.partials.form')

                {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
    @endsection