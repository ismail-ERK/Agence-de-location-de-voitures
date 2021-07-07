<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->char('num_immatriculation',7);
            $table->foreign('num_immatriculation')->references('num_immatriculation')->on('voitures');
            $table->foreign('id')->references('id')->on('users');
            $table->decimal('value',4,2)->default(0);
            $table->primary(['id','num_immatriculation']);

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
        Schema::dropIfExists('ratings');
    }
}