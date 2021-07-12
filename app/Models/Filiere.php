<?php

namespace App\Models;
use\App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    //
    protected $fillable=['lib_filiere'];

    public function etudiant(){
        return $this->hasMany(Etudiant::class);
    }
}
