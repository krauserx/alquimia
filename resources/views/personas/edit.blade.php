@extends('layouts.app')

@section('title', '| Create New Post')
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('personas.index')}}">Personas</a></li>
        <li class="breadcrumb-item active"><a href="">Editar</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <h1>Editar</h1>
                            <hr>
                                {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
                                <div class="form-group">
                                        {{ Form::label('title', 'Nombre') }}
                                        {{ Form::text('nombre', null, array('class' => 'form-control', 'required')) }}
                                        <br>
                                        {{ Form::label('title', 'Apellido') }}
                                        {{ Form::text('apellido', null, array('class' => 'form-control', 'required')) }}
                                        <br>
                                        @foreach ($query as $rw)
                                        <div class="form-group">
                                        <label>{{ $rw->tdc_texto}}</label>
                                        @php
                                        $rq = '';
                                        if ($rw->tdc_requerido == 1){
                                            $rq = 'required';
                                        }else{
                                            $rq = '';
                                        }
                                        @endphp
                                                <input type="text" name="dato_contacto[]" class="form-control" placeholder="{{ $rw->tdc_descripcion}}" {{$rq}}>
                                                <input type="hidden" name="id_dato_contacto[]" class="form-control" value="{{ $rw->id}}">
                                        </div>
                                        @endforeach
                                        <br>
                                        <div class="form-group">
                                                <label>Tipo de Persona</label>
                                                <select class="form-control form-control-sm" name="tipoPersona">
                                                    <option value="1">Clinete</option>
                                                    <option value="2">Proveedor</option>
                                                </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                                <label>Sexo</label>
                                                <select class="form-control form-control-sm" name="sexo">
                                                    <option value="1">Hombre</option>
                                                    <option value="2">Mujer</option>
                                                    <option value="3">No Indica</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label>Fecha Nacieminto</label>
                                                <input type="text" class="form-control" name="fechan" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                                <label>Dirección:</label>
                                                <textarea class="form-control h-150px" rows="2" name="direccion"></textarea>
                                        </div>


                                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

                                {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
@endsection

