<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\FacturaDetalle;
use Auth;
use DB;
use App\Producto;
use App\Categoria;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    function crear_reporte_productos ($tipo){

        $productos = Producto::all();
        $obj = array();
        foreach ($productos as $res =>$row) {
            //validar tipo de cleinte
            $urlimg = asset('/images/productos/').$row['c_url_img'];
            $categoria = Categoria::findOrFail($row['categoria_id']);
            $cate = $categoria->c_texto;
            $tipoProd = '';
            $cantidad = '';
            if($row['p_tipo']==1){
              $tipoProd = 'Servicio';
              $cantidad = '';
            }else{
              $tipoProd = 'Mercaderia';
              $cantidad = $row['p_catidad'];
            }
            $validarPermisos = 0;
            if(Auth::user()->hasRole('Admin')){
              $validarPermisos = 1;//1 indica q es admin
            }elseif(Auth::user()->hasRole('Cliente')){
              $validarPermisos = 2;//2 indica q es cleinte
            }
          $obj[] = [
            'id'=>$row['id'],
            'p_url_img'=>$row['p_url_img'],
            'p_codigo'=>$row['p_codigo'],
            'p_nombre'=>$row['p_nombre'],
            'categoria'=>$cate,
            'p_precio_costo'=>$row['p_precio_costo'],
            'p_precio_venta'=>'¢ '.$row['p_precio_venta'],
            'cantidad' => $cantidad,
            'p_tipo'=>$tipoProd,
            'p_descripcion'=>$row['p_descripcion'],
            'created_at'=>date("d/m/Y", strtotime($row['created_at'])),
            'permiso_permitido'=>$validarPermisos
          ];
        }
        $vistaurl="reportes.productos";
        return $this->crearPDF($obj , $vistaurl,$tipo, '');

    }
    public function crear_detallePedidos($tipo){
        $obj[] =[];
        $datoId = Auth::user()->id;//variable q contine el id del usario logiado
        $isadmin = 0; //varibale para pasar si es admin al datable
         if(Auth::user()->hasRole('Admin')){//si es admin puede ver todos los pedidos de los usuarios
            $isadmin = 1; //es admin
            //validamos si hay abierto una factura
         $datos =DB::select('SELECT * FROM
         facturas
          INNER JOIN factura_detalles ON factura_detalles.factura_id = facturas.id
          WHERE
          factura_detalles.deleted_at IS NULL AND
          facturas.f_estado =1' );

         }else{
            $isadmin = 2; //no es admin, es cleinte
         //validamos si hay abierto una factura
         $datos =DB::select('SELECT * FROM
         facturas
          INNER JOIN factura_detalles ON factura_detalles.factura_id = facturas.id
          WHERE
          factura_detalles.deleted_at IS NULL AND
          facturas.f_estado =1 AND
         facturas.persona_id =' . $datoId);
         }
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
                'factura_id'=>$key->factura_id,
                'producto'=>nombre_producto($key->producto_id),
                'cantidad'=>$key->fd_cantidad,
                'precio' =>'¢ '.$key->fd_precio_venta,
                'estado'=>$key->f_pedido_aprobado,
                'fechaaentrega'=>$fechaaEntr,
                'fechaentrega'=> $fecha,
                'isadmin'=>$isadmin,
                'f_estado_entrega'=> $key->f_estado_entrega
              ];

           }
        $vistaurl="reportes.pedidos";
        return $this->crearPDF($obj , $vistaurl,$tipo, '');
    }
    public function crearPDF($datos,$vistaurl,$tipo, $fechaReporte)
    {
        $data = $datos;
        $fehcaReporteSelecionado = $fechaReporte;
        $view =  \View::make($vistaurl, compact('data', 'fehcaReporteSelecionado'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape');

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
