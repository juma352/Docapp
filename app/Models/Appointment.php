<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_name',
        'patient_phone',
        'doctor_name',
        'appointment_type',
        'date_time',
        'notes',
        'channel',
        'reminded',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
