<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function etudiantDashboard(){
        return view('etudiants.dashboard');
    }

    public function promoteurDashboard(){
        return view('promoteurs.dashboard');

    }

    public function agentDashboard(){
        return view('agents.dashboard');
    }
}
