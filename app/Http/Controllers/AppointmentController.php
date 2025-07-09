<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
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

}