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
            'nome' => 'Doença de Lou-Gehrig',
        ]);
    }
}
