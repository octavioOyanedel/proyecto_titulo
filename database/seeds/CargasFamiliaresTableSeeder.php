<?php

use Illuminate\Database\Seeder;

class CargasFamiliaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CargaFamiliar::create([
            'rut' => '777777777',
            'nombre1' => 'Bobina',
            'nombre2' => null,
            'apellido1' => 'Esponja',
            'apellido2' => null,        
            'fecha_nac' => '2000-01-01',
            'parentesco_id' => 2,
            'rut_socio' => '111111111'
        ]);
        App\CargaFamiliar::create([
            'rut' => '88888888',
            'nombre1' => 'Celemerde',
            'nombre2' => null,
            'apellido1' => 'Ventosas',
            'apellido2' => null,        
            'fecha_nac' => '1950-07-07',
            'parentesco_id' => 5,
            'rut_socio' => '22222222'
        ]);
        App\CargaFamiliar::create([
            'rut' => '66555222k',
            'nombre1' => 'Pao',
            'nombre2' => null,
            'apellido1' => 'Tentáculos',
            'apellido2' => null,        
            'fecha_nac' => '2010-12-12',
            'parentesco_id' => 1,
            'rut_socio' => '22222222'
        ]);
    }
}
