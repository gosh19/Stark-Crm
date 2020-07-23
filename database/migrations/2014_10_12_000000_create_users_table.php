<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('rol', 100)->nullable()->default('operario');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new \App\User;
        $user->name = 'Matias Stark';
        $user->email = 'matiascianci@gmail.com';
        $user->rol = 'admin';
        $user->password = Hash::make('Sebastian99');
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
