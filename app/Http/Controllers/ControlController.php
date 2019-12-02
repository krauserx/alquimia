<?php

namespace App\Http\Controllers;

use App\Control;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Auth;
use App\Persona;

class ControlController extends Controller
{
    //constructor para valdiar permisos
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index()
    {
         //obtenemos la info
         return view('control.index');
    }
    //obtener regsitro total de la bd
    public function Registro_Total_Controles(){

        # code...
                 //validamos si hay abierto una factura
                 $datoId = Auth::user()->id;
                 $datos =DB::select('SELECT *
                  FROM
                 controls
                  INNER JOIN personas ON personas.id = controls.persona_id
                  INNER JOIN users ON users.id = controls.usario_id
                  WHERE
                  personas.deleted_at IS NULL ');
                 $obj = array();
                   foreach ($datos as $key) {

                    $obj[] = [
                        'id'=>$key->id,
                        'usario_id'=>$key->name,
                        'persona_id'=>$key->p_nombre,
                        'c_altura'=>$key->c_altura,
                        'c_peso' =>$key->c_peso,
                        'c_procentaje_grasa'=>$key->c_procentaje_grasa,
                        'c_grasa_viceral'=>$key->c_grasa_viceral,
                        'c_cintura'=>$key->c_cintura,
                        'c_pecho'=>$key->c_pecho,
                        'c_cadera'=>$key->c_cadera,
                        'c_brazo'=>$key->c_brazo,
                        'c_imc'=>$key->c_imc,
                        'c_tipo'=>$key->c_tipo,
                        'c_nota'=>$key->c_nota,
                        'created_at'=> date("d/m/Y", strtotime($key->created_at))
                      ];

                   }
                   return Datatables::of($obj)->make(true);


    }


    /**
     * 'usario_id',
                'persona_id',
                'c_altura',
                'c_peso',
                'c_procentaje_grasa',
                'c_grasa_viceral',
                'c_cintura',
                'c_pecho',
                'c_cadera',
                'c_brazo',
                'c_imc',
                'c_tipo',
                'c_nota'
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Persona::all();//->paginate(5); //show only 5 items at a time in descending order
        return view('control.create', compact('query'));
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
                'persona_id'=>'required',
                'c_altura'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'c_peso'=>'required',
                'c_procentaje_grasa'=>'required',
                'c_grasa_viceral'=>'required',
                'c_cintura'=>'required',
                'c_pecho'=>'required',
                'c_cadera'=>'required',
                'c_brazo'=>'required',
                'c_imc'=>'required',
                'c_tipo'=>'required'
                 ]);

                         DB::beginTransaction();
                        try{
                              //aqui llenamos el array para guardar
                              $data = [
                                'usario_id'=>Auth::user()->id,
                                'persona_id'=>$request['persona_id'],
                                'c_altura'=>$request['c_altura'],
                                'c_peso'=>$request['c_peso'],
                                'c_procentaje_grasa'=>$request['c_procentaje_grasa'],
                                'c_grasa_viceral'=>$request['c_grasa_viceral'],
                                'c_cintura'=>$request['c_cintura'],
                                'c_pecho'=>$request['c_pecho'],
                                'c_cadera'=>$request['c_cadera'],
                                'c_brazo'=>$request['c_brazo'],
                                'c_imc'=>$request['c_imc'],
                                'c_tipo'=>$request['c_tipo'],
                                'c_nota'=>$request['c_nota'],
                              ];

                                /// guardamos en la bd todo
                                  $control = Control::create($data);


                   DB::commit();
                    //Display a successful message upon save
                        return redirect()->route('control.index')
                            ->with('success', 'Los datos se registraron con el #  ,
                             '. $control->id.' se han creado!');
                            }catch(\Exception $e){
                                DB::rollback();
                                return redirect()->route('control.create')
                                            ->with('warning','Something Went Wrong!');
                            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show(Control $control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        //
    }
}
