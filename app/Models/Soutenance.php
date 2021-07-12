<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Salle;
use App\Models\Jury;
use App\Models\Etudiant;
class Soutenance extends Model
{
    //

    protected $fillable=[
       
        'salle_id',
        'etudiant_id',
        'num_insc',
        'date_soutenance', 
        'heure_soutenance' 
        
    ];

    protected $dates =[ 
    'date_soutenance', 
    'heure_soutenance' 
];


public function setjuryAttribute($jury){
    $this->attributes['jury']= json_encode($jury);  
}

public function setdate_soutenanceAttribute($date_soutenance){
    $this->attributes['date_soutenance']= json_encode($date_soutenance);  
}

public function setheure_soutenanceAttribute($heure_soutenance){
    $this->attributes['heure_soutenance']= json_encode($heure_soutenance);  
}
   

        public function salle(){
           
                return $this->belongsTo(Salle::class);
        }

        public function etudiant()
        {
            return $this->belongsTo(Etudiant::class);
        }

        public function juries()
        {
            return $this->belongsToMany(Jury::class); 
        }
}
