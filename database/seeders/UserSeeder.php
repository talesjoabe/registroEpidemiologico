<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tales Costa',
            'cpf' => '76419319013',
            'data_de_nascimento' => '1996-02-15',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Usuario 1',
            'cpf' => '84211510029',
            'data_de_nascimento' => '1964-02-15',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Usuario 2',
            'cpf' => '49498668000',
            'data_de_nascimento' => '1950-02-15',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);
    }
}
