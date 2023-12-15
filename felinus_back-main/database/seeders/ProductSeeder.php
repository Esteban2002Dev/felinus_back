<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\productos;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'email' => 'edwin@gmail.com',
        //     'password' => bcrypt('edwin'),
        //     'nombre' => 'edwin alfredo',
        //     'ap_paterno' => 'juarez',
        //     'ap_materno' => 'ariaz',
        //     'rol' => 'admin',
        // ]);
        //
        productos::create([
            'nombre' => 'Real madrid',
            'descripcion' => 'Uniforme completo',
            'precio' => 300,
            'imagen' => 'https://http2.mlstatic.com/D_NQ_NP_921098-MLM51898973501_102022-O.webp'
        ]);
        productos::create([
            'nombre' => 'Mexico',
            'descripcion' => 'Uniforme completo',
            'precio' => 300,
            'imagen' => 'https://http2.mlstatic.com/D_NQ_NP_921098-MLM51898973501_102022-O.webp'
        ]);
        productos::create([
            'nombre' => 'Barcelona',
            'descripcion' => 'Uniforme completo',
            'precio' => 300,
            'imagen' => 'https://http2.mlstatic.com/D_NQ_NP_921098-MLM51898973501_102022-O.webp'
        ]);
        productos::create([
            'nombre' => 'Argentina',
            'descripcion' => 'Uniforme completo',
            'precio' => 300,
            'imagen' => 'https://http2.mlstatic.com/D_NQ_NP_921098-MLM51898973501_102022-O.webp'
        ]);
    }
}
