<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'name',
        'date',
        'start_time',
        'end_time',
        'location',
        'address',
        'google_maps_url',
        'description',
        'is_active',
        'is_main_agenda',
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
        'is_main_agenda' => 'boolean',
    ];
}
