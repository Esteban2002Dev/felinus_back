<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'email' => 'edwin@gmail.com',
            'password' => bcrypt('edwin'),
            'nombre' => 'edwin alfredo',
            'ap_paterno' => 'juarez',
            'ap_materno' => 'ariaz',
            'num_telefono' => '951-321-7674',
            'rotullurol' => 'admin',
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
