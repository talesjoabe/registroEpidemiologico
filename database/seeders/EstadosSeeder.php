<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\estados;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estados::create([
            'sigla' => 'RN',
            'nome' => 'Rio Grande do Norte',
        ]);
    }
}
