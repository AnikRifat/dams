<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'price',
        'description',
        'specialist_id',
        'creator_id',
        'duration',
        'image',
        'status'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function durationName()
    {
        return $this->belongsTo(Duration::class, 'duration')->select('timeline');
    }

    public function ppatients()
    {
        return 'dd';
        return $this->belongsToMany(User::class, 'orders', 'item_id', 'user_id')
            ->where('orders.type', Appointment::class);
    }
}
