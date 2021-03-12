<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrador']);
        $role->syncPermissions(Permission::all());
        $user = User::create([
            'name' => 'Administrador',
            'cpf' => '76419319013',
            'sexo' => 'outro',
            'data_de_nascimento' => '1996-02-15',
            'municipio_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        $user->syncRoles($role);
    }
}
