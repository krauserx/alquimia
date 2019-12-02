@extends('layouts.app')

@section('title', '| Personas registradas')

@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <div class="panel-title pull-left">
                                             <h3 class="m-0 text-primary">Productos en el Carrito</h3>
                                         </div>
                                        <div class="panel-title pull-right">
                                            <a href="{{ route('productos.index')}}" type="button" class="btn mb-1 btn-flat btn-outline-success">
                                                Seguir agregando</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <input type="hidden" id="search" value="">{{--imput para q cargue el registro ajax la tbala detalles facturas--}}



                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="datos_factura">

            </div>
@endsection
@section('js_bajo_body')
<script>
      //detalles de la facturacion
 detalles_facturacion();
 $(document).on('keyup', '#search', function(){
  var query = $(this).val();

  detalles_facturacion(query);
 });
//cargamos la tabla detalles de la facturacion
function detalles_facturacion(query = '')
{
    var origen = 'cliente';
    $.LoadingOverlay("show");
 $.ajax({
  url:"{{ route('all.productos_facturas') }}",
  method:'GET',
  data:{query:query, origen: origen},
  dataType:'json',
  success:function(data)
  {
    $.LoadingOverlay("hide");
    $('#datos_factura').html("");
   // console.log(data.detalles);
   $('#datos_factura').html(data.detalles);
   $('#total_records').text(data.total_data);

 }
});
}
//sumar cantidad
function sumarcantidad(i){
var cantidad = $('#cantidad_factura_'+i).val();
if ( cantidad=='' || cantidad > 0) {
  var suma = parseFloat(cantidad) + 1;
  $('#cantidad_factura_'+i).val(suma);
}

}
function restarcantidad(i){
  var cantidad = $('#cantidad_factura_'+i).val();
  if (cantidad>0) {
    var suma = cantidad - 1;
    $('#cantidad_factura_'+i).val(suma);
  }else {
    $('#cantidad_factura_'+i).val('1');
  }

}
//funcion para actualizar bd con los input de la dataTable lista_producto_en_factura
function actualizar(i){
  //i es el id de la tabla detalles
    var cantidad = $('#cantidad_factura_'+i).val();
    //comprobar que el valor escrito, son solo números.

        if(isNaN(cantidad) || cantidad=== '') {
          swal({
                title: 'Oops!',
                text: "Cantidad solo debe contener números",
                type: 'error',
                confirmButtonText: 'OK!'
              });
              return false;
          }
          url = "{{ route('detalle.proceder')}}";
          $.ajax({//4
            url : url,
            type : "POST",
            data: {
              '_token': $('input[name=_token]').val(),
              'id_rw': i,
              'cantidad_factura':cantidad,
              'tb_id':'actualizar'
            } ,
            success: function(data){ //5
            console.log(data);

            detalles_facturacion('');
            //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
            //Bottom Full Width, Top Center, Bottom Center
            alerttoastr('success','Se ha procesado la solicitud sastifactoriamente!', 'Genial!', 'bottom-left');
            }, //5
            error : function(data){ //7
            console.log(data);

              //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
              //Bottom Full Width, Top Center, Bottom Center
              alerttoastr('error','Algo ha salido mal!', 'Oops!', 'bottom-left');
            } //7
          }); //4
}
///ejecutamos pedidos
function ejecutarPedido(){
  //i es el id de la tabla detalles
    var factid = $('#Numerofactura').val();
    //comprobar que el valor escrito, son solo números.
          url = "{{ route('realizar.pedido')}}";
          $.ajax({//4
            url : url,
            type : "POST",
            data: {
              '_token': $('input[name=_token]').val(),
              'Numerofactura':factid,
              'tb_id':'actualizar'
            } ,
            success: function(data){ //5
            //console.log(data);
            //window.location.href='{{ route("productos.index")}}';
            detalles_facturacion('');
            //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
            //Bottom Full Width, Top Center, Bottom Center
            alerttoastr('success','Se ha procesado la solicitud sastifactoriamente!', 'Genial!', 'top-right');
            }, //5
            error : function(data){ //7
           // console.log(data);

              //success, warning, info, warning, error, position: right, left, top, bottom, Top Full Width
              //Bottom Full Width, Top Center, Bottom Center
              alerttoastr('error','Algo ha salido mal!', 'Oops!', 'bottom-left');
            } //7
          }); //4
}
{{--funcion eliminar registro--}}
function deletedForm(id) {

var csrf_token = $('meta[name="csrf-token"]').attr('content');
$('input[name="_method"]').val('DELETE');

swal({
  title: "Seguro?",
  text: "Si da click 'OK', se eliminara el registro! " ,
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Ok, eliminar!",
  cancelButtonText: "No, cancelar!"
}).then(function(result) {
  if (result.value) {
    $.ajax({
url: "{{ url('carro')}}"+"/"+id,
type: "POST",
data: {
  '_method' : 'delete',
  '_token' : csrf_token
},
success : function(data){
    detalles_facturacion('');
  swal({
        title: 'Genail!',
        text: 'Se ha aliminado el registro correctamente!',
        type: 'success',
        timer:5000,
        confirmButtonText: 'OK!'
      });
},
error : function(data){
  swal({
        title: 'Oops...!',
        text: data.message,
        type: 'error',
        confirmButtonText: 'OK!'
      });
}
});

    } else {
      swal({
            title: 'Genial!',
            text: 'No se ha aliminado el registro!',
            type: 'success',
            timer:5000,
            confirmButtonText: 'OK!'
          });

    }

});

}
            </script>
@endsection
