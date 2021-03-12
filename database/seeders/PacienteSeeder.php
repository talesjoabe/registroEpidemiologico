<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Paciente']);

        $user = User::create([
            'name' => 'Paciente 1',
            'cpf' => '84211510030',
            'sexo' => 'masculino',
            'data_de_nascimento' => '1964-02-15',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 2',
            'cpf' => '84211510040',
            'sexo' => 'masculino',
            'data_de_nascimento' => '1964-03-07',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 3',
            'cpf' => '84211510035',
            'sexo' => 'feminino',
            'data_de_nascimento' => '2000-09-20',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 4',
            'cpf' => '84211510085',
            'data_de_nascimento' => '2006-09-20',
            'municipio_id' => 2,
            'sexo' => 'masculino',
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 5',
            'cpf' => '84211510033',
            'data_de_nascimento' => '2006-01-09',
            'municipio_id' => 2,
            'sexo' => 'masculino',
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 6',
            'cpf' => '84211510024',
            'data_de_nascimento' => '2008-02-27',
            'municipio_id' => 3,
            'sexo' => 'masculino',
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 7',
            'cpf' => '84211510025',
            'sexo' => 'feminino',
            'data_de_nascimento' => '2008-06-01',
            'municipio_id' => 3,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 8',
            'cpf' => '84211510027',
            'sexo' => 'feminino',
            'data_de_nascimento' => '2009-07-03',
            'municipio_id' => 3,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);

        $user = User::create([
            'name' => 'Paciente 8',
            'cpf' => '84211510020',
            'sexo' => 'feminino',
            'data_de_nascimento' => '1993-04-01',
            'municipio_id' => 3,
            'password' => bcrypt('secret'),
        ]);

        $user->roles()->attach($role->Paciente);
    }
}
