@extends('layouts.app')

@section('title', '| Editar Producto')
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
        <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">Productos</a></li>
        <li class="breadcrumb-item active"><a href="">Crear</a></li>
    </ol>
@endsection
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="col-md-8 col-md-offset-2">
                                    <h1>Editar Producto</h1>
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
                                {{ Form::model($post, array('route' => array('productos.update', $post->id), 'method' => 'PUT', 'enctype="multipart/form-data"')) }}

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                              {{ Form::label('title', 'Codigo') }}
                                              {{ Form::text('p_codigo', null, array('class' => 'form-control', 'id'=>'p_codigo', 'required')) }}
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('title', 'Nombre') }}
                                                {{ Form::text('p_nombre', null, array('class' => 'form-control', 'required')) }}
                                            </div>
                                        </div>
                                        {{ Form::label('title', 'Nombre') }}
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Categoria</label>
                                                    <select class="form-control form-control-sm" name="categoria_id">
                                                            @foreach ($query as $rw)
                                                            @php
                                                            $sel='';
                                                            if($post->categoria_id == $rw->id){
                                                                $sel ='selected';
                                                            }else{
                                                                $sel ='';
                                                            }
                                                                echo '<option value="'.$rw->id.'" '.$sel.'>'.$rw->c_texto.'</option>';
                                                            @endphp
                                                            @endforeach
                                                              </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tipo de Producto</label>
                                                    <select class="form-control form-control-sm" id="tipoProducto"  name="tipoProducto">
                                                        @php
                                                            if($post->p_tipo == 1  ){
                                                                echo '
                                                                <option value="1" selected>Servico</option>
                                                                <option value="2">Mercaderia</option>';
                                                            }else {
                                                                echo '
                                                                <option value="1" >Servico</option>
                                                                <option value="2" selected>Mercaderia</option>';
                                                            }
                                                        @endphp

                                                        </select>
                                                </div>
                                            </div>
                                            @php
                                            if($post->p_tipo == 2  ){
                                            @endphp
                                            <div class="form-row">
                                                    <div class="form-group col-md-4" id="div1">
                                                        {{ Form::label('title', 'Precio Costo') }}
                                                        {{ Form::text('p_precio_costo', null, array('class' => 'form-control', 'id'=>'p_precio_costo')) }}

                                                    </div>
                                                    <div class="form-group col-md-4" id="div2">
                                                            {{ Form::label('title', 'Precio Venta') }}
                                                            {{ Form::text('p_precio_venta', null, array('class' => 'form-control', 'required')) }}
                                                    </div>
                                                    <div class="form-group col-md-4" id="div3">
                                                            {{ Form::label('title', 'Cantidad') }}
                                                            {{ Form::text('p_catidad', null, array('class' => 'form-control', 'id'=>'p_catidad')) }}
                                                        </div>
                                                </div>
                                                @php
                                            }else{
                                            @endphp
                                            <div class="form-row">
                                                    <div class="form-group col-md-4" id="div1" style="display: none;">
                                                        {{ Form::label('title', 'Precio Costo') }}
                                                        {{ Form::text('p_precio_costo', null, array('class' => 'form-control', 'id'=>'p_precio_costo')) }}

                                                    </div>
                                                    <div class="form-group col-md-12" id="div2">
                                                            {{ Form::label('title', 'Precio Venta') }}
                                                            {{ Form::text('p_precio_venta', null, array('class' => 'form-control', 'required')) }}
                                                    </div>
                                                    <div class="form-group col-md-4" id="div3" style="display: none;">
                                                            {{ Form::label('title', 'Cantidad') }}
                                                            {{ Form::text('p_catidad', null, array('class' => 'form-control', 'id'=>'p_catidad')) }}
                                                        </div>
                                                </div>
                                                @php
                                            }
                                            @endphp

                                                {{ Form::label('title', 'Descripción') }}
                                                {{ Form::textarea('p_descripcion', null, array('class' => 'form-control', 'rows'=>'2')) }}

                                                <div class="form-group">
                                                        <label>Imagen Actual:</label>
                                                        <img src="{{ asset('/images/productos')}}/{{$post->p_url_img}}" class="rounded-circle" alt="IMG ALQUIMIA GYM" style="width: 150px;">
                                                </div>

                                            <div class="form-group">
                                                <label>Imagen:</label>
                                                    <input id="input-b1" name="p_url_img" type="file" class="file" data-browse-on-zone-click="true">

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
@section('js_bajo_body')
<script>
$(document).on('change', '#tipoProducto', function(){
    var valor = $(this).val();
    if (valor == 1) {
        $('#div1').removeClass("form-group col-md-4");
        $('#div1').addClass("form-group col-md-6");
        //div 2
        $('#div2').removeClass("form-group col-md-4");
        $('#div2').addClass("form-group col-md-12");
        $('#p_catidad').val('');
        $('#div3').hide();
        $('#div1').hide();
        $('#p_catidad').prop('required', false);
        $('#p_precio_costo').prop('required', false);
      }else {
       $('#div1').removeClass("form-group col-md-6");
        $('#div1').addClass("form-group col-md-4");
        //div 2
        $('#div2').removeClass("form-group col-md-12");
        $('#div2').addClass("form-group col-md-4");
        $('#div1').show();
        $('#div3').show();
        $('#p_catidad').prop('required', true);
      }

   });
//validar si exite codigo del producto
$(document).on('change', '#p_codigo', function(){
 var query = $(this).val();
 $.ajax({
  url:"{{ route('validarcodigoproducto.ejecutar') }}",
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
    if (data.error) {
      swal({
            title: 'Oops!',
            text: data.error,
            type: 'error',
            confirmButtonText: 'OK!'
          });

     $('#labcodigo').addClass( "text-danger" );
     $('#p_codigo').removeClass( "form-control" );
     $('#p_codigo').addClass( "form-control is-invalid" );
     $('#p_codigo').val('');
   }else {
     $('#p_codigo').removeClass( "form-control is-invalid" );
     $('#labcodigo').removeClass( "text-danger" );
     $('#labcodigo').addClass( "text-success" );
     $('#p_codigo').addClass( "form-control is-valid" );
   }

  }
 })

});
   </script>
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


