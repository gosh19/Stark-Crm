<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCaseToDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datos', function (Blueprint $table) {
            $table->dropColumn('vendido');
            $table->string('case', 100)->nullable()->after('vendido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datos', function (Blueprint $table) {
            $table->dropColumn('case');
        });
    }
}
