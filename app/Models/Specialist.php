<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
    protected $table = 'specialists';
    protected $fillable  = ['title', 'description', 'status', 'category_id', 'order', 'image'];
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
