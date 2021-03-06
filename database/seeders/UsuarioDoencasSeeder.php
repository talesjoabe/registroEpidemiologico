<?php

namespace Database\Seeders;

use App\Models\usuario_doenca;
use App\Models\usuario_doencas;
use Illuminate\Database\Seeder;

class UsuarioDoencasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        usuario_doencas::create([
            'usuario_id' => 2,
            'doenca_id' => 1,
            'status' => 1,
        ]);
    }
}
