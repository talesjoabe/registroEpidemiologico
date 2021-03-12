<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PesquisadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Pesquisador']);

        $user = User::create([
            'name' => 'Pesquisador',
            'cpf' => '84211510029',
            'sexo' => 'outro',
            'data_de_nascimento' => '1964-02-15',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Pesquisador);
    }
}
