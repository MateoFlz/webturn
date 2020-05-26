<?php

namespace App\Http\Controllers;

use App\Dependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencia = Dependencia::where('state', '1')->paginate(5);
        return view('dependences.index', compact('dependencia'));
    }

    public function print()
    {
        $dependencia = Dependencia::all();
        $pdf = \PDF::loadView('dependences.reportdependencia', compact('dependencia'));
        return $pdf->download('Dependencias.pdf');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependences.create');
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
        Dependencia::create([
            'name' => $request['name'],
            'descripcion' => $request['descripcion'],
            'state' => '1',
        ]);
        return back()->withStatus(__('Dependencia creada con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function show(Dependencia $dependencia)
    {
        return view('dependences.show', ['dependencia'=> $dependencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependencia $dependencia)
    {

        return view('dependences.edit', ['dependencia'=> $dependencia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependencia $dependencia)
    {
        $request = request()->all();
        $dependencia->update($request);
        return back()->withStatus(__('Dependencia actualizada con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependencia $dependencia)
    {
        $dependencia->where('id', $dependencia->id)->update(['state' => '0']);
        return back()->withStatus(__('Dependencia eliminado con éxito.'));

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
            'name' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);
    }
}
