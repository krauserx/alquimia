<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Empresa;
use App\TipoDatoContacto;
use App\Contacto;
use DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
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
        $query = Empresa::all();//->paginate(5); //show only 5 items at a time in descending order

        return view('empresa.index', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //crear
        //obtenemos la info
        $query = TipoDatoContacto::all();
        return view('empresa.create', compact('query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Validating title and body field
        $this->validate($request, [
            'nombre_empresa'=>'required|max:100',
            //'imagen' =>'required|mimes:jpg,jpeg,png,gif',
            'direccion' =>'required',
            'dato_contacto' =>'required|array',
            ]);

        DB::beginTransaction();
        try{
        //validar
        $arrayContacto = $request['dato_contacto'];
        $arrayidContacto = $request['id_dato_contacto'];
          //aqui llenamos el array para guardar el perfiles_tributarios
          $data = [
            'nombre_empresa'=>$request['nombre_empresa'],
            'direccion_empresa'=>$request['direccion'],
            'logo_empresa'=>'ok',
          ];
            // guardamos en la bd todo
            $empresa = Empresa::create($data);
                //recorremos los imput
                foreach ($arrayidContacto as $r) {
                    $infoContacto = [
                        'tipo_dato_id'=>$r,
                        'c_info'=> $arrayContacto[$r-1]
                    ];
                    //insertamos los datos
                    $infoCont = Contacto::create($infoContacto);
                    //asociamos empresa con contacto
                  $infoCont->contacto_empresa()->attach($empresa->id);

                  }


        DB::commit();
    //Display a successful message upon save
        return redirect()->route('empresa.index')
            ->with('flash_message', 'Empresa: ,
             '. $empresa->nombre_empresa.' creada!');
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('empresa.index')
                            ->with('warning','Something Went Wrong!');
            }



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
