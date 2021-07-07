<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigInteger('id_agence');
            $table->char('num_immatriculation',7);

            $table->foreign('num_immatriculation')->references('num_immatriculation')->on('voitures');
            $table->foreign('id_agence')->references('id_agence')->on('agences');

            $table->date('dateDL');
            $table->date('dateFL');
            $table->timestamps();
            $table->primary(['id_agence','num_immatriculation','dateDL','dateFL']);
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });    }}




