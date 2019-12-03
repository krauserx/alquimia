@extends('layouts.app')

@section('title', '| Ver Persona')
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pedidos.index')}}">Pedidos</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1>Bitacora entrega</h1>
                        <hr>
                        @foreach ($post as $item)

                        <p class="lead">-{{ $item->detalle }} </p>
                        @endforeach
                        <hr>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js_bajo_body')

@endsection
