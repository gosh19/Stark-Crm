<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender');
            $table->unsignedBigInteger('receiver')->nullable();
            $table->string('asunto', 100)->nullable();
            $table->string('mensaje', 500)->nullable();
            $table->boolean('visto')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
