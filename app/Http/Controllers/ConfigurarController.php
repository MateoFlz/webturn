<?php

namespace App\Http\Controllers;

use App\Configurar;
use App\Rol;
use Illuminate\Http\Request;

class ConfigurarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Configurar  $configurar
     * @return \Illuminate\Http\Response
     */
    public function show(Configurar $configurar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Configurar  $configurar
     * @return \Illuminate\Http\Response
     */
    public function edit(Configurar $configurar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Configurar  $configurar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configurar $configurar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Configurar  $configurar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configurar $configurar)
    {
        //
    }
}
