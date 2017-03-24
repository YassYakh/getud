<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prof;
use App\Etudiant;

class Matiere extends Model
{

	protected $fillable=array('Nom','id_prof');

     public function matieres(){
    	return $this->BelongsToMany(Etudiant::class ,'classes' ,'id_matier','id_etd' )->withPivot('note');
;
    }

    public function profs(){
    	return $this->BelongsTo(Prof::class,'id_prof');
    }
}
