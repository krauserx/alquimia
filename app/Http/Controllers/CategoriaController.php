<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class CategoriaController extends Controller
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
        $query = Categoria::all();//->paginate(5); //show only 5 items at a time in descending order
        return view('categorias.index', compact('query'));
    }
    //obtener regsitro total de la bd
    public function Registro_Total_Categorias()
    {
        # code...
        $query = Categoria::all();
        $obj = array();
      foreach ($query as $res =>$row) {
          //validar tipo de cleinte
          $urlimg = asset('/images/categorias/').$row['c_url_img'];
          $cate = $row['c_texto'];
        $obj[] = [
          'id'=>$row['id'],
          'c_url_img'=>$row['c_url_img'],
          'c_texto'=>$cate,
          'c_descripcion' =>$row['c_descripcion'],
          'created_at'=>date("d/m/Y", strtotime($row['created_at']))
        ];
      }
      return Datatables::of($obj)->make(true);

    }

    /**
     * Show the form for creating a new resource.
     * <img src="'.$urlimg.'" class="rounded-circle" alt="'.$cate.'" style="width: 50px;">
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            'c_texto'=>'required|max:60',
            'c_descripcion' =>'max:150',
            'c_url_img' =>'mimes:jpg,jpeg,png,gif',
            ],
            ['c_texto.required' => 'Categoria es requerido',
            'c_descripcion.max' => 'Descripcion se permite mmaximo 150 caracteres',
            'c_url_img.mimes' => 'IMG solo se permite jpg,jpeg,png,gif']);
            //validar
            DB::beginTransaction();
            $urlimg = $request['c_url_img'];
            try{

                if ($urlimg) {
                  $randonNumber = str_replace('.',time(),explode(' ',microtime())[1]*rand());
                  $path = public_path().'/images/categorias';
                  $fileType = $urlimg->guessExtension();
                  $fileZise = $urlimg->getClientSize()/1024;
                  $fileName = 'logo_'.$randonNumber.'.'.$fileType;
                  //aqui llenamos el array para guardar el perfiles_tributarios
                  $data = [
                      'c_texto'=>$request['c_texto'],
                      'c_descripcion'=>$request['c_descripcion'],
                      'c_url_img'=> $fileName,
                  ];

                  //procederemos  guardarlo
                  if ($urlimg->move($path, $fileName)) {
                    /// guardamos en la bd todo
                      $empresa = Categoria::create($data);

                  }else {
                    return 'no se pudo mover el file';
                  }
                }else {
                  //no hay img
                  $data = [
                    'c_texto'=>$request['c_texto'],
                    'c_descripcion'=>$request['c_descripcion']
                ];
                 /// guardamos en la bd todo
                 $empresa = Categoria::create($data);

                }
        DB::commit();
        //Display a successful message upon save
            return redirect()->route('categorias.index')
                ->with('success', 'La categoria : ,
                 '. $empresa->c_texto.' se ha creado!');
                }catch(\Exception $e){
                    DB::rollback();
                    return redirect()->route('categorias.index')
                                ->with('warning','Something Went Wrong!');
                }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Categoria::findOrFail($id); //Find post of id = $id
        return view ('categorias.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Categoria::findOrFail($id);
        return view('categorias.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Validating title and body field
        $this->validate($request, [
            'c_texto'=>'required|max:60',
            'c_descripcion' =>'max:150',
            'c_url_img' =>'mimes:jpg,jpeg,png,gif',
            ],
            ['c_texto.required' => 'Categoria es requerido',
            'c_descripcion.max:150' => 'Categoria es requerido',
            'c_url_img.mimes' => 'IMG solo se permite jpg,jpeg,png,gif']);
            //validar
            DB::beginTransaction();
            $urlimg = $request['c_url_img'];
            try{

                $post = Categoria::findOrFail($id);
                if ($urlimg) {
                  $randonNumber = str_replace('.',time(),explode(' ',microtime())[1]*rand());
                  $path = public_path().'/images/categorias';
                  $fileType = $urlimg->guessExtension();
                  $fileZise = $urlimg->getClientSize()/1024;
                  $fileName = 'logo_'.$randonNumber.'.'.$fileType;
                  //aqui llenamos el array para guardar el perfiles_tributarios
                  $post->c_texto = $request['c_texto'];
                  $post->c_descripcion = $request['c_descripcion'];
                  $post->c_url_img = $fileName;


                  //procederemos  guardarlo
                  if ($urlimg->move($path, $fileName)) {
                    /// guardamos en la bd todo
                    $post->save();

                  }else {
                    return 'no se pudo mover el file';
                  }
                }else {
                  //no hay img
                  $post->c_texto = $request['c_texto'];
                  $post->c_descripcion = $request['c_descripcion'];
                 /// guardamos en la bd todo
                 $post->save();

                }
        DB::commit();
        //Display a successful message upon save
            return redirect()->route('categorias.index')
                ->with('success', 'La categoria
                 '. $post->c_texto.' se ha actualizado!');
                }catch(\Exception $e){
                    DB::rollback();
                    return redirect()->route('categorias.index')
                                ->with('warning','Something Went Wrong!');
                }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Categoria::findOrFail($id);
        $post->delete();

        return redirect()->route('categorias.index')
            ->with('success',
             'El registro se ha eliminado correctamente!');


    }
}
