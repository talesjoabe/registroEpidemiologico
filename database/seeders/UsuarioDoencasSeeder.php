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
        # Doenca 1
        usuario_doencas::create([
            'usuario_id' => 2,
            'doenca_id' => 1,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 3,
            'doenca_id' => 1,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 4,
            'doenca_id' => 1,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 5,
            'doenca_id' => 1,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 6,
            'doenca_id' => 1,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 9,
            'doenca_id' => 1,
            'status' => 1,
        ]);

        # Doenca 2
        usuario_doencas::create([
            'usuario_id' => 2,
            'doenca_id' => 2,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 5,
            'doenca_id' => 2,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 7,
            'doenca_id' => 2,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 8,
            'doenca_id' => 2,
            'status' => 1,
        ]);

        # Doenca 3
        usuario_doencas::create([
            'usuario_id' => 8,
            'doenca_id' => 3,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 9,
            'doenca_id' => 3,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 7,
            'doenca_id' => 3,
            'status' => 1,
        ]);

        # Doencca 4
        usuario_doencas::create([
            'usuario_id' => 5,
            'doenca_id' => 4,
            'status' => 1,
        ]);
        usuario_doencas::create([
            'usuario_id' => 6,
            'doenca_id' => 4,
            'status' => 1,
        ]);
    }
}
