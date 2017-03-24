<?php

namespace App;
use App\Matiere;
use Illuminate\Database\Eloquent\Model;


class Prof extends Model
{
  protected $fillable=array('nom','prenom','age','mail');

public function matieres(){
	
	return $this->hasMany(Matiere::class,'id_prof');
}
}
