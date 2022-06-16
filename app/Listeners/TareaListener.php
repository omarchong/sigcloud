<?php

namespace App\Listeners;

use App\Models\Usuario;
use App\Notifications\Notificacion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class TareaListener implements ShouldQueue
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
        ->where("id", "=", $event->tarea->usuario_id)
        ->each(function(Usuario $usuario) use ($event){
            Notification::send($usuario, new Notificacion($event->tarea));
        });
        /* ->whereNotIn('id', $event->tarea->usuario_id) */
        /* Usuario::all()
        ->except($event->tarea->usuario_id)
        ->each(function(Usuario $usuario) use ($event){
            Notification::send($usuario, new Notificacion($event->tarea));
        }); */
    }
}
