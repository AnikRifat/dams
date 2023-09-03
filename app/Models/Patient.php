<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = "patient_information";
    protected $fillable = [
        'user_id',
        'image',
        'file',
        'address',
        'birthday',
        'current_department',
        'current_class',
        'current_school'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
