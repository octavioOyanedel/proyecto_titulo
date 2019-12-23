<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(TiposRegistroContableTableSeeder::class);
        $this->call(TiposCuentaTableSeeder::class);
        $this->call(BancosTableSeeder::class);
        $this->call(ComunasTableSeeder::class);
        $this->call(SedesTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(EstadosSocioTableSeeder::class);
        $this->call(NacionalidadesTableSeeder::class);
        $this->call(ParentescosTableSeeder::class);
        $this->call(CiudadesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(EstadosGradoAcademicoTableSeeder::class);
        $this->call(GradosAcademicosTableSeeder::class);
        //$this->call(InstitucionesTableSeeder::class);
        //$this->call(TitulosTableSeeder::class);
        $this->call(InteresesTableSeeder::class);
        $this->call(FormasPagoTableSeeder::class);
        $this->call(EstadosDeudaTableSeeder::class);
        $this->call(CuentasTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(SociosTableSeeder::class);
        //$this->call(CargasFamiliaresTableSeeder::class);
        //$this->call(PrestamosTableSeeder::class);
        //$this->call(CuotasTableSeeder::class);
        //$this->call(EstudiosRealizadosTableSeeder::class);
        $this->call(AsociadosTableSeeder::class);
        $this->call(ConceptosTableSeeder::class);
        //$this->call(RegistrosContablesTableSeeder::class);
        //$this->call(EstudiosRealizadosSociosTableSeeder::class);
        //$this->call(GradosAcademicosInstitucionesTableSeeder::class);
        //$this->call(GradosAcademicosTitulosTableSeeder::class);
        //$this->call(InstitucionesTitulosTableSeeder::class);
    }
}
