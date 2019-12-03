<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Yajra\DataTables\DataTables;
use DB;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //obtenemos la info
         $datoId = Auth::user()->id;
         $query = User::findOrFail($datoId);//->paginate(5); //show only 5 items at a time in descending order
         return view('perfil.index', compact('query'));
    }
    public function Registro_Total_MiControles(){

        # code...
                 //validamos si hay abierto una factura
                 $datoId = Auth::user()->id;
                 $datos =DB::select('SELECT *
                  FROM
                 controls
                  INNER JOIN users ON users.id = controls.usario_id
                  WHERE
                  controls.persona_id = '.$datoId.' AND
                  users.deleted_at IS NULL ');
                 $obj = array();
                   foreach ($datos as $key) {
                       $tipoRegsitro = '';
                       if($key->c_tipo == 1){
                        $tipoRegsitro = 'Nuevo';
                       }else{
                        $tipoRegsitro = 'Rutina';
                       }

                    $obj[] = [
                        'id'=>$key->id,
                        'usario_id'=>$key->name,
                        'persona_id'=>nombre_cleinte($key->persona_id),
                        'c_altura'=>$key->c_altura,
                        'c_peso' =>$key->c_peso,
                        'c_procentaje_grasa'=>$key->c_procentaje_grasa,
                        'c_grasa_viceral'=>$key->c_grasa_viceral,
                        'c_cintura'=>$key->c_cintura,
                        'c_pecho'=>$key->c_pecho,
                        'c_cadera'=>$key->c_cadera,
                        'c_brazo'=>$key->c_brazo,
                        'c_imc'=>$key->c_imc,
                        'c_tipo'=>$tipoRegsitro,
                        'c_nota'=>$key->c_nota,
                        'created_at'=> date("d/m/Y", strtotime($key->created_at))
                      ];

                   }
                   return Datatables::of($obj)->make(true);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $user = User::findOrFail($id); //Get user with specified id
            return view('perfil.edit', compact('user')); //pass user and roles data to view
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
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|min:3|max:120',
            'tipo_identificacion' => 'required',
            'identificacion' => 'required|min:7|max:20',
            'email'=>'required|email',
            'tipo_telefono' => 'required',
            'telefono' => 'required|numeric|min:8'
        ],
        ['p_codigo.name' => 'Nombre es requerido',
        'name.max' => 'Nombre solo se permiten 120 caracteres',
        'name.min' => 'Nombre minimo 3 caracteres',
        'tipo_identificacion.required' => 'Tipo de Cedula es requerido',
        'identificacion.required' => 'Identificacion es requerido',
        'identificacion.max' => 'Identificacion maximo 20 caracteres',
        'identificacion.min' => 'Identificacion minimo 7 caracteres',
        'email.required' => 'Email es requerido',
        'email.email' => 'Email no corresponde a un formato de correo valido',
        'tipo_telefono.required' => 'Tipo de Telefono es requerido',
        'telefono.required' => 'Telefono es requerido',
        'telefono.min' => 'Telefono minimo 8 caracteres'
        ]);
            $input = $request->only(['name', 'tipo_identificacion',
            'identificacion', 'email', 'tipo_telefono',
            'telefono', 'password']); //Retreive the name, email and password fields
            $user->fill($input)->save();

            return redirect()->route('perfil.index')
                ->with('flash_message',
                 'User successfully edited.');
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
