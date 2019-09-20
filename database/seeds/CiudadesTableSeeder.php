<?php

use Illuminate\Database\Seeder;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Ciudad::create(['nombre' => 'Calle Larga', 'comuna_id' =>1]);
        App\Ciudad::create(['nombre' => 'Los Andes', 'comuna_id' =>1]);
        App\Ciudad::create(['nombre' => 'Rinconada', 'comuna_id' =>1]);
        App\Ciudad::create(['nombre' => 'San Esteban', 'comuna_id' =>1]);
        App\Ciudad::create(['nombre' => 'Cabildo', 'comuna_id' =>2]);
        App\Ciudad::create(['nombre' => 'La Ligua', 'comuna_id' =>2]);
        App\Ciudad::create(['nombre' => 'Papudo', 'comuna_id' =>2]);
        App\Ciudad::create(['nombre' => 'Petorca', 'comuna_id' =>2]);
        App\Ciudad::create(['nombre' => 'Zapallar', 'comuna_id' =>2]);
        App\Ciudad::create(['nombre' => 'Hijuelas', 'comuna_id' =>3]);
        App\Ciudad::create(['nombre' => 'La Calera', 'comuna_id' =>3]);
        App\Ciudad::create(['nombre' => 'La Cruz', 'comuna_id' =>3]);
        App\Ciudad::create(['nombre' => 'Nogales', 'comuna_id' =>3]);
        App\Ciudad::create(['nombre' => 'Quillota', 'comuna_id' =>3]);
        App\Ciudad::create(['nombre' => 'Algarrobo', 'comuna_id' =>4]);
        App\Ciudad::create(['nombre' => 'Cartagena', 'comuna_id' =>4]);
        App\Ciudad::create(['nombre' => 'El Quisco', 'comuna_id' =>4]);
        App\Ciudad::create(['nombre' => 'El Tabo', 'comuna_id' =>4]);
        App\Ciudad::create(['nombre' => 'San Antonio', 'comuna_id' =>4]);
        App\Ciudad::create(['nombre' => 'Santo Domingo', 'comuna_id' =>4]);
        App\Ciudad::create(['nombre' => 'Catemu', 'comuna_id' =>5]);
        App\Ciudad::create(['nombre' => 'Llay-Llay', 'comuna_id' =>5]);
        App\Ciudad::create(['nombre' => 'Panquehue', 'comuna_id' =>5]);
        App\Ciudad::create(['nombre' => 'Putaendo', 'comuna_id' =>5]);
        App\Ciudad::create(['nombre' => 'San Felipe', 'comuna_id' =>5]);
        App\Ciudad::create(['nombre' => 'Santa María', 'comuna_id' =>5]);
        App\Ciudad::create(['nombre' => 'Casablanca', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Concón', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Juan Fernández', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Puchuncaví', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Quintero', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Valparaíso', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Viña del Mar', 'comuna_id' =>6]);
        App\Ciudad::create(['nombre' => 'Limache', 'comuna_id' =>7]);
        App\Ciudad::create(['nombre' => 'Olmué', 'comuna_id' =>7]);
        App\Ciudad::create(['nombre' => 'Quilpué', 'comuna_id' =>7]);
        App\Ciudad::create(['nombre' => 'Villa Alemana', 'comuna_id' =>7]);
    }
}
