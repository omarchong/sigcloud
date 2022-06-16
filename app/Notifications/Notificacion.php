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
                    ->line('Has recibido una nueva tarea.')
                    ->line('La tarea es: ')
                    ->action('Ver', url('/'))
                    ->line('Gracias por enviar!');
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
            'id' => $this->tarea->id,
            'nombre' => $this->tarea->nombre,
            'descripcion' => $this->tarea->descripcion,
            'tipo_tarea' => $this->tarea->tipo_tarea,
            'usuario_id'=> $this->tarea->usuario_id,
            'time' => Carbon::now()->diffForHumans()
        ];
    }
}
