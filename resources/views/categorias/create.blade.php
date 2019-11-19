@extends('layouts.app')

@section('title', '| Crear Empresa')
@section('css')
  <link href="{{ asset('plugins/dropzone/css/dropzone.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet" />
@endsection
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('personas.index')}}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="col-md-8 col-md-offset-2">
                                    <h1>Registro Categoria</h1>
                                    <hr>

                                {{-- Using the Laravel HTML Form Collective to create our form --}}
                                    {{ Form::open(array('route' => 'categorias.store', 'enctype="multipart/form-data"')) }}

                                    <div class="form-group">
                                        {{ Form::label('title', 'Categoria') }}
                                        {{ Form::text('c_texto', null, array('class' => 'form-control', 'required')) }}
                                        <br>
                                        <div class="form-group">
                                                <label>Descripción:</label>
                                                <textarea class="form-control h-150px" rows="2" name="c_descripcion"></textarea>
                                        </div>
                                        <div class="form-group">
                                                <label>Imagen:</label>
                                                <input id="input-b1" name="c_url_img" type="file" class="file" data-browse-on-zone-click="true">

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
@section('js')
<script src="{{ asset('plugins/dropzone/js/dropzone.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
@endsection


