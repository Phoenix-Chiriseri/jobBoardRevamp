<?php

namespace App\Notifications;

use App\Models\CreatedJobs;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewJobRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    use Queueable;

    private $new_created_job;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CreatedJobs $new_created_job)
    {
        $this->new_created_job = $new_created_job;
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('New user has registered with email ' . $this->new_created_job->email)
            ->action('Approve user', route('admin.requestedjobs.index', $this->new_created_job->id));
    }

    public function via ($notifiable) {
        return ['mail'];
    }

}
