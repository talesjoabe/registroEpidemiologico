<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionsSeeder::class);
        $this->call(DoencaSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(AdministradorSeeder::class);
        $this->call(PesquisadorSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(UsuarioDoencasSeeder::class);
    }
}
