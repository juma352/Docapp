<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_name',
        'appointment_date',
        'notes',
        'reminder_sent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
