@extends('layouts.app')

@section('title', '| Mi Perfil')
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('perfil.index')}}">Mi Perfil</a></li>
    </ol>
@endsection
@section('content')

        <div class="row m-b-30">

                                    <div class="col-lg-6">
                                        <div class="card border-warning">
                                            <div class="card-header">Mi Perfil</div>
                                            <div class="card-body">
                                            <h5 class="card-title">Nombre: {{$query->name}}</h5>
                                                <p class="card-text">
                                                        <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">Tipo de Identificación:
                                                                    <code>
                                                                        @php
                                                                        if($query->tipo_identificacion == 1){
                                                                           echo 'Cédula';
                                                                        }else if($query->tipo_identificacion == 2){
                                                                           echo 'DIMEX';
                                                                        }else{
                                                                            echo 'Pasaporte';
                                                                        }
                                                                        @endphp
                                                                    </code>
                                                                    </li>
                                                                <li class="list-group-item">Identificación:
                                                                    <code>{{$query->identificacion}}</code></li>
                                                                <li class="list-group-item">Email: <code>{{$query->email}}</code></li>
                                                                <li class="list-group-item">Tipo de Telefono:
                                                                        <code>
                                                                        @php
                                                                        if($query->tipo_telefono == 1){
                                                                           echo 'Celular';
                                                                        }else if($query->tipo_telefono == 2){
                                                                           echo 'Fijo Oficina';
                                                                        }else{
                                                                            echo 'Fijo Casa';
                                                                        }
                                                                        @endphp
                                                                    </code></li>
                                                                <li class="list-group-item">Telefono: <code>{{$query->telefono}}</code></li>
                                                                <li class="list-group-item">Registrado: <code>{{$query->created_at}}</li>
                                                              </ul>
                                                    </p>
                                                    <a href="{{ route('perfil.edit', $query->id) }}" class="btn btn-info" role="button">Edit</a>
                                            </div>
                                            <div class="card-footer"><small>Ultima modificación: <code>{{$query->updated_at}}</code></small>
                                            </div>
                                        </div>
                                    </div>

        </div>
@endsection

