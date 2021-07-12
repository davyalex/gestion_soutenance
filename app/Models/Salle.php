<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Soutenance;
class Salle extends Model
{
    //
    protected $fillable=[
        'lib_salle'
    ];

    public function soutenance()
    {
        return $this->hasMany(Soutenance::class);
    }
}
