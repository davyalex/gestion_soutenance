<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurySoutenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jury_soutenance', function (Blueprint $table) {
            $table->id();
            $table->date('date_soutenance');
            $table->time('heure_soutenance');
            $table->timestamps();
            $table->unsignedBigInteger('jury_id');
            $table->foreign('jury_id')->references('id')
            ->on('juries')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('soutenance_id');
            $table->foreign('soutenance_id')->references('id')
            ->on('soutenances')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            // $table->date('date_soutenance');
            // $table->time('heure_soutenance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jury_soutenance');
    }
}
