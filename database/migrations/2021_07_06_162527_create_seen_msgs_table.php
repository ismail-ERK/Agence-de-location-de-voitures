<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeenMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seen_msgs', function (Blueprint $table) {
            $table->bigInteger('idUser')->unsigned();
            $table->bigInteger('idMsg')->unsigned();
            $table->boolean('seen');

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idMsg')->references('id')->on('reclamations')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['idUser','idMsg']);
            $table->datetime('deleted_at')->nullable();

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
        Schema::table('seen_msgs', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });     }
}