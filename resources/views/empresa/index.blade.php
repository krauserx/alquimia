@extends('layouts.app')
@section('title')
  Dash --Sistema ALQUIMIA
@endsection

@section('content')
<div class="row">
        @if($query->count() > 0)
        @foreach ($query as $rw)
        <div class="col-md-4 col-xs-8 col-sm-8">
            <div class="card">
                    <div class="card-body">
                            <div class="text-center">
                                <img alt="" class="rounded-circle mt-4" src="{{ asset('logos/logo_715640880582408144375229E+16.jpeg')}}" style="width: 45%;">
                            <h4 class="card-widget__title text-dark mt-3">{{ $rw->nombre_empresa}}</h4>
                            <p class="text-muted">{{$rw->direccion_empresa}}</p>
                                <a class="btn gradient-4 btn-lg border-0 btn-rounded px-5" href="javascript:void()">Pagina</a>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-transparent">
                            <div class="row">
                                <div class="col-4 border-right-1 pt-3">
                                    <a class="text-center d-block text-muted" href="javascript:void()">
                                        <i class="fa fa-star gradient-1-text" aria-hidden="true"></i>
                                        <p class="">Star</p>
                                    </a>
                                </div>
                                <div class="col-4 border-right-1 pt-3"><a class="text-center d-block text-muted" href="javascript:void()">
                                    <i class="fa fa-heart gradient-3-text"></i>
                                        <p class="">Like</p>
                                    </a>
                                </div>
                                <div class="col-4 pt-3"><a class="text-center d-block text-muted" href="javascript:void()">
                                    <i class="fa fa-envelope gradient-4-text"></i>
                                        <p class="">Email</p>
                                    </a>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col">
                <div class="card">
                    <div class="card-body">
                            <a href="{{ route('empresa.create')}}" type="button" class="btn mb-1 btn-flat btn-success">Registrar</a>
                    </div>
                </div>
            </div>

        @endif
    </div>

@endsection
