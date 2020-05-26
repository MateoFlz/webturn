<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Modulo;
use App\Turno;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Modulo::where('id_users', Auth::user()->id)->exists()){
            $idmodulo = Modulo::where('id_users', Auth::user()->id)->value('id');
            $iddepen = Turno::getdependenciauser();
            $espera = Turno::where('llamado', '0')->where('id_dependencia', $iddepen)->where('fecha', date('Y-m-d'))->where('horario', date('A'))->count();
            $turnos = Turno::where('atendido', '1')->where('id_modulos', $idmodulo)->get();
            $atendidos = Turno::where('llamado', '0')->orWhere('atendido', '0')->where('id_dependencia', $iddepen)->count();
            $total = Turno::all()->where('id_modulos', $idmodulo)->count();
            $turnoservice = Cliente::getcliente($idmodulo);
            $serviciosdescripcion = Turno::getTurnoservices();
            $noatendidos = Cliente::getnoatendido($iddepen);
            return view('dashboard', compact('espera','turnos', 'atendidos','total','turnoservice','serviciosdescripcion', 'noatendidos'));
        }else{
            $idmodulo = 0;#
            $iddepen = 0;
            $espera = 0;
            $turnos = [];#
            $atendidos = 0;#
            $total = 0;#
            $turnoservice = [];#
            $noatendidos = [];
            $serviciosdescripcion = Turno::getTurnoservices();
            return view('dashboard', compact('espera', 'turnos', 'atendidos','total','turnoservice','serviciosdescripcion', 'noatendidos'));
        }



    }

    public function print()
    {
        $idmodulo = Modulo::where('id_users', Auth::user()->id)->value('id');
        $turnoservice = Cliente::getclientereport($idmodulo);
        $serviciosdescripcion = Turno::getTurnoservices();
        $pdf = \PDF::loadView('users.reportatendido', compact('turnoservice', 'serviciosdescripcion'))->setPaper('a4', 'landscape');
        return $pdf->download('Atendidos.pdf');

    }

    public function print2()
    {
        $iddepen = Turno::getdependenciauser();
        $noatendidos = Cliente::getnoatendido($iddepen);
        $pdf = \PDF::loadView('users.reportnoatendido', compact('noatendidos'));
        return $pdf->download('Noatendidos.pdf');

    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->get('page', 1);
        $perPage = 5;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }


    public function isestandar()
    {
        $rolusers = User::where('id', Auth::user()->id)->value('id_rol');
        return $rolusers;
    }
}
