<?php

namespace App\Notifications;

// use Ichtrojan\Otp\Otp as OtpOtp;

//use Ichtrojan\Otp\Models\Otp as ModelsOtp;
//use Ichtrojan\Otp\Otp as OtpOtp;
use Ichtrojan\Otp\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class otpverection extends Notification
{
    use Queueable;

public $subject;

public $formEailer;
  private $otp;
    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //

        // 
          $this->otp=new Otp();
     
$this->subject="the subject";

$this->formEailer="mostafa@mohme.com";

// $this->otp=new OtpOtp;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail( $notifiable)
    {
          $otp1=$this->otp->generate($notifiable->email, 'numeric');
        // OtpOtp::generate($notifiable->email, 4,  15);
        return (new MailMessage)
        ->subject($this->subject)
    ->from($this->formEailer, 'Sender')
    ->greeting('Hello!'.$notifiable->email)
    ->line('Your order status has been updated')
    ->action('Check it out', url('/'))
    ->line('code:'.$otp1->token);
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
