@extends('layouts.app')

@section('title', '| Crear Empresa')
@section('css')
  <link href="{{ asset('plugins/dropzone/css/dropzone.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet" />
  <!-- Custom Stylesheet -->
  <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
  <!-- Page plugins css -->
    <link href="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{ asset('plugins/jquery-asColorPicker-master/css/asColorPicker.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <!-- Daterange picker plugins css public\plugins\bootstrap\4.0.0_alpha.6_bootstrap.min.css -->
    <link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('menu_navegacion')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('personas.index')}}">Personas</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="col-md-8 col-md-offset-2">
                                    <h1>Registro Persona</h1>
                                    <hr>

                                {{-- Using the Laravel HTML Form Collective to create our form --}}
                                    {{ Form::open(array('route' => 'personas.store', 'enctype="multipart/form-data"')) }}

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

<script src="{{ asset('plugins/moment/moment.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
<script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
<script src="{{ asset('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('js/plugins-init/form-pickers-init.js')}}"></script>
@endsection


