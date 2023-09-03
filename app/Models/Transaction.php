<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'invoice',
        'order_id',
        'transaction_id',
        'doctor_id',
        'patient_id',
        'amount',
        'ratio',
        'doctor',
        'owner',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
