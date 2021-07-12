<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Jury_soutenance extends Model
{
    //
    protected $fillable = [
        'jury',
        'soutenance_id',
        'heure_soutenance',
        'date_soutenance'
    ];


    protected $table = 'jury_soutenance';
}
