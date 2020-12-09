<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_datos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dato_id');
            $table->unsignedBigInteger('user_id');
            $table->string('case', 100)->nullable();
            $table->timestamps();

            $table->foreign('dato_id')->references('id')->on('datos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historia_datos');
    }
}
