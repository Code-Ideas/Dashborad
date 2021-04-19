<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_name', 'site_description', 'phone', 'email', 'whatsapp', 'facebook', 'youtube',
        'twitter', 'address', 'latitude', 'longitude'];
}
