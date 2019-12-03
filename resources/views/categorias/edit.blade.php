@extends('layouts.app')

@section('title', '| Editar Categoria')
@section('css')
  <link href="{{ asset('plugins/dropzone/css/dropzone.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet" />
@endsection
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categorias.index')}}">Categorias</a></li>
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
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{-- Using the Laravel HTML Form Collective to create our form --}}
                                {{ Form::model($post, array('route' => array('categorias.update', $post->id), 'method' => 'PUT', 'enctype="multipart/form-data"')) }}

                                    <div class="form-group">
                                        {{ Form::label('title', 'Categoria') }}
                                        {{ Form::text('c_texto', null, array('class' => 'form-control', 'required')) }}
                                        <br>
                                        {{ Form::label('title', 'Descripción') }}
                                        {{ Form::textarea('c_descripcion', null, array('class' => 'form-control', 'rows'=>'2')) }}
                                        <div class="form-group">
                                                <label>Imagen Actual:</label>
                                                <img src="{{ asset('/images/categorias')}}/{{$post->c_url_img}}" class="rounded-circle" alt="{{ $post->c_texto }}" style="width: 150px;">
                                                <input id="input-b1" name="c_url_img" type="file"  class="file" data-browse-on-zone-click="true">

                                        </div>

                                        {{ Form::submit('Actualizar', array('class' => 'btn btn-success btn-lg btn-block')) }}
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


