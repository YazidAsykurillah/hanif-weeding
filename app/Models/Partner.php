<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'type',
        'full_name',
        'nickname',
        'father_name',
        'mother_name',
        'address',
        'image',
    ];

    protected static function booted()
    {
        static::updating(function ($partner) {
            if ($partner->isDirty('image') && $partner->getOriginal('image')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($partner->getOriginal('image'));
            }
        });

        static::deleted(function ($partner) {
            if ($partner->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($partner->image);
            }
        });
    }
}
