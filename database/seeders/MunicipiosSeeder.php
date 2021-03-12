<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\municipios;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        municipios::create([
            'estado_id' => 1,
            'codigo' => '08003',
            'nome' => 'Mossoró',
        ]);

        municipios::create([
            'estado_id' => 1,
            'codigo' => '08004',
            'nome' => 'Natal',
        ]);

        municipios::create([
            'estado_id' => 2,
            'codigo' => '08005',
            'nome' => 'Fortaleza',
        ]);
    }
}
