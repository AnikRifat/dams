<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = [
        'website_name',
        'website_logo',
        'website_favicon',
        'website_email',
        'website_phone',
        'website_address',
        'about_content',
        'about_image',
    ];
}
