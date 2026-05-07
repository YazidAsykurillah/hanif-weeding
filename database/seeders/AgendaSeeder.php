<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Agenda::create([
            'name' => 'Akad Nikah',
            'date' => now()->addMonths(2)->format('Y-m-d'),
            'start_time' => '08:00',
            'end_time' => '10:00',
            'location' => 'Masjid Raya Al-Azhar',
            'address' => 'Jl. Sisingamangaraja No.1, Jakarta Selatan',
            'google_maps_url' => 'https://maps.app.goo.gl/akad-nikah-example',
            'description' => 'Mohon hadir 15 menit sebelum acara dimulai.',
            'is_active' => true,
        ]);

        \App\Models\Agenda::create([
            'name' => 'Resepsi',
            'date' => now()->addMonths(2)->format('Y-m-d'),
            'start_time' => '11:00',
            'end_time' => '14:00',
            'location' => 'Grand Ballroom Hotel Indonesia',
            'address' => 'Jl. M.H. Thamrin No.1, Jakarta Pusat',
            'google_maps_url' => 'https://maps.app.goo.gl/resepsi-example',
            'description' => 'Dress code: Batik / Pakaian Formal.',
            'is_active' => true,
        ]);
    }
}
