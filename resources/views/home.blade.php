@extends('layouts.app')
@section('title')
  Dash --Sistema ALQUIMIA
@endsection

@section('content')
<div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong>{{ session('status') }}!</strong> You are logged in!.</div>
                    @endif
                    <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button> <strong>Bienvenid@!</strong> has ingresado sastifactoriamente!</div>

                </div>
            </div>
        </div>
    </div>
    @if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            icon: "{!! Session::get('sweet_alert.type') !!}",
            buttons: "{!! Session::get('sweet_alert.buttons') !!}",

            // more options
        });
    </script>
@endif
@endsection
