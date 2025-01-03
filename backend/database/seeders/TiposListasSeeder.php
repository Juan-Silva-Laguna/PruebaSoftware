<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposListasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_listas')->insert([
            'nombre' => 'tipo_identificacion'
        ]);

        DB::table('tipos_listas')->insert([
            'nombre' => 'tipo_tercero'
        ]);

        DB::table('tipos_listas')->insert([
            'nombre' => 'departamento'
        ]);

        DB::table('tipos_listas')->insert([
            'nombre' => 'ciudad'
        ]);

        DB::table('tipos_listas')->insert([
            'nombre' => 'tipo_contribuyente'
        ]);
    }
}
