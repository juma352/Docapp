<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentReminder extends Notification
{
    public $appointment;
    public $recipient; // 'patient' or 'doctor'

    public function __construct($appointment, $recipient)
    {
        $this->appointment = $appointment;
        $this->recipient = $recipient;
    }

    public function via($notifiable)
    {
        return ['mail']; // Later: add 'nexmo', 'whatsapp', etc.
    }

    public function toMail($notifiable)
    {
        $time = \Carbon\Carbon::parse($this->appointment->date_time)->format('M d, Y h:i A');
        
        $message = new MailMessage;
        $message->subject('📅 Appointment Reminder');

        if ($this->recipient === 'patient') {
            $message->greeting("Hello {$this->appointment->patient_name},")
                ->line("This is a reminder for your appointment with Dr. {$this->appointment->doctor_name} on {$time}.")
                ->line("Please arrive 10 minutes early.");
        } else {
            $message->greeting("Hello Dr. {$this->appointment->doctor_name},")
                ->line("You have an upcoming appointment with {$this->appointment->patient_name} on {$time}.")
                ->line("Please review the patient's notes prior to the meeting.");
        }

        return $message;
    }
}
