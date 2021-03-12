<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf',11)->unique();
            $table->set('sexo',['masculino', 'feminino', 'outro']);
            $table->date('data_de_nascimento');
            $table->string('password');
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
