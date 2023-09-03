<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable  = ['title', 'description', 'status', 'order', 'image'];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
