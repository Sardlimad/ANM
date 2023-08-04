@extends('layouts.plantilla')

@section('title', 'Perfil de Usuario')

@section('content')

    <section class="section profile">
        <div class="row">
            {{-- <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ url('assets/img/profile-img.png') }}" alt="Profile" class="rounded-circle">
                        <h2>{{$user->name}}</h2>
                        <h3>{{$user->rol}}</h3>
                        
                    </div>
                </div>

            </div> --}}

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Resumen</button>
                            </li>

                            @can('user.update')
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar</button>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Cambiar Contraseña</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Detalles de Usuario</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nombre</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Correo</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Roles</div>
                                    <div class="col-lg-9 col-md-8">
                                        @foreach ($user->roles as $role)
                                            <i class="bi bi-dot"> {{ $role->name }}</i>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fecha de Creación</div>
                                    <div class="col-lg-9 col-md-8">{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}
                                    </div>
                                </div>

                            </div>

                            @can('user.update')
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->

                                    {!! Form::model($user, ['route' => ['user.update', $user], 'method' => 'put']) !!}
                                    <div class="row mb-3">
                                        {!! Form::label('name', 'Nombre', ['class' => 'col-md-4 col-lg-3 col-form-label']) !!}
                                        <div class="col-md-8 col-lg-9">
                                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        {!! Form::label('email', 'Correo', ['class' => 'col-md-4 col-lg-3 col-form-label']) !!}
                                        <div class="col-md-8 col-lg-9">
                                            {!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        {!! Form::label('roles', 'Roles', ['class' => 'col-md-4 col-lg-3 col-form-label']) !!}
                                        <div class="col-md-8 col-lg-9">
                                            @foreach ($roles as $role)
                                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                                {{$role->name}} &nbsp;
                                            @endforeach                                        
                                        </div>
                                    </div>

                                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

                                    {!! Form::close() !!}                                

                                </div>
                            @endcan

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña
                                            Actual</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva
                                            Contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repetir Nueva
                                            Contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>                            

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
