<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notificacion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tarea)
    {
        $this->tarea = $tarea;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Has recibido una nueva tarea.')
                    ->line('La tarea es: ' . $this->tarea)
                    ->action('Ver', url('/'))
                    ->line('Gracias por enviar!');
    }

    // Notificaciones en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'tarea' => $this->tarea
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
