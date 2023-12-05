<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100000; $i++) {
            \App\Models\Pelanggan::create([
                'id' => now()->format('ymd') . '01' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'nama' => fake()->firstName() .' '.fake()->lastName(),
                'password' => strtolower(Str::random(6))
            ]);
        }
    }
}
