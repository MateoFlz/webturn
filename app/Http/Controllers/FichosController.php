<?php

namespace App\Http\Controllers;

use App\Fichos;
use App\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FichosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Fichos::paginate(5);
        return view('configurar.index', compact('turnos'));
    }

    public function print()
    {
        $turnos = Fichos::all();
        $pdf = \PDF::loadView('configurar.reportconfig', compact('turnos'))->setPaper('a4');
        return $pdf->download('Limites.pdf');

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
        $turnos = Fichos::where('fecha', date('Y-m-d'))
            ->where('horario', date('A'))
            ->where('id_dependencias', $this->getDependencia())
            ->get();
        if(count($turnos) > 0)
        {
            return back()->with('message', 'Ya existe un limite de turno creado.');
        }else{
            Fichos::create([
                'fecha' => date('Y-m-d'),
                'turnosdeldia' => '0',
                'numerodeturnos' => $request['deturnos'],
                'id_dependencias' => $this->getDependencia(),
                'horario' => date('A'),
            ]);
            return back()->withStatus(__('Limite de turnos creado con exito.'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fichos  $fichos
     * @return \Illuminate\Http\Response
     */
    public function show(Fichos $fichos)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fichos  $fichos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ficho = Fichos::findOrFail($id);
        return view('configurar.edit', ['ficho' => $ficho]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fichos  $fichos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ficho = Fichos::findOrFail($id);
        $ficho->update(['numerodeturnos' => $request['deturnos']]);
        return back()->withStatus(__('Limite de turnos editado con exito.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fichos  $fichos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fichos::destroy($id);
        return back()->with('messages', 'Turnos eliminado con exito.');
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
            'numero' => ['required', 'number', 'max:3'],
        ]);
    }

    private function getDependencia()
    {
        $iduserdependencia = DB::table('modulos')->select('dependencias.id')
        ->join('dependencias', 'modulos.id_dependencias', '=', 'dependencias.id')
        ->where('modulos.id_users', Auth::user()->id)
        ->value('dependencia.id');

        return $iduserdependencia;
    }

}
