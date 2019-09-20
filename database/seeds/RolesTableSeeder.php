<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rol::create(['nombre' => 'Administrador']);
        App\Rol::create(['nombre' => 'Usuario']);
        App\Rol::create(['nombre' => 'Invitado']);
    }
}
