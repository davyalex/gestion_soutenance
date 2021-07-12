<?php

namespace App\Models;
use\App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    //
    protected $fillable=[
        'lib_niveau'
    ];

    public function etudiant(){
        return $this->hasMany(Etudiant::class);
    }
}
