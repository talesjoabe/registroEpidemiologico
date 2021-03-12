<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create doencas']);
        Permission::create(['name' => 'view doencas']);
        Permission::create(['name' => 'update doencas']);
        Permission::create(['name' => 'delete doencas']);

        Permission::create(['name' => 'create estados']);
        Permission::create(['name' => 'view estados']);
        Permission::create(['name' => 'update estados']);
        Permission::create(['name' => 'delete estados']);

        Permission::create(['name' => 'create municipios']);
        Permission::create(['name' => 'view municipios']);
        Permission::create(['name' => 'update municipios']);
        Permission::create(['name' => 'delete municipios']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'create usuario_doencas']);
        Permission::create(['name' => 'view usuario_doencas']);
        Permission::create(['name' => 'update usuario_doencas']);
        Permission::create(['name' => 'delete usuario_doencas']);

        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
    }
}
