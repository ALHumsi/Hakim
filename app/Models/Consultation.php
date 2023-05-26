<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'patient_message',
        'doctor_response',
    ];

    public function appointment()
    {
        return $this->belongs(Appointment::class, 'appointment_id', 'id');
    }
}
