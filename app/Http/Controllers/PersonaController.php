<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Contacto;
use DB;
use App\TipoDatoContacto;

class PersonaController extends Controller
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
         $query = Persona::all();//->paginate(5); //show only 5 items at a time in descending order
         return view('personas.index', compact('query'));
    }
    //obtener regsitro total de la bd
    public function Registro_Total_Personas()
    {
        # code...
        $query = Persona::all();
        $obj = array();
      foreach ($query as $res =>$row) {
          //validar tipo de cleinte
          $tipoCliente = '';
          if($row['p_tipo_persona'] == 1){
            $tipoCliente = 'Cliente';
          }else{
            $tipoCliente = 'Provedor';
          }
          //validar sexo
          $sexo = '';
          if($row['p_sexo'] == 1){
            $sexo = 'Hombre ';
          }elseif($row['p_sexo'] == 1){
            $sexo = 'Mujer';
          }else{
            $sexo = 'No Indica';
          }
        $obj[] = [
          'id'=>$row['id'],
          'nombre'=>$row['p_nombre'].' '.$row['p_apellido'],
          'tipoCliente'=>$tipoCliente,
          'sexo'=>$sexo,
          'fechaNacimiente'=>$row['p_fecha_nacimeinto'],
          'creado'=>date("d/m/Y", strtotime($row['created_at']))
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
        //obtenemos la info
        $query = TipoDatoContacto::all();
        return view('personas.create', compact('query'));
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
                    'nombre'=>'required|max:100',
                    'apellido' =>'required|max:100',
                    'direccion' =>'required',
                    'tipoPersona' =>'required',
                    'sexo' =>'required',
                    'fechan' =>'required',
                    'dato_contacto' =>'required|array',
                    ]);
                    //validar
                    $arrayContacto = $request['dato_contacto'];
                    $arrayidContacto = $request['id_dato_contacto'];
                    $newDate_fechan = date("Y-m-d", strtotime($request['fechan']));

               //     DB::beginTransaction();
                try{
                      //aqui llenamos el array para guardar
                      $data = [
                          'p_nombre'=>$request['nombre'],
                          'p_apellido'=>$request['apellido'],
                          'p_tipo_persona'=> intval($request['direccion']),
                          'p_sexo'=> intval($request['tipoPersona']),
                          'p_direccion'=> $request['sexo'],
                          'p_fecha_nacimeinto'=> $newDate_fechan,
                      ];

                        /// guardamos en la bd todo
                          $persona = Persona::create($data);
                           //recorremos los imput
                        foreach ($arrayidContacto as $r) {
                            $infoContacto = [
                                'tipo_dato_id'=>$r,
                                'c_info'=> $arrayContacto[$r-1]
                            ];
                            //insertamos los datos
                            $infoCont = Contacto::create($infoContacto);
                            //asociamos persona con contacto
                          $infoCont->contacto_empresa()->attach($persona->id);

                          }

            DB::commit();
            //Display a successful message upon save
                return redirect()->route('personas.index')
                    ->with('flash_message', 'Empresa: ,
                     '. $persona->p_nombre.' creada!');
                    }catch(\Exception $e){
                        DB::rollback();
                        return redirect()->route('personas.index')
                                    ->with('warning','Something Went Wrong!');
                    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //obtenemos la info
        $query = TipoDatoContacto::all();
        $post = Persona::findOrFail($id); //Find post of id = $id
        return view ('personas.show', compact('post', 'query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtenemos la info
        $query = TipoDatoContacto::all();
        $post = Persona::findOrFail($id);
        return view('personas.edit', compact('post', 'query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
