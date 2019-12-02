<?php

namespace App\Http\Controllers;

use App\FacturaDetalle;
use Illuminate\Http\Request;
use App\Factura;
use Auth;
use DB;
use Yajra\DataTables\DataTables;

class FacturaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          //obtenemos la info
          return view('pedidos.index');
    }
     //obtener regsitro total de la bd
     public function Registro_Total_Pedidos()
     {
         //validamos si hay abierto una factura
         $datoId = Auth::user()->id;
         $datos =DB::select('SELECT * FROM
         facturas
          INNER JOIN factura_detalles ON factura_detalles.factura_id = facturas.id
          WHERE
          factura_detalles.deleted_at IS NULL AND
          facturas.f_estado =1 AND
         facturas.persona_id =' . $datoId);
         $obj = array();


           foreach ($datos as $key) {
            $fechaaEntr = '';
            $fecha = '';
            $rr = $key->f_fecha_a_entregar;
            $hh = $key->f_fecha_entregado;
            if(isset($rr)){
                $fechaaEntr = date("d/m/Y", strtotime($key->f_fecha_a_entregar));
            }else{
                $fechaaEntr = '';
            }
            if( isset($hh)){
                $fecha = date("d/m/Y", strtotime($key->f_fecha_entregado));
            }else{
                $fecha = '';
            }
            $obj[] = [
                'id'=>$key->id,
                'producto'=>nombre_producto($key->producto_id),
                'cantidad'=>$key->fd_cantidad,
                'precio' =>'¢ '.$key->fd_precio_venta,
                'estado'=>$key->f_pedido_aprobado,
                'fechaaentrega'=>$fechaaEntr,
                'fechaentrega'=> $fecha
              ];

           }
           return Datatables::of($obj)->make(true);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacturaDetalle  $facturaDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(FacturaDetalle $facturaDetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacturaDetalle  $facturaDetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturaDetalle $facturaDetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacturaDetalle  $facturaDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacturaDetalle $facturaDetalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacturaDetalle  $facturaDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacturaDetalle $facturaDetalle)
    {
        //
    }
}
