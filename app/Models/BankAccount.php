<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'bank_name',
        'image',
        'bank_account_name',
        'account_number',
        'is_active',
    ];

    protected static function booted()
    {
        static::updating(function ($bankAccount) {
            if ($bankAccount->isDirty('image') && $bankAccount->getOriginal('image')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($bankAccount->getOriginal('image'));
            }
        });

        static::deleted(function ($bankAccount) {
            if ($bankAccount->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($bankAccount->image);
            }
        });
    }
}
