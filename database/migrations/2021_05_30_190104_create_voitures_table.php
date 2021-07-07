<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->char('num_immatriculation',7)->primary();
            $table->string('modele');
            $table->string('marque');
            $table->string('categorie');
            $table->string('couleur');
            $table->string('transmission');
            $table->integer('nombre_places');
            $table->integer('nombre_portes');
            $table->integer('nombre_location')->default(0);
            $table->boolean('disponible');
            $table->float('prix_jour');
            $table->bigInteger('id_agence');
            $table->foreign('id_agence')->references('id_agence')->on('agences');
            $table->timestamps();
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
        Schema::table('voitures', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });    }
    }

