<?php

use Illuminate\Database\Seeder;

class DetallesConceptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\DetalleConcepto::create(['nombre' => 'Préstamo', 'tipo_registro_contable_id' =>1]);
        App\DetalleConcepto::create(['nombre' => 'Cuota Mortuoria', 'tipo_registro_contable_id' =>1]);
        App\DetalleConcepto::create(['nombre' => 'Gestión Sindical', 'tipo_registro_contable_id' =>1]);
        App\DetalleConcepto::create(['nombre' => 'Pago', 'tipo_registro_contable_id' =>1]);
        App\DetalleConcepto::create(['nombre' => 'Remuneración Secretaria', 'tipo_registro_contable_id' =>1]);
        App\DetalleConcepto::create(['nombre' => 'Viáticos Dirigentes', 'tipo_registro_contable_id' =>1]);
        App\DetalleConcepto::create(['nombre' => 'Anticipo Cuota Mortuoria', 'tipo_registro_contable_id' =>2]);
        App\DetalleConcepto::create(['nombre' => 'Transferencia', 'tipo_registro_contable_id' =>2]);
        App\DetalleConcepto::create(['nombre' => 'Reliquidación', 'tipo_registro_contable_id' =>2]);
        App\DetalleConcepto::create(['nombre' => 'Cotización', 'tipo_registro_contable_id' =>2]);
    }
}
