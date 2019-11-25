<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\Categoria;

class ProductoController extends Controller
{
     //constructor para valdiar permisos
     public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //obtenemos la info
         $query = Producto::all();//->paginate(5); //show only 5 items at a time in descending order
         return view('productos.index', compact('query'));
    }
    //obtener regsitro total de la bd
    public function Registro_Total_Productos()
    {
        # code...
        /*'p_codigo', 'p_codigo_barra', 'p_nombre', 'categoria_id', 'p_precio_costo',
         'P_precio_venta', 'p_tipo', 'p_descripcion', 'p_url_img'*/
        $query = Producto::all();
        $obj = array();
      foreach ($query as $res =>$row) {
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
          'created_at'=>date("d/m/Y", strtotime($row['created_at']))
        ];
      }
      return Datatables::of($obj)->make(true);

    }
    function ejecutar(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('productos')
         ->where('p_codigo', 'like', '%'.$query.'%')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output = $row->p_codigo;
       }
      }
      if ($output==$query) {
        $data = array(
         'error'  => 'Ya existe el codigo '. $output.'!'
        );
      }else {
        $data = array(
         'ok'  => 'puede ser usado '.$output
        );
      }
      echo json_encode($data);
     }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Categoria::all();
        return view('productos.create', compact('query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'p_codigo'=>'required|max:100',
            'p_nombre' =>'max:250',
            'p_precio_venta' => 'required',
            'categoria_id'=>'required',
            'tipoProducto'=>'required',
            'p_url_img' =>'mimes:jpg,jpeg,png,gif',
            ]);
            //validar
           DB::beginTransaction();
            $urlimg = $request['p_url_img'];
            try{
                if ($urlimg) {
                  $randonNumber = str_replace('.',time(),explode(' ',microtime())[1]*rand());
                  $path = public_path().'/images/productos';
                  $fileType = $urlimg->guessExtension();
                  $fileZise = $urlimg->getClientSize()/1024;
                  $fileName = 'producto_'.$randonNumber.'.'.$fileType;
                  //aqui llenamos el array para guardar el perfiles_tributarios
                  $data = [
                      'p_codigo'=>$request['p_codigo'],
                      'p_nombre'=>$request['p_nombre'],
                      'categoria_id'=>$request['categoria_id'],
                      'p_precio_costo'=>$request['p_precio_costo'],
                      'p_precio_venta'=>$request['p_precio_venta'],
                      'p_catidad'=>$request['p_catidad'],
                      'p_tipo'=>$request['tipoProducto'],
                      'p_descripcion'=>$request['p_descripcion'],
                      'p_url_img'=> $fileName
                  ];

                  //procederemos  guardarlo
                  if ($urlimg->move($path, $fileName)) {
                    /// guardamos en la bd todo
                      $regisro = Producto::create($data);
                      //dd($empresa);

                  }else {
                    return 'no se pudo mover el file';
                  }
                }else {
                  //no hay img
                  $data = [
                    'p_codigo'=>$request['p_codigo'],
                    'p_nombre'=>$request['p_nombre'],
                    'categoria_id'=>$request['categoria_id'],
                    'p_precio_costo'=>$request['p_precio_costo'],
                    'p_precio_venta'=>$request['p_precio_venta'],
                    'p_catidad'=>$request['p_catidad'],
                    'p_tipo'=>$request['tipoProducto'],
                    'p_descripcion'=>$request['p_descripcion']
                ];
                 /// guardamos en la bd todo
                 $regisro = Producto::create($data);
                 //dd($empresa);

                }
        DB::commit();
        //Display a successful message upon save
            return redirect()->route('productos.index')
                ->with('success', 'El producto : ,
                 '. $regisro->p_nombre.' se ha creado!');
               }catch(\Exception $e){
                    DB::rollback();
                    return redirect()->route('productos.index')
                                ->with('warning','Something Went Wrong!');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Producto::findOrFail($id); //Find post of id = $id
        return view ('productos.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Categoria::all();
        $post = Producto::findOrFail($id);
        return view('productos.edit', compact('post', 'query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validating title and body field
        $this->validate($request, [
            'p_codigo'=>'required|max:100',
            'p_nombre' =>'max:250',
            'p_precio_venta' => 'required',
            'categoria_id'=>'required',
            'tipoProducto'=>'required',
            'p_url_img' =>'mimes:jpg,jpeg,png,gif',
            ]);
            //validar
           DB::beginTransaction();
            $urlimg = $request['p_url_img'];
            //buscar por id
            $regisro =  Producto::findOrFail($id);
            try{
                if ($urlimg) {
                  $randonNumber = str_replace('.',time(),explode(' ',microtime())[1]*rand());
                  $path = public_path().'/images/productos';
                  $fileType = $urlimg->guessExtension();
                  $fileZise = $urlimg->getClientSize()/1024;
                  $fileName = 'producto_'.$randonNumber.'.'.$fileType;
                  //aqui llenamos el array para guardar el perfiles_tributarios
                  $data = [
                      'p_codigo'=>$request['p_codigo'],
                      'p_nombre'=>$request['p_nombre'],
                      'categoria_id'=>$request['categoria_id'],
                      'p_precio_costo'=>$request['p_precio_costo'],
                      'p_precio_venta'=>$request['p_precio_venta'],
                      'p_catidad'=>$request['p_catidad'],
                      'p_tipo'=>$request['tipoProducto'],
                      'p_descripcion'=>$request['p_descripcion'],
                      'p_url_img'=> $fileName
                  ];

                  //procederemos  guardarlo
                  if ($urlimg->move($path, $fileName)) {
                    /// guardamos en la bd todo
                       $regisro->update($data);
                      //dd($empresa);

                  }else {
                    return 'no se pudo mover el file';
                  }
                }else {
                  //no hay img
                  $data = [
                    'p_codigo'=>$request['p_codigo'],
                    'p_nombre'=>$request['p_nombre'],
                    'categoria_id'=>$request['categoria_id'],
                    'p_precio_costo'=>$request['p_precio_costo'],
                    'p_precio_venta'=>$request['p_precio_venta'],
                    'p_catidad'=>$request['p_catidad'],
                    'p_tipo'=>$request['tipoProducto'],
                    'p_descripcion'=>$request['p_descripcion']
                ];
                 /// guardamos en la bd todo
                 $regisro->update($data);
                 //dd($empresa);

                }
        DB::commit();
        //Display a successful message upon save
            return redirect()->route('productos.index')
                ->with('success', 'El producto : ,
                 '. $regisro->p_nombre.' se ha creado!');
               }catch(\Exception $e){
                    DB::rollback();
                    return redirect()->route('productos.index')
                                ->with('warning','Something Went Wrong!');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Producto::findOrFail($id);
        $post->delete();

        return redirect()->route('productos.index')
            ->with('success',
             'El registro se ha eliminado correctamente!');

    }
}
