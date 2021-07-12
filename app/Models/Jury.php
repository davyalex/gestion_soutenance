<?php

namespace App\Models;
use App\Models\Departement;
use App\Models\Specialite;
use App\Models\Soutenance;

use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    //
    protected $fillable=[
        'nom','prenom','email','contact','specialite_id','departement_id'
    ];

   
  public function specialite()
  {
      return $this->belongsTo(Specialite::class);
  }
  public function departement()
  {
      return $this->belongsTo(Departement::class);
  }

  public function soutenances()  
  {
      return $this->belongsToMany(Soutenance::class);
  }
}
