<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone_number', 'is_attending'];
}
