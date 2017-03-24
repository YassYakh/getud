<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Matiere;

class Etudiant extends Model
{
    protected $fillable=array('nom','prenom','age','mail');


    public function matieres(){
    	return $this->BelongsToMany(Matiere::class ,'classes' ,'id_etd' ,'id_matier')
    	->withPivot('note');
    }
}
