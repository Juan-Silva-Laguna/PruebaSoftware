<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementosListasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elementos_listas')->insert([
            'nombre' => 'CC',
            'tipos_listas_id' => 1
        ]);

        DB::table('elementos_listas')->insert([
            'nombre' => 'TI',
            'tipos_listas_id' => 1
        ]);

        DB::table('elementos_listas')->insert([
            'nombre' => 'NIT',
            'tipos_listas_id' => 1
        ]);

        DB::table('elementos_listas')->insert([
            'nombre' => 'Paciente',
            'tipos_listas_id' => 2
        ]);

        DB::table('elementos_listas')->insert([
            'nombre' => 'Empleado',
            'tipos_listas_id' => 2
        ]);

        DB::table('elementos_listas')->insert([
            'nombre' => 'Contratista',
            'tipos_listas_id' => 2
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Otro',
            'tipos_listas_id' => 2
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Huila',
            'tipos_listas_id' => 3
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Tolima',
            'tipos_listas_id' => 3
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Ibague',
            'tipos_listas_id' => 4
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Neiva',
            'tipos_listas_id' => 4
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Espinal',
            'tipos_listas_id' => 4
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Pitalito',
            'tipos_listas_id' => 4
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Gran Contribuyente',
            'tipos_listas_id' => 5
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Responsable Iva',
            'tipos_listas_id' => 5
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Regimen Especial',
            'tipos_listas_id' => 5
        ]);
        DB::table('elementos_listas')->insert([
            'nombre' => 'Otro',
            'tipos_listas_id' => 5
        ]);

    }
}
