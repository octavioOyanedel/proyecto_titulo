<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'nombre1' => 'Octavio',
            'nombre2' => 'Andrés',
            'apellido1' => 'Oyanedel',
            'apellido2' => 'Alarcón',
            'email' => 'octavio.oyanedel@pucv.cl',
            'password' => bcrypt('secret'),
            'rol_id' => 1
        ]);

        App\User::create([
            'nombre1' => 'Carolina',
            'nombre2' => null,
            'apellido1' => 'Mena',
            'apellido2' => 'Serrano',
            'email' => 'carolina.mena@pucv.cl',
            'password' => bcrypt('secret'),
            'rol_id' => 2
        ]);

        App\User::create([
            'nombre1' => 'Osvaldo',
            'nombre2' => 'Valentín',
            'apellido1' => 'León',
            'apellido2' => 'montenegro',
            'email' => 'osvaldo.leon@pucv.cl',
            'password' => bcrypt('secret'),
            'rol_id' => 3
        ]);
    }
}
