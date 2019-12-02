@extends('layouts.app')

@section('title', '| Crear Control')
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
        <li class="breadcrumb-item"><a href="{{ route('control.index')}}">Control</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="col-md-8 col-md-offset-2">
                                    <h1>Registro COntrol Clientes</h1>
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
                                    {{ Form::open(array('route' => 'control.store', 'enctype="multipart/form-data"')) }}

                                    <div class="form-group">
                                            <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Categoria</label>
                                                        <select class="form-control form-control-sm" name="persona_id">
                                                                @foreach ($query as $rw)
                                                                @php
                                                                    echo '<option value="'.$rw->id.'">'.$rw->p_nombre.' '.$rw->p_apellido.'</option>';
                                                                @endphp
                                                                @endforeach
                                                                  </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Tipo de Registro</label>
                                                        <select class="form-control form-control-sm" id="c_tipo"  name="c_tipo">
                                                                <option value="1">Datos de Ingreso</option>
                                                                <option value="2">Control</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label>Altura</label>
                                                            <input type="text" id="c_altura" {{old('c_altura')}}  name="c_altura" class="form-control" required >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Peso</label>
                                                            <input type="text"   name="c_peso" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-4" id="div3">
                                                                <label>Porcentaje Grasa</label>
                                                                <input type="text" id="c_procentaje_grasa" name="c_procentaje_grasa" class="form-control" required>
                                                            </div>
                                                    </div>
                                                    <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Grasa Viceral</label>
                                                                <input type="text" id="c_grasa_viceral"  name="c_grasa_viceral" class="form-control" required >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Cintura</label>
                                                                <input type="text"   name="c_cintura" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-4" id="div3">
                                                                    <label>Pecho</label>
                                                                    <input type="text" id="c_pecho" name="c_pecho" class="form-control" required>
                                                                </div>
                                                        </div>
                                                        <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Cadera</label>
                                                                    <input type="text" id="c_cadera"  name="c_cadera" class="form-control" required >
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Brazo</label>
                                                                    <input type="text"   name="c_brazo" class="form-control" required>
                                                                </div>
                                                                <div class="form-group col-md-4" id="div3">
                                                                        <label>IMC</label>
                                                                        <input type="text" id="c_imc" name="c_imc" class="form-control" required>
                                                                    </div>
                                                            </div>

                                        <div class="form-group">
                                                <label>Nota:</label>
                                                <textarea class="form-control h-150px" rows="2" name="c_nota"></textarea>
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


