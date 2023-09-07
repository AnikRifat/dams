<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'sender_id',
        'sender_role',
        'appointment_id',
        'order_id',
        'text',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    /**
     * Get the patient associated with the chat.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the doctor associated with the chat.
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
