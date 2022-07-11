<?php

namespace App\Notifications;

use App\Models\Tarea;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\SessionGuard;

class Notificacion extends Notification
{
    use Queueable;

    public function __construct(Tarea $tarea)
    {
        $this->tarea = $tarea;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Has recibido una nueva tarea:')
                    ->line('La tarea es: ' . $this->tarea->nombre)
                    ->action('Ver', url('/'))
                    ->line('Gracias!');
    }

    // Notificaciones en la base de datos
    /* public function toDatabase($notifiable)
    {
        return [
            'tarea' => $this->tarea
        ];
    } */

    public function toArray($notifiable)
    {
        return [
            'tarea' => $this->tarea->id,
            'nombre' => $this->tarea->nombre,
            'fecha_limite' => $this->tarea->fecha_limite,
            'descripcion' => $this->tarea->descripcion,
            'tipo_tarea' => $this->tarea->tipo_tarea,
            'usuario_id'=> $this->tarea->usuario_id,
            'time' => Carbon::now()->diffForHumans()
        ];
    }
}
