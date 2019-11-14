@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                            <div class="col-md-8 col-md-offset-2">
                                    <h1>Registro Empresa</h1>
                                    <hr>

                                {{-- Using the Laravel HTML Form Collective to create our form --}}
                                    {{ Form::open(array('route' => 'empresa.store', 'enctype="multipart/form-data"')) }}

                                    <div class="form-group">
                                        {{ Form::label('title', 'Nombre Empresa') }}
                                        {{ Form::text('nombre_empresa', null, array('class' => 'form-control')) }}
                                        <br>
                                        <div class="form-group">
                                                <label>Imagen:</label>
                                                <input type="file" name="imagen" class="form-control-file">
                                        </div>
                                        @foreach ($query as $rw)
                                        <div class="form-group">
                                        <label>{{ $rw->tdc_texto}}</label>
                                                <input type="text" name="dato_contacto[]" class="form-control" placeholder="{{ $rw->tdc_texto}}">
                                                <input type="hidden" name="id_dato_contacto[]" class="form-control" value="{{ $rw->id}}">
                                        </div>
                                        @endforeach

                                        <div class="form-group">
                                                <label>Dirección:</label>
                                                <textarea class="form-control h-150px" rows="3" name="direccion"></textarea>
                                        </div>

                                        {{ Form::submit('Crear', array('class' => 'btn btn-success btn-lg btn-block')) }}
                                        {{ Form::close() }}
                                    </div>
                                    </div>

                    </div>
                </div>
            </div>
        </div>
@endsection


