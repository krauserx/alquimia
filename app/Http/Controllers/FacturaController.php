<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Auth;
use App\FacturaDetalle;
use App\Producto;

class FacturaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //obtenemos la info
         return view('carro.index');
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
        //array vacio para mensajes
        $resp = [
            'tipo'=>'',
            'mns'=>'',
            'factura'=>''
        ];
        Un_Set_Factura_session();
        //variables
            $usuarioId = 0; $clienteId = 0; $textoFactura = 0; $condicionVenta = 0;
            $diasCredito = 0; $estadoPedido = 0; $estadoEntrega = 0; $fechaEntrega = '';
            $fechaAEntregar = NULL;
            $tipoVenta = $request['tipoVenta'];
            $columnaAValidar = '';
            $datoId = '';
            //tabla detalles de la factura
            $cantidad = 0;
            $productoId = $request['producto_id'];
            //buscamos info del producto
            $productos = Producto::findOrFail($productoId); //Find post of id = $id
            $costo = 0;
            $precio = 0;
            if($productos->p_precio_costo !=''){
                $costo = $productos->p_precio_costo;
            }else{
                    $costo = '0.00';
                }
                $precio = $productos->p_precio_venta;
            if($tipoVenta == 1){//pos venta hay dos modo de facturar, 1 por venta directa 2 pedidos por usuarios(cliente)
                //Validating title and body field
             $this->validate($request, [
            'persona_id'=>'required',
            'textofactura_id' =>'required',
            'condicion_id'=>'required',
            'f_estado_entrega'=>'required',
            'f_fecha_a_entregar'=>'required'
            ]);
                $usuarioId =Auth::user()->id;
                $clienteId = $request['clienteId'];
                $textoFactura = $request['textofactura_id'];
                $condicionVenta = $request['condicion_id'];
                $diasCredito = $request['fd_dias_credito'];
                $estadoPedido = 1;
                $estadoEntrega = $request['f_estado_entrega'];
                $fechaAEntregar = $request['f_fecha_a_entregar'];
                if(date('Y-m-d', strtotime($fechaAEntregar)) == date('Y-m-d')){
                    $fechaEntrega = date('Y-m-d');
                }elseif(date('Y-m-d', strtotime($fechaAEntregar)) > date('Y-m-d')){
                    $fechaEntrega = NULL;
                }
                ///
                $columnaAValidar = 'usario_id';//como es carro pos validamos el id del usurio vendiendo
               $datoId = $usuarioId; //pasamos el id del usaurio como vendedor
               //tabla detalles de factira
               $cantidad =$request['cantidad'];
               $precio = $request['precio_venta'];
            }elseif($tipoVenta == 2){//pedidos en lineas
                $usuarioId = 1;
                $clienteId = Auth::user()->id;
                $textoFactura = 1;
                $condicionVenta = 2;
                $diasCredito = 0;
                $estadoPedido = 3;
                $estadoEntrega = 2;
                $fechaAEntregar = NULL;
                $fechaEntrega = NULL;
                $columnaAValidar = 'persona_id';//como es pedido el id del usurio que ingreso
                $datoId = $clienteId; //pasamos el id del usaurio que ingreso que va a la columna persona
                //tabla detalles de facturas
                $cantidad = 1;
            }
            //validamos si hay abierto una factura
            $idFacturaActual = check_numerofactura_pendiente($textoFactura, $columnaAValidar, $datoId );
            //llenamos los datos par aregistrar
            if($idFacturaActual > 0){ //si el dato es mayor a cero devuelve el id de la factura
                $factura_id =0;
                $detalle_id=0;
                //buscamos si exite el producto en la factura actual
                $val = validar_existe_producto_factura($idFacturaActual, $productoId);
                  if($val >0){//si es mayor a 0(cero) se actualiza cantidad
                    $buscarDtalleFactId = FacturaDetalle::where('factura_id',$idFacturaActual)
                    ->where('producto_id', $productoId)
                    ->get();
                    //recorremos resultados
                    foreach ($buscarDtalleFactId as $key) {
                        $factura_id  = $key->factura_id;
                        $detalle_id = $key->id;
                    }
                    Set_Factura_Session($factura_id);//set una variable de sesion el numero
                    $nuevaCantidad = validar_existe_producto_factura($factura_id, $productoId) +$cantidad;
                  //encontramos el producto para actualizar
                  $facturaDetallesup = FacturaDetalle::findOrFail($detalle_id);
                  $facturaDetallesup->fd_cantidad = $nuevaCantidad;
                  $facturaDetallesup->save();
                }else{//si es 0(cero) no se encuentra el producto en la factura actual
                    //registramos nueva linea
                    //array para la tabla detalles de factura
                    $datosdetalle = [
                        'factura_id'=>$idFacturaActual,
                        'producto_id'=>$productoId,
                        'fd_cantidad'=>$cantidad,
                        'fd_precio_costo'=>$costo,
                        'fd_precio_venta'=>$precio,
                        //'fd_iva', agregar iva a producto si desean aplicar impuestos, el campo ya eta en esta tbl
                        //'fd_descuento',
                        //'fd_nota'
                    ];
                    $facturaDetalles = FacturaDetalle::create($datosdetalle);
                }
                //enviamos un array con los mensajes
                $resp = [
                    'tipo'=>'success',
                    'mns'=>'Producto se ha agregado a la factura',
                    'factura'=>$idFacturaActual
                ];


            }else {//de lo contario devuelve 0(cero) se crea una nueva factura
                // creamos una nueva factura para el grupo de facturacion
                $nuevoNumeroFactura = ultimo_numero_factura() + 1;
                //array para la tabla factura
            $data = [
                'f_numero'=>$nuevoNumeroFactura,
                'usario_id'=>$usuarioId,
                'persona_id'=>$clienteId,
                'textofactura_id'=>$textoFactura,
                'condicion_id'=>$condicionVenta,
                'fd_dias_credito'=>$diasCredito,
                'f_estado'=>2,
                'f_tipo_factura'=>$tipoVenta,
                'f_pedido_aprobado'=>$estadoPedido,
                'f_estado_entrega'=>$estadoEntrega,
                'f_fecha_a_entregar'=>$fechaAEntregar,
                'f_fecha_entregado'=>$fechaEntrega,
            ];

            $factura = Factura::create($data);
            if($factura){
                  //buscamos si exite el producto
                  $factura_id = $factura->id;
                  Set_Factura_Session($factura_id);//set una variable de sesion el numero
                  $nuevaCantidad = validar_existe_producto_factura($factura_id, $productoId) +$cantidad;
                 $datosdetalle = [
                    'factura_id'=>$factura_id,
                    'producto_id'=>$productoId,
                    'fd_cantidad'=>$nuevaCantidad,
                    'fd_precio_costo'=>$costo,
                    'fd_precio_venta'=>$precio,
                    //'fd_iva', agregar iva a producto si desean aplicar impuestos, el campo ya eta en esta tbl
                    //'fd_descuento',
                    //'fd_nota'
                ];
                $facturaDetalles = FacturaDetalle::create($datosdetalle);
            }
            //enviamos un array con los mensajes
            $resp = [
                'tipo'=>'success',
                'mns'=>'Producto se ha agregado a la factura ',
                'factura'=>$nuevoNumeroFactura
            ];
            }

    //Display a successful message upon save
        return $resp;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
