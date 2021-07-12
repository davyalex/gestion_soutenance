<?php

namespace App\Models;
use\App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;

class Anneescolaire extends Model
{
    //
    protected $fillable=['lib_anneescolaire'];
        
    public function etudiant(){
        return $this->hasMany(Etudiant::class);
    }
}
