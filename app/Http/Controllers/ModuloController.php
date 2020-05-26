<?php

namespace App\Http\Controllers;

use App\Dependencia;
use App\Modulo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulo = Modulo::getmodulos();
        return view('moduls.index', compact('modulo'));
    }

    public function print()
    {
        $modulo = Modulo::getmodulos();
        $pdf = \PDF::loadView('moduls.reportmodulos', compact('modulo'));
        return $pdf->download('Moludos.pdf');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dependencia = Dependencia::all();
        return view('moduls.create', compact('dependencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();
        $data = Modulo::userstatemodulo($request['iduser']);
        if($data == 'false'){
            Modulo::create([
                'name' => $request['caracteres'],
                'id_dependencias' => $request['dependencia'],
                'id_users' => $request['iduser'],
                'state' => '1',
            ]);
            return back()->withStatus(__('Modulo creado con éxito.'));
        }
        return back()->with('error','El usuario ya cuenta con modulo asignado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {   
        $modulos = Modulo::getmodulosforid($modulo->id_users);
        $dependencia = Dependencia::all();
        return view('moduls.show', compact('modulos', 'dependencia'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        $modulos = Modulo::getmodulosforid($modulo->id_users);
        $dependencia = Dependencia::all();
        return view('moduls.edit', compact('modulos', 'dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        $data = Modulo::userstatemodulo($request['id_users']);
        if($data == 0){
            $modulo->update($request->except('idnameuser'));
            return back()->withStatus(__('Modulo actualizado con éxito.'));
        }else{
            $modulo->update($request->except('idnameuser', 'id_users'));
            return back()->withStatus(__('Modulo actualizado con éxito.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->update(['state' => '0']);
        return back()->withStatus(__('Modulo eliminado con éxito.'));
    }

    public function getuser(Request $request)
    {
        return response()->json(User::getuser($request->names));
    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            "iduser" => ['required', 'numeric'],
            'caracteres' => ['required', 'string'],
            'dependencia' =>['required'],
            'idnameuser' => ['required', 'string']
        ]);
    }
}
