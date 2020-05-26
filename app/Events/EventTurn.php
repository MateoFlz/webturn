<?php

namespace App\Events;

use App\Dependencia;
use App\Turno;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class EventTurn implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $turno;
    public $destino;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($dependencia)
    {
        $this->turno = DB::table('turnos')->select('clientes.*', 'turnos.id', 'clientes.id as idclient')
        ->join('clientes', 'turnos.id_clientes', '=', 'clientes.id')
        ->where('turnos.fecha', date('Y-m-d'))
        ->where('turnos.horario', date('A'))
        ->where('turnos.llamado', '0')
        ->where('turnos.id_dependencia', $dependencia)->get();
        $this->destino = Dependencia::all();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel-turn');
    }

    public function broadcastAs()
    {
        return "EventTurn";
    }

    public function broadcastWith()
    {
        return [
            'turno' => $this->turno,
            'dependencias' => $this->destino,
        ];
    }
}
