<?php

namespace App\Listeners;

use App\Models\Usuario;
use App\Notifications\CitaNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class CitaListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Usuario::all()
        ->where("id", "=", $event->cita->usuarios_id)
        ->each(function(Usuario $usuario) use ($event){
            Notification::send($usuario, new CitaNotification($event->cita));
        });
    }
}
