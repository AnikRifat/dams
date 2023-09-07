<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctor_information";
    protected $fillable = [
        'user_id',
        'image',
        'file',
        'address',
        'birthday',
        'profession', 'specialist'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'creator_id', 'user_id');
    }
    public function specialists()
    {
        return $this->belongsTo(Specialist::class, 'specialist');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
