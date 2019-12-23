<?php

use Illuminate\Database\Seeder;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Sede::create(['nombre' => 'Casa Central']);
        App\Sede::create(['nombre' => 'Instituto de Estadística']);
        App\Sede::create(['nombre' => 'Edificio Monseñor Gimpert']);
        App\Sede::create(['nombre' => 'FIN - Facultad de Ingeniería']);
        App\Sede::create(['nombre' => 'IBC - Edificio Isabel Brown Caces']);
        App\Sede::create(['nombre' => 'IMA - Instituto de Matemáticas']);
        App\Sede::create(['nombre' => 'Instituto y Conservatorio de Música']);
        App\Sede::create(['nombre' => 'Escuela de Arquitectura y Diseño']);
        App\Sede::create(['nombre' => 'Escuela de Ciencias del Mar']);
        App\Sede::create(['nombre' => 'Escuela de Alimentos']);
        App\Sede::create(['nombre' => 'Instituto de Historia']);
        App\Sede::create(['nombre' => 'Escuela de Agronomía']);
        App\Sede::create(['nombre' => 'Instituto de Arte']);
        App\Sede::create(['nombre' => 'Escuela de Ingeniería Mecánica']);
        App\Sede::create(['nombre' => 'Escuela de Ingeniería Bioquímica']);
        App\Sede::create(['nombre' => 'Campus Sausalito']);
        App\Sede::create(['nombre' => 'Campus Curauma']);
        App\Sede::create(['nombre' => 'Escuela de Ingeniería Química']);
        App\Sede::create(['nombre' => 'Centro de Estudio Avanzados y Extensión']);
        App\Sede::create(['nombre' => 'CFT - Centro de Formación Técnica']);
        App\Sede::create(['nombre' => 'Ediciones Universitarias']);
        App\Sede::create(['nombre' => 'Facultad de Ciencias Agronómicas y de los Alimentos']);
    }
}
