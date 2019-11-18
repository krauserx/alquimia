@extends('layouts.app')

@section('title', '| Create New Post')
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
        <li class="breadcrumb-item active"><a href="">Editar</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <h1>Editar</h1>
                            <hr>
                                {{ Form::model($post, array('route' => array('personas.update', $post->id), 'method' => 'PUT')) }}
                                <div class="form-group">
                                        {{ Form::label('title', 'Nombre') }}
                                        {{ Form::text('p_nombre', null, array('class' => 'form-control', 'required')) }}
                                        <br>
                                        {{ Form::label('title', 'Apellido') }}
                                        {{ Form::text('p_apellido', null, array('class' => 'form-control', 'required')) }}
                                        <br>
                                        @foreach ($infocontacto as $rw)
                                        <div class="form-group">
                                            @php
                                            $texto ='';
                                            if($rw['tipo_dato_id']==1){
                                                $texto ='Celular';
                                            }elseif($rw['tipo_dato_id']==2){
                                                $texto ='Correo';
                                            }else{
                                                $texto ='Identeficación';
                                            }
                                            @endphp
                                        <label>{{ $texto}}</label>
                                                <input type="text" name="dato_contacto[]" class="form-control" value="{{ $rw['c_info']}}"  required>
                                                <input type="hidden" name="id_dato_contacto[]" class="form-control" value="{{ $rw['tipo_dato_id']}}">
                                                <input type="hidden" name="id_contacto[]" class="form-control" value="{{ $rw['id']}}">
                                        </div>
                                        @endforeach
                                        <br>
                                        <div class="form-group">
                                                <label>Tipo de Persona</label>
                                                <select class="form-control form-control-sm" name="p_tipo_persona">
                                                    @php
                                                    if($post->p_tipo_persona == 1 ){
                                                       echo '
                                                       <option value="1" selected >Clinete</option>
                                                    <option value="2" >Proveedor</option>';
                                                    }else{
                                                        echo '
                                                       <option value="1"  >Clinete</option>
                                                    <option value="2" selected>Proveedor</option>';
                                                    }
                                                    @endphp
                                                </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                                <label>Sexo</label>
                                                <select class="form-control form-control-sm" name="p_sexo" >
                                                        @php
                                                        if($post->p_sexo == 1 ){
                                                           echo '
                                                        <option value="1" selected >Hombre</option>
                                                        <option value="2" >Mujer</option>
                                                        <option value="3">No Indica</option>';
                                                        }elseif($post->p_sexo == 2){
                                                            echo '
                                                        <option value="1"  >Hombre</option>
                                                        <option value="2" selected>Mujer</option>
                                                        <option value="3">No Indica</option>';
                                                        }else{
                                                            echo '
                                                        <option value="1"  >Hombre</option>
                                                        <option value="2" >Mujer</option>
                                                        <option value="3" selected>No Indica</option>';
                                                        }
                                                        @endphp
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label>Fecha Nacieminto</label>
                                        <input type="text" value="{{ date("d/m/Y", strtotime($post->p_fecha_nacimeinto))}}" class="form-control" name="p_fecha_nacimeinto" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off">
                                        </div>
                                        {{ Form::label('title', 'Direccion') }}
                                        {{ Form::textarea('p_direccion', null, array('class' => 'form-control', 'rows'=>'2')) }}


                                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

                                {{ Form::close() }}

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
