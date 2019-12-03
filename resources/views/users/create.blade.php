{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Crear usuario</h1>
    <hr>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {{ Form::open(array('url' => 'users')) }}
        <div class="form-row">
                <div class="form-group col-md-6">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-6">
                        <label>Tipo de Identificacion</label>
                        <select class="form-control form-control-sm"  name="tipo_identificacion">
                                <option ></option>
                                <option value="1">Cédula</option>
                                <option value="2">DIMEX</option>
                                <option value="3">Pasaporte</option>
                            </select>
                </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                            {{ Form::label('name', 'Número de Indentificación') }}
                            {{ Form::text('identificacion', '', array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-md-6">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                                <label>Tipo de Telefono</label>
                                <select class="form-control form-control-sm"  name="tipo_telefono">
                                        <option ></option>
                                        <option value="1">Celular</option>
                                        <option value="2">Fijo Oficina</option>
                                        <option value="3">Fijo Casa</option>
                                    </select>
                        </div>
                        <div class="form-group col-md-6">
                                {{ Form::label('name', 'Número de Telefono') }}
                                {{ Form::number('telefono', '', array('class' => 'form-control')) }}
                        </div>
                    </div>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>
    <div class="form-row">
            <div class="form-group col-md-6">
                    {{ Form::label('password', 'Password') }}<br>
                    {{ Form::password('password', array('class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-6">
                    {{ Form::label('password', 'Confirm Password') }}<br>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
            </div>
        </div>

    {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
