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
            $table->foreignId('salle_id')->constrained()->onDelete('cascade');
            // $table->foreignId('jury_id')->constrained()->onDelete('cascade');
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');              
            $table->string('num_insc'); 
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
