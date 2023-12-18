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
            'nombre' => 'camisa de los tigres',
            'descripcion' => 'Playera oficial de los tigres de gdl',
            'precio' => 780,
            'imagen' => 'https://imgs.search.brave.com/hZdF0yMnPjkA8u9SV-UvvR9alAuUqMSSNOwBRgLkM00/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9odHRw/Mi5tbHN0YXRpYy5j/b20vRF9OUV9OUF83/NjA1ODktTUxCNTQ5/MTI2MjM4MTBfMDQy/MDIzLVcud2VicA'
        ]);
        productos::create([
            'nombre' => 'Playera de la seleccion mexicana',
            'descripcion' => 'Playera de la seleccion mexicana 2021',
            'precio' => 1024,
            'imagen' => 'https://imgs.search.brave.com/G0tWYzoruaaS9sg48ENpzTbHuU1vhLVnFxD2ERAj7I8/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9odHRw/Mi5tbHN0YXRpYy5j/b20vRF9OUV9OUF84/NDU5MTctTUxNNzA2/NTQxMDg3OTZfMDcy/MDIzLVcud2VicA'
        ]);
        productos::create([
            'nombre' => 'Playera del fc Barcelona',
            'descripcion' => 'Playera clasica del barcelona 2020',
            'precio' => 2048,
            'imagen' => 'https://imgs.search.brave.com/UHVXPxLSJLQfGgGq_Pds4aTMUcbLZaquDRCbTASskDA/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9zdG9y/ZS5mY2JhcmNlbG9u/YS5jb20vY2RuL3No/b3AvZmlsZXMvMjQx/MDBDV0ZfMS5qcGc_/dj0xNjg2ODAyNTM0/JndpZHRoPTE5NDY'
        ]);
    }
}
