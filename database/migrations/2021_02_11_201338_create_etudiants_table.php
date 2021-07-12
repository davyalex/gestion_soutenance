<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();     
            $table->string('num_insc')->unique();    
            $table->string('nom');
            $table->string('prenom');
            $table->string('contact')->unique();
            $table->string('email')->unique();
            $table->longText('theme');
            // $table->string('files_package');
            // $table->string('files_scolarite');
            // $table->string('files_memoire');
            $table->integer('etat');
            $table->foreignId('niveau_id')->constrained()->onDelete('cascade');
            $table->foreignId('filiere_id')->constrained()->onDelete('cascade');
            $table->foreignId('anneescolaire_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('etudiants');
    }
}
