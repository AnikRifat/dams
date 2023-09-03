<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'item_id', 'type', 'status', 'phone', 'payment_type', 'price',
        'transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'item_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'item_id');
    }
    public function item()
    {
        return $this->morphTo();
    }
}
