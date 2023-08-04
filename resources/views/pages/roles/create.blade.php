@extends('layouts.plantilla')

@section('title','Nuevo Rol')

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Rol</h5>

            {!! Form::open(['route' => 'role.store']) !!}
                
            @include('pages.roles.partials.form')

                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            
        </div>
    @endsection