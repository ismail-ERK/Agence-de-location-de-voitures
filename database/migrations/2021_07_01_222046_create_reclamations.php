<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();

           $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           $table->string('objet');
           $table->text('data');      
           $table->String('latitude')->nullable();
           $table->String('longitude')->nullable();     
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
        Schema::dropIfExists('reclamations');
    }
}
