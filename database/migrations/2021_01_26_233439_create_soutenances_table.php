<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoutenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutenances', function (Blueprint $table) {
            $table->id();  
            $table->date('date_soutenance');  
            $table->time('heure_soutenance');          
            // $table->foreignId('salle_id')->constrained()->onDelete('cascade');
            // $table->foreignId('jury_id')->constrained()->onDelete('cascade');
            // $table->foreignId('etudiant_id')->references('id')->constrained()->onDelete('cascade');              
            $table->string('num_insc'); 
            $table->unsignedInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('salle_id');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade')->onUpdate('cascade');
           
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
        Schema::dropIfExists('soutenances');
    }
}
