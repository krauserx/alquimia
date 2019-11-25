@extends('layouts.app')

@section('title', '| Ver Producto')
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">Productos</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="text-center">
                            <img src="{{ asset('/images/productos')}}/{{$post->p_url_img}}" class="rounded-circle" alt="IMG ALQUIMIA Productos GYM" style="width: 150px;">

                        <h1>{{ $post->p_nombre }}</h1>
                        <hr>
                        <p class="lead">{{ $post->p_codigo }} <br> {{ $post->p_descripcion }} </p>
                        <hr>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['productos.destroy', $post->id] ]) !!}
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        @can('Edit Post')
                        <a href="{{ route('productos.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
                        @endcan
                        @can('Delete Post')
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        @endcan
                        {!! Form::close() !!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js_bajo_body')

@endsection
