@extends('layouts.app')

@section('title', '| Categorias registradas')
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
@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <div class="panel-title pull-left">
                                             <h3 class="m-0 text-primary">Lista de todos los Pedidos</h3>
                                         </div>
                                        <div class="panel-title pull-right">
                                            <a target="_blank" href="{{ URL::to('/crear_reporte/1') }}" class="btn mb-1 btn-flat btn-warning">Export PDF</a>
                                            <a href="{{ route('productos.index')}}" type="button" class="btn mb-1 btn-flat btn-outline-success">
                                                Seguir Comprando</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                    <table id="info-table" class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><div class="pull-center" >Factura</div></th>
                                                <th><div class="pull-center" >Producto</div></th>
                                                <th><div class="pull-center" >Cantidad</div></th>
                                                <th><div class="pull-center" >Precio</div></th>
                                                <th><div class="pull-center" >Estado</div></th>
                                                <th><div class="pull-center" >Fecha de Entrega</div></th>
                                                <th>Entregado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="bootstrap-modal">
                <!-- Modal -->
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Aprobar Pedido</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                            <label>Programar entrega o Entregar?</label>
                                            <select class="form-control form-control-sm" id="entrgar" name="entrgar">
                                                <option value="1">Entregar</option>
                                                <option value="2">Programar</option>
                                            </select>
                                    </div>
                                    <div class="form-group" id='div1' style="display:none;">
                                        <input type="hidden" id="FacturaID" >
                                        <input type="hidden" id="origen" >
                                            <label>Fecha A Entregar</label>
                                            <input type="text" class="form-control" name="fechaEntrega" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="aprobarP();" class="btn btn-primary">Actualizar</button>
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
@section('js_bajo_body')
<script>
$(document).on('change', '#entrgar', function(){
    var valor = $(this).val();
    if (valor == 1) {
        $('#div1').hide();
      }else {
        $('#div1').show();
      }

   });
        var table1 = $('#info-table').DataTable({
          processing:true,
          serverSide:true,
          responsive: true,
          "order": [ [0, 'desc'],
                     ],
          ajax: "{{route('all.fact')}}",
          columns:[
            {data:'id'},
            {data:'factura_id'},
            {data:'producto'},
            {data:'cantidad'},
            {data:'precio'},
            {"render": function (data, type, row) {
                if(row.estado == 1){ ////1 indica qestado
                return '<span class="label label-pill label-success">Aprobado</span>';
                }else if(row.estado ==3){
                 return '<span class="label label-pill label-warning">Pendiente</span>';

                }else if(row.estado ==2){
                    return '<span class="label label-pill label-danger">Rechazado</span>';
                }

           }},
            {data:'fechaaentrega'},
            {data:'fechaentrega'}
            ,
                {"render": function (data, type, row) {
                if(row.isadmin == 1){ ////1 indica es admin
                if(row.f_estado_entrega == 2){//si no esta entregado se puede aplicar acciones
                    return '<button type="button" id="ButtonDelete" onclick="aprobar(1,'+row.factura_id+')" data-toggle="modal" data-target="#basicModal" class="btn btn-warning  btn-md">'+
             '<span class="fa fa-check-circle-o"></span><span class="hidden-xs"> Aprobar</span></button> '+
             '<button type="button" id="ButtonDelete" onclick="actualizarEstado(2,'+row.factura_id+')" class="btn btn-danger  btn-md">'+
             '<span class="fa fa-ban"></span><span class="hidden-xs"> Rechzar</span></button> ';

            }else{
                return '<a href="{{url("perfil/show")}}/'+row.factura_id+'" type="button" id="ButtonVer" class="ver btn btn-success botonEditar btn-md">'+
             '<span class="fa fa-eye"></span><span class="hidden-xs"> Entregado</span></a>';
            }
                }else if(row.isadmin ==2){//es cleine
                 return '<span class="label label-pill">--</span>';

                }else {
                    return '<span class="label label-pill label-danger">No Autenticado</span>';
                }
            }},

          ]

        });$('select, input[type="search"]').css({
                    "background-color": "#f3f3f3",
                    "font-weight": "bold"
                });
//funcion para caturar el id en el modal
function aprobar(i,b){
    $('#FacturaID').val(b);
    $('#basicModal').modal('show');
    $('#origen').val(i);
}
//ejecutar aprobacion
function aprobarP(){
   var Numerofactura= $('#FacturaID').val();
   var fechaEntrega= $('#datepicker-autoclose').val();
   var entregado= $('#entrgar').val();

   // $('#origen').val();

    var url= "{{ route('aprobar.pedido')}}";
        //aprobar
        $.ajax({//4
            url : url,
            type : "POST",
            data: {
              '_token': $('input[name=_token]').val(),
              'Numerofactura':Numerofactura,
              'f_estado_entrega':entregado,
              'f_fecha_a_entregar':fechaEntrega,
              'tb_id':'actualizar'
            } ,
            success: function(data){ //5
            //console.log(data);
            $('#basicModal').modal('hide');
            table1.ajax.reload();;
            //window.location.href='{{ route("productos.index")}}';
            //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
            //Bottom Full Width, Top Center, Bottom Center
            alerttoastr('success','Se ha procesado la solicitud sastifactoriamente!', 'Genial!', 'top-right');
            }, //5
            error : function(data){ //7
            console.log(data);

              //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
              //Bottom Full Width, Top Center, Bottom Center
              alerttoastr('error','Algo ha salido mal!', 'Oops!', 'bottom-left');
            } //7
          }); //4


}
//ejecutamos pedidos
function actualizarEstado(i,b){
    //validamos si es rechazar o aprobar pedido
    var url='';
 if(i==2){
        url= "{{ route('rechazar.pedido')}}";
        //se rechaza
        $.ajax({//4
            url : url,
            type : "POST",
            data: {
              '_token': $('input[name=_token]').val(),
              'Numerofactura':b,
              'tb_id':'actualizar'
            } ,
            success: function(data){ //5
            //console.log(data);
            table1.ajax.reload();;
            //window.location.href='{{ route("productos.index")}}';
            //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
            //Bottom Full Width, Top Center, Bottom Center
            alerttoastr('success','Se ha procesado la solicitud sastifactoriamente!', 'Genial!', 'top-right');
            }, //5
            error : function(data){ //7
            console.log(data);

              //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
              //Bottom Full Width, Top Center, Bottom Center
              alerttoastr('error','Algo ha salido mal!', 'Oops!', 'bottom-left');
            } //7
          }); //4

    }


}
            </script>
@endsection
