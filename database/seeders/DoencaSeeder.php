<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\doencas;

class DoencaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        doencas::create([
            'cid' => 'G12',
            'nome' => 'Doença 1',
        ]);

        doencas::create([
            'cid' => 'G13',
            'nome' => 'Doença 2',
        ]);

        doencas::create([
            'cid' => 'G14',
            'nome' => 'Doença 3',
        ]);

        doencas::create([
            'cid' => 'G15',
            'nome' => 'Doença 4',
        ]);
    }
}
