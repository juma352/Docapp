<?php

use Illuminate\Console\Command;
use App\Models\Appointment;
use App\Notifications\AppointmentReminder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class SendAppointmentReminders extends Command
{
    protected $signature = 'appointments:send-reminders';
    protected $description = 'Send reminders for upcoming appointments';

    public function handle()
    {
        $upcoming = Appointment::whereBetween('date_time', [now()->addHours(12), now()->addHours(13)])
            ->where('reminder_sent', false)
            ->get();

        foreach ($upcoming as $appt) {
            // Send to patient
            Notification::route('mail', $appt->patient_phone . '@yourgateway.com') // adapt if using real mail or SMS gateway
                ->notify(new AppointmentReminder($appt, 'patient'));

            // Send to doctor (ideally use doctor email/phone from db later)
            Notification::route('mail', 'doctor@example.com')
                ->notify(new AppointmentReminder($appt, 'doctor'));

            $appt->update(['reminder_sent' => true]);
        }

        $this->info('Reminders sent successfully.');
    }
}
