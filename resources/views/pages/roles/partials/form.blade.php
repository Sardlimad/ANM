<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'required',
        'placeholder' => 'Introduzca el nombre del rol',
    ]) !!}
</div>
<br>
<h5>Listado de Permisos</h5>
<div class="row">

    @foreach ($permissions as $permission)
        <div class="col-md-4">
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach

</div>
