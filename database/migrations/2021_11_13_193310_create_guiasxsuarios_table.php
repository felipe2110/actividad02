<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasxsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guiasxsuarios', function (Blueprint $table) {
            $table->id();
            $table->biginteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->biginteger('guias_id')->unsigned();
            $table->foreign('guias_id')->references('id')->on('guias');
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
        Schema::dropIfExists('guiasxsuarios');
    }
}
