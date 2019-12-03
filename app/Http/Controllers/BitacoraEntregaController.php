<?php

namespace App\Http\Controllers;

use App\BitacoraEntrega;
use Illuminate\Http\Request;

class BitacoraEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\BitacoraEntrega  $bitacoraEntrega
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BitacoraEntrega::where('factura_id',$id)->get(); //Find post of id = $id
        return view ('pedidos.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BitacoraEntrega  $bitacoraEntrega
     * @return \Illuminate\Http\Response
     */
    public function edit(BitacoraEntrega $bitacoraEntrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BitacoraEntrega  $bitacoraEntrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BitacoraEntrega $bitacoraEntrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BitacoraEntrega  $bitacoraEntrega
     * @return \Illuminate\Http\Response
     */
    public function destroy(BitacoraEntrega $bitacoraEntrega)
    {
        //
    }
}
