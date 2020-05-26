<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class EventList implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $list;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->list = DB::table('turnos')->select('modulos.name as namemodulo', 'clientes.name as namecliente', 'clientes.cedula')
        ->join('clientes', 'turnos.id_clientes', '=', 'clientes.id')
        ->join('modulos', 'modulos.id', '=', 'turnos.id_modulos')
        ->where('turnos.fecha', date('Y-m-d'))
        ->where('turnos.llamado', '1')
        ->where('turnos.horario', date('A'))
        ->orderBy('turnos.created_at', 'desc')
        ->paginate(4);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel-list');
    }

    public function broadcastAs()
    {
        return "EventList";
    }

    public function broadcastWith()
    {
        return [
            'list' => $this->list
        ];
    }

}
