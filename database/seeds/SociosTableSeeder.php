<?php

use Illuminate\Database\Seeder;

class SociosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Socio::class, 500)->create();
        App\Socio::create([
            'rut' => '111111111',
            'nombre1' => 'Bob',
            'nombre2' => null,
            'apellido1' => 'Esponja',
            'apellido2' => null,        
            'genero' => 'Varón',
            'fecha_nac' => '1980-09-18',
            'celular' => 88888888,
            'correo' => 'bob.esponja@uwu.cl',
            'direccion' => 'Fondo de bikini 666',
            'fecha_pucv' => '2005-01-01',
            'anexo' => 6666,
            'numero_socio' => 123,
            'fecha_sind1' => '2007-01-01',
            'comuna_id' => 6,
            'ciudad_id' => 32,
            'sede_id' => 1,
            'area_id' => 1,
            'cargo_id' => 7,
            'estado_socio_id' => 1,
            'nacionalidad_id' => 1
        ]);      
        App\Socio::create([
            'rut' => '22222222',
            'nombre1' => 'Calamardo',
            'nombre2' => null,
            'apellido1' => 'Tentáculos',
            'apellido2' => null,        
            'genero' => 'Varón',
            'fecha_nac' => '1970-09-18',
            'celular' => 99999999,
            'correo' => 'calamardo@uwu.cl',
            'direccion' => 'Fondo de bikini 667',
            'fecha_pucv' => '1990-01-01',
            'anexo' => 6666,
            'numero_socio' => 321,
            'fecha_sind1' => '1991-01-01',
            'comuna_id' => 6,
            'ciudad_id' => 32,
            'sede_id' => 1,
            'area_id' => 1,
            'cargo_id' => 1,
            'estado_socio_id' => 1,
            'nacionalidad_id' => 3
        ]); 
        App\Socio::create([
            'rut' => '138816389',
            'nombre1' => 'Octavio',
            'nombre2' => 'Andrés',
            'apellido1' => 'Oyanedel',
            'apellido2' => 'Alarcón',        
            'genero' => 'Varón',
            'fecha_nac' => '1980-09-18',
            'celular' => 971254626,
            'correo' => 'octavio.oyanedel@gmail.com',
            'direccion' => 'Beaucheff',
            'fecha_pucv' => '2005-01-01',
            'anexo' => 2092,
            'numero_socio' => 7,
            'fecha_sind1' => '2007-01-01',
            'comuna_id' => 6,
            'ciudad_id' => 32,
            'sede_id' => 1,
            'area_id' => 1,
            'cargo_id' => 1,
            'estado_socio_id' => 1,
            'nacionalidad_id' => 3
        ]); 
    }
}
