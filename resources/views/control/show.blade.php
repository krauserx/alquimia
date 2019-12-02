@extends('layouts.app')

@section('title', '| Ver Persona')
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('empresa.index')}}">Empresa</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $post->p_nombre }}</h1>
                        <hr>
                        <p class="lead">{{ $post->p_nombre }} </p>
                        <hr>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['personas.destroy', $post->id] ]) !!}
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        @can('Edit Post')
                        <a href="{{ route('personas.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
                        @endcan
                        @can('Delete Post')
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        @endcan
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js_bajo_body')

@endsection
