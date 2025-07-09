<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
$appointments = Appointment::where('user_id', Auth::id())
            ->orderBy('date_time', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact('appointments'));
    }
}
