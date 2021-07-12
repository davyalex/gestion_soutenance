<?php

namespace App\Models;
use App\Models\Jury;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
    protected $fillable=[
        'lib_departement'
    ];

        public function jury()
        {
            return $this->hasMany(Jury::class);
        }
}
