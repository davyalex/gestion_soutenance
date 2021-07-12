<?php

namespace App\Models;
use App\Models\Jury;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    //
    protected $fillable=[
        'lib_specialite'
    ];

        public function jury()
        {
            return $this->hasMany(Jury::class);
        }
}
