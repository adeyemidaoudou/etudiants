<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    //

    protected $fillable =[ 'civilite', 'nom', 'prenom', 'telephone', 'sexe', 'date_naissance', 'niveau_etude', 'proces_verbal', 'marquette',
        'diplome', 'filiere', 'etablissement', 'releve_s1', 'releve_s2', 'releve_s3', 'releve_s4', 'releve_s5', 'releve_s6',
        'releve_m1', 'releve_m2' , 'releve_m3' ,'releve_m4', 'statut_selection' , 'statut_validation' ,'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
