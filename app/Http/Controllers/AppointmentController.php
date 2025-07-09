<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AppointmentReminder;

class AppointmentController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'doctor_name' => 'required|string|max:255',
            'appointment_type' => 'required|string|max:255',
            'date_time' => 'required|date',
            'notes' => 'nullable|string',
            'channel' => 'required|string|max:50',
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'patient_name' => $request->patient_name,
            'patient_phone' => $request->patient_phone,
            'doctor_name' => $request->doctor_name,
            'appointment_type' => $request->appointment_type,
            'date_time' => $request->date_time,
            'notes' => $request->notes,
            'channel' => $request->channel,
            'reminded' => false,
        ]);

        
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function sendReminder(Request $request, Appointment $appointment)
    {
        $request->validate([
            'channel' => 'required|in:SMS,WhatsApp,Email',
        ]);

        // Actual sending logic here
        Notification::route('mail', 'doctor@example.com') // Replace with dynamic email
            ->notify(new AppointmentReminder($appointment, 'doctor'));

        Notification::route('mail', $appointment->patient_phone . '@gateway.com') // simulate for now
            ->notify(new AppointmentReminder($appointment, 'patient'));

        return redirect()->route('dashboard')->with('success', 'Reminder sent via ' . $request->channel);
    }

    public function previewReminder(Request $request, Appointment $appointment)
    {
        $channel = $request->query('channel', 'SMS');

        // Prepare the message content for preview
        $message = "Reminder for your appointment with Dr. {$appointment->doctor_name} on " .
            \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y h:i A') . ".";

        return view('appointments.preview-reminder', compact('appointment', 'channel', 'message'));
    }
public function edit(Appointment $appointment)
{
    // $this->authorize('update', $appointment); // Optional: add policy
    return view('appointments.edit', compact('appointment'));
}

public function update(Request $request, Appointment $appointment)
{
    $request->validate([
        'patient_name' => 'required',
        'patient_phone' => 'required',
        'doctor_name' => 'required',
        'appointment_type' => 'required',
        'date_time' => 'required|date|after:now',
        'channel' => 'required|in:SMS,WhatsApp,Other',
    ]);

    $appointment->update($request->all());

    return redirect()->route('appointments.index')->with('success', 'Appointment updated.');
}
public function destroy(Appointment $appointment)
{
    // $this->authorize('delete', $appointment); // optional
    $appointment->delete();

    return redirect()->route('appointments.index')->with('success', 'Appointment deleted.');
}


}