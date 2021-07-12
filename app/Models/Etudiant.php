<?php

namespace App\Models;
use\App\Models\Niveau;
use\App\Models\Filiere;
use\App\Models\Anneescolaire;
use App\Models\Soutenance;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    protected $fillable=[
        'num_insc',
        'nom',
        'prenom',
        'contact',
        'email',
        'files_package',
        'files_scolarite',
        'filiere_id',
        'niveau_id',
        'etat',
        'anneescolaire_id'
    ];

    public function setFilenamesAttribute($value){
        $this->attribute['files_package']= json_encode($value);
        $this->attribute['files_scolarite']= json_encode($value);
     
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    public function anneescolaire()
    {
        return $this->belongsTo(Anneescolaire::class);
    }
    public function soutenance()
    {
        return $this->hasMany(Soutenance::class);
    }
}
