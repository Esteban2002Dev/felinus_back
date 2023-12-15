<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'rol' => 'admin',
        ]);
        User::create([
            'email' => 'esteban@gmail.com',
            'password' => bcrypt('esteban'),
            'nombre' => 'esteban',
            'ap_paterno' => 'lopez',
            'ap_materno' => 'ariarios',
            'rol' => 'asesor',
        ]);
        User::create([
            'email' => 'thomas@gmail.com',
            'password' => bcrypt('thomas'),
            'nombre' => 'Thomas',
            'ap_paterno' => 'revilla',
            'ap_materno' => 'gonzalez',
            'rol' => 'jefeProd',
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
