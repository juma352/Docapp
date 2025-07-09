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
            'doctor_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'doctor_name' => $request->doctor_name,
            'appointment_date' => $request->appointment_date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }
}
