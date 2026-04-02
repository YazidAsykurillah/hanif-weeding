<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot check: Bots will fill this hidden field
        if ($request->filled('hp_website')) {
            return redirect()->back()->with('success', 'Thank you for your RSVP!');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'is_attending' => 'required|in:yes,no',
        ]);

        Rsvp::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone_number' => $validated['phone_number'],
            'is_attending' => $validated['is_attending'] === 'yes',
        ]);

        return redirect()->back()->with('success', 'Thank you for your RSVP!');
    }
}
