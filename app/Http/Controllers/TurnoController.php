<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Dependencia;
use App\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Cliente::where('cedula', $request['cedula'])->exists())
        {
            event(new \App\Events\UserEvent(\App\User::first()));
            $dependencia =  Dependencia::all();
            $idclient = $request['cedula'];
            return view('turn.dependence', compact('dependencia', 'idclient'));
        }else{
            return 'no existe';
        }

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
        $cedula = Cliente::where('cedula', $request['cedula'])->value('id');
        Turno::create([
            'llamado' => '0',
            'atendido' => '0',
            'solucionado' => '0',
            'observacion' => '',
            'fecha' => date('y-m-d'),
            'inicio' => date('H:i:s'),
            'fin' => null,
            'id_users' => '1',
            'id_clientes' => $cedula,
            'id_modulos' => '1',
        ]);
        return view('turn/redireccion');
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
