<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_type',
        'duration',
        'date',
        'appointment_id',
        'status',
    ];
    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
    public function durationName()
    {
        return $this->belongsTo(Duration::class, 'duration');
    }
}
