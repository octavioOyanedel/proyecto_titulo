<?php

namespace App\Exports;

use App\Prestamo;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrestamoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestamo::all();
    }
}
