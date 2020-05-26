<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Dependencia;
use App\Events\EventTurn;
use App\Fichos;
use App\Modulo;
use App\Servicioturno;
use App\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TurnoController extends Controller
{


    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Cliente::where('cedula', $request['cedula'])->exists())
        {
            $dependencia =  Dependencia::all();
            $idclient = $request['cedula'];
            return view('turn.dependence', compact('dependencia', 'idclient'));
        }else{
            return view('turn.registrer');
        }

    }

    public function Showsistema(){
        $list = Turno::getlist();
        return view('sistema', compact('list'));
    }

    public function ShowTurnos()
    {
        $iddepen = Turno::getdependenciauser();
        $allturnos = Turno::geturnoday($iddepen);
        $first = Turno::firstllamado($iddepen)->first();
        $modulos = Modulo::where('id_users', Auth::user()->id)->get();
        $servicio = Turno::getservicios($iddepen);
        $dependencia = Dependencia::all();
        $atencion = false;
        event(new \App\Events\EventList());
        return view('turn.turnespera', compact('allturnos', 'modulos', 'dependencia', 'first', 'servicio', 'atencion'));
    }

    public function updateLlamado(Request $request, $id)
    {

        Turno::where('id', $id)->update(['llamado' => $request['llamado'], 'id_modulos' => $request['modulo']]);
        $iddepen = Turno::getdependenciauser();
        $allturnos = Turno::geturnoday($iddepen);
        $first = Turno::firstllamado($iddepen)->first();
        $modulos = Modulo::where('id_users', Auth::user()->id)->get();
        $servicio = Turno::getservicios();
        $dependencia = Dependencia::all();
        $atencion = true;
        event(new \App\Events\EventList());
        return view('turn.turnespera', compact('allturnos', 'modulos', 'dependencia', 'first', 'servicio', 'atencion'));
    }

    public static function getFichos()
    {

        return Fichos::all();
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
            ->where('id_dependencias', $request['iddependencia'])
            ->get();

        if(count($turnos) > 0)
        {
            if($turnos[0]['turnosdeldia'] > $turnos[0]['numerodeturnos']){
                return '<script>
                            alert("No hay turnos disponible");
                            location.href="/";
                        </script>';
            }else{
                $cedula = Cliente::where('cedula', $request['cedula'])->value('id');
                Turno::create([
                    'llamado' => '0',
                    'atendido' => '0',
                    'solucionado' => '0',
                    'observacion' => '',
                    'fecha' => date('y-m-d'),
                    'inicio' => date('H:i:s'),
                    'fin' => null,
                    'horario' => date('A'),
                    'id_users' => '1',
                    'id_clientes' => $cedula,
                    'id_dependencia' => $request['iddependencia'],
                    'id_modulos' => '1',
                ]);
                $idepen = $request['iddependencia'];
                event(new EventTurn($idepen));
                $numerturno = Turno::where('llamado', '0')
                ->where('fecha', date('Y-m-d'))
                ->where('horario', date('A'))->count();
                return view('turn/redireccion', compact('numerturno'));
            }

        }else{
            $cedula = Cliente::where('cedula', $request['cedula'])->value('id');
                Turno::create([
                    'llamado' => '0',
                    'atendido' => '0',
                    'solucionado' => '0',
                    'observacion' => '',
                    'fecha' => date('y-m-d'),
                    'inicio' => date('H:i:s'),
                    'fin' => null,
                    'horario' => date('A'),
                    'id_users' => '1',
                    'id_clientes' => $cedula,
                    'id_dependencia' => $request['iddependencia'],
                    'id_modulos' => '1',
                ]);
                $idepen = $request['iddependencia'];
                event(new EventTurn($idepen));
                $numerturno = Turno::where('llamado', '0')
                ->where('fecha', date('Y-m-d'))
                ->where('horario', date('A'))->count();
                return view('turn/redireccion', compact('numerturno'));

        }

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

        if(isset($request['atencion']) && isset($request['solucionado'])){
            Turno::where('id', $id)->update([
                'atendido' => $request['atencion'],
                'solucionado' => $request['solucionado'],
                'observacion' => $request['observacionturno'],
                'fin' => date('H:i:s'),
                ]);
                $iddepen = Turno::getdependenciauser();
                $allturnos = Turno::geturnoday($iddepen);
                $first = Turno::firstllamado($iddepen)->first();
                $modulos = Modulo::where('id_users', Auth::user()->id)->get();
                $servicio = Turno::getservicios($iddepen);
                $dependencia = Dependencia::all();
                $atencion = false;
                $service = $request['servicio'];
                for($i = 0; $i < count($service); $i++){
                    Servicioturno::create([
                        'fecha' => date('Y-m-d'),
                        'id_servicios' => $service[$i],
                        'id_turnos' => $id,
                    ]);
                }
                Session::flash('message','Cliente atendido con exito');
                return view('turn.turnespera', compact('allturnos', 'modulos','dependencia', 'first', 'servicio', 'atencion'));
        }else if(isset($request['atencion'])){
            Turno::where('id', $id)->update([
                'atendido' => $request['atencion'],
                'observacion' => $request['observacionturno'],
                'fin' => date('H:i:s'),
                ])->id;
                $iddepen = Turno::getdependenciauser();
                $allturnos = Turno::geturnoday($iddepen);
                $first = Turno::firstllamado($iddepen)->first();
                $modulos = Modulo::where('id_users', Auth::user()->id)->get();
                $servicio = Turno::getservicios($iddepen);
                $dependencia = Dependencia::all();
                $atencion = false;
                $service = $request['servicio'];
                for($i = 0; $i < count($service); $i++){
                    Servicioturno::create([
                        'fecha' => date('Y-m-d'),
                        'id_servicios' => $service[$i],
                        'id_turnos' => $id,
                    ]);
                }
                Session::flash('message','Cliente atendido con exito');
                return view('turn.turnespera', compact('allturnos', 'modulos','dependencia', 'first', 'servicio', 'atencion'));
        }else if(isset($request['solucionado']))
        {
            Turno::where('id', $id)->update([
                'atendido' => '1',
                'solucionado' => $request['solucionado'],
                'observacion' => $request['observacionturno'],
                'fin' => date('H:i:s'),
                ])->id;
                $iddepen = Turno::getdependenciauser();
                $allturnos = Turno::geturnoday($iddepen);
                $first = Turno::firstllamado($iddepen)->first();
                $modulos = Modulo::where('id_users', Auth::user()->id)->get();
                $servicio = Turno::getservicios($iddepen);
                $dependencia = Dependencia::all();
                $atencion = false;
                $service = $request['servicio'];
                for($i = 0; $i < count($service); $i++){
                    Servicioturno::create([
                        'fecha' => date('Y-m-d'),
                        'id_servicios' => $service[$i],
                        'id_turnos' => $id,
                    ]);
                }
                Session::flash('message','Cliente atendido con exito');
                return view('turn.turnespera', compact('allturnos', 'modulos','dependencia', 'first', 'servicio', 'atencion'));

        }else
        {
            Turno::where('id', $id)->update([
                'observacion' => $request['observacionturno'],
                'fin' => date('H:i:s'),
                ])->id;
                $iddepen = Turno::getdependenciauser();
                $allturnos = Turno::geturnoday($iddepen);
                $first = Turno::firstllamado($iddepen)->first();
                $modulos = Modulo::where('id_users', Auth::user()->id)->get();
                $servicio = Turno::getservicios($iddepen);
                $dependencia = Dependencia::all();
                $atencion = false;
                $service = $request['servicio'];
                for($i = 0; $i < count($service); $i++){
                    Servicioturno::create([
                        'fecha' => date('Y-m-d'),
                        'id_servicios' => $service[$i],
                        'id_turnos' => $id,
                    ]);
                }
                Session::flash('message','Cliente atendido con exito');
                return view('turn.turnespera', compact('allturnos', 'modulos','dependencia', 'first', 'servicio', 'atencion'));
        }

    }

    public function stop(Request $request){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function tranferido(Request $request)
    {
        $this->validator($request->all())->validate();
        $turnos = Fichos::where('fecha', date('Y-m-d'))
            ->where('horario', date('A'))
            ->where('id_dependencias', $request['iddependencia'])
            ->get();

        if(count($turnos) > 0)
        {
            if($turnos[0]['turnosdeldia'] > $turnos[0]['numerodeturnos']){
                return '<script>
                            alert("No hay turnos disponible");
                            location.href="/";
                        </script>';
            }else{
                $cedula = Cliente::where('cedula', $request['cedula'])->value('id');
                Turno::create([
                    'llamado' => '0',
                    'atendido' => '0',
                    'solucionado' => '0',
                    'observacion' => '',
                    'fecha' => date('y-m-d'),
                    'inicio' => date('H:i:s'),
                    'fin' => null,
                    'horario' => date('A'),
                    'id_users' => '1',
                    'id_clientes' => $cedula,
                    'id_dependencia' => $request['iddependencia'],
                    'id_modulos' => '1',
                ]);
                $idepen = $request['iddependencia'];
                event(new EventTurn($idepen));
                $numerturno = Turno::where('llamado', '0')
                ->where('fecha', date('Y-m-d'))
                ->where('horario', date('A'))->count();
                return view('turn/redireccion', compact('numerturno'));
            }

        }else{
            $cedula = Cliente::where('cedula', $request['cedula'])->value('id');
                Turno::create([
                    'llamado' => '0',
                    'atendido' => '0',
                    'solucionado' => '0',
                    'observacion' => '',
                    'fecha' => date('y-m-d'),
                    'inicio' => date('H:i:s'),
                    'fin' => null,
                    'horario' => date('A'),
                    'id_users' => '1',
                    'id_clientes' => $cedula,
                    'id_dependencia' => $request['iddependencia'],
                    'id_modulos' => '1',
                ]);
                $idepen = $request['iddependencia'];
                event(new EventTurn($idepen));
                $numerturno = Turno::where('llamado', '0')
                ->where('fecha', date('Y-m-d'))
                ->where('horario', date('A'))->count();
                return view('turn/redireccion', compact('numerturno'));

        }
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
            'cedula' => ['required', 'string', 'max:11'],
            'dependencia' => ['required'],
        ]);
    }

    private function getnumeroturno()
    {
        $numero = Fichos::value('turnosdeldia');
    }



}
