<?php
use App\FacturaDetalle;
function validar_existe_producto_factura($factura_id, $productoId){
    $exite_producto_fact = FacturaDetalle::where('factura_id', '=', $factura_id)
                ->where('producto_id', '=', $productoId)->first();
                //validamos si esta vacio el objecto
                  if ($exite_producto_fact) { //validamos si el ojecto no esta vacio
                    $rcount = $exite_producto_fact->count();
                    return $exite_producto_fact->fd_cantidad;
                  }else{
                      return 0;
                  }
}
//validamos si hay factura abierta
//validar si la factura en resume ya esta inciada
//numeor factura por id de grupo factura _x_usuario_textofactura
function check_numerofactura_pendiente($id_grupo_factura, $culumna, $idUsuario)
{
    $data =  DB::table('facturas')
        ->select('id as id_factura')
        ->where('textofactura_id', '=', $id_grupo_factura)
        ->where($culumna, '=', $idUsuario)
        ->where('f_estado', '=', '2')
        ->get();
    $id_factura = 0;
    foreach ($data as $key) {
        $id_factura = $key->id_factura;
    }
    return $id_factura;
}
//obtenemos el numero de factura actual segun el perfil, ambiente
//devulve la el ultmio registro
function ultimo_numero_factura()
{
    $data =  DB::table('facturas')
        ->select('f_numero as num')->get();
    if ($data->count()) {
        $num = 0;
        foreach ($data as $key) {
            $num = $key->num;
        }
        return $num;
    } else {
        return 0;
    }
}
//creacion de sesion de varibale numeor de factura
function Set_Factura_Session($IdFacturaPerfil)
{
    session(['NumeroFactura' => $IdFacturaPerfil]);
    //return response()->json('ok');
}

function Un_Set_Factura_session()
{
    session()->forget('NumeroFactura');
    //return response()->json('Cerrada');
}
