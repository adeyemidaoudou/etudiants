<?php

namespace App\Http\Controllers;

use App\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $dossier = Dossier::where('user_id', Auth::user()->id)->first();
        // return dd($dossier);
        return view('etudiants.index' , ['dossier' =>$dossier]);
    }

    public function tousDossiers(){
        $dossiers = Dossier::all();
        return view('promoteurs.index', ['dossiers'=>$dossiers]);
    }

    public function dossiersSelecionnes(){
        $dossiers = Dossier::where('statut_selection', true)->get();
        // return dd($dossier);
        return view('agents.index' , ['dossiers' =>$dossiers]);
    }

    public function dossiersValides(){
        $dossiers = Dossier::where('statut_validation', true)->get();
        // return dd($dossier);
        return view('agents.valides' , ['dossiers' =>$dossiers]);
    }



    public function selection($id){
        $dossier = Dossier::find($id);

        if($dossier->statut_selection == true){
            $dossier->statut_selection = false;
        }
        else{
            $dossier->statut_selection = true;
        }

        $dossier->save();

        return redirect()->route('dossiers.tout');
    }

    public function validation($id){
        $dossier = Dossier::find($id);

        if($dossier->statut_validation == true){
            $dossier->statut_validation = false;
        }
        else{
            $dossier->statut_validation = true;
        }

        $dossier->save();

        return redirect()->route('dossiers.tout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $dossier = new Dossier();
        $dossier->civilite = $request->civilite;
        $dossier->nom = $request->nom;
        $dossier->prenom = $request->prenom;
        $dossier->telephone = $request->telephone;
        $dossier->sexe = $request->sexe;
        $dossier->date_naissance = $request->date_naissance;
        $dossier->niveau_etude = $request->niveau_etude;
        $dossier->filiere = $request->filiere;
        $dossier->etablissement = $request->etablissement;

        if($dossier->proces_verbal) $dossier->proces_verbal = $this->fileUpload($request,'proces_verbal', $request->proces_verbal);//ce champ est obligatoire

        if($dossier->marquette)$dossier->marquette = $this->fileUpload($request,'marquette', $request->marquette);//ce champ est obligatoire

        if($dossier->diplome)$dossier->diplome = $this->fileUpload($request,'diplome', $request->diplome);//ce champ est obligatoire

        if($dossier->releve_s1) $dossier->releve_s1 = $this->fileUpload($request,'releve_s1', $request->releve_s1);//ce champ est obligatoire
        if($dossier->releve_s2) $dossier->releve_s2 = $this->fileUpload($request,'releve_s2', $request->releve_s2);//ce champ est obligatoire
        if($dossier->releve_s3) $dossier->releve_s3 = $this->fileUpload($request,'releve_s3', $request->releve_s3);//ce champ est obligatoire
        if($dossier->releve_s4) $dossier->releve_s4 = $this->fileUpload($request,'releve_s4', $request->releve_s4);//ce champ est obligatoire
        if($dossier->releve_s5) $dossier->releve_s5 = $this->fileUpload($request,'releve_s5', $request->releve_s5);//ce champ est obligatoire
        if($dossier->releve_s6) $dossier->releve_s6 = $this->fileUpload($request,'releve_s6', $request->releve_s6);//ce champ est obligatoire

        if($dossier->releve_m1) $dossier->releve_m1 = $this->fileUpload($request,'releve_m1', $request->releve_m1);//ce champ est obligatoire
        if($dossier->releve_m2)  $dossier->releve_m2 = $this->fileUpload($request,'releve_m2', $request->releve_m2);//ce champ est obligatoire
        if($dossier->releve_m3)  $dossier->releve_m3 = $this->fileUpload($request,'releve_m3', $request->releve_m3);//ce champ est obligatoire
        if($dossier->releve_m4)  $dossier->releve_m4 = $this->fileUpload($request,'releve_m4', $request->releve_m4);//ce champ est obligatoire

        $dossier->user_id = Auth::user()->id;
        $dossier->save();

        return view('etudiants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fileUpload(Request $request,$nameForm ,$nameFormFile) {
        /* $this->validate($request, [
             $nameForm => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);*/

        //if ($request->hasFile( ''.$nameForm.'' )) // on vérifie si le champ est dans la requête envoyée
        //{

        $randomString = Str::random(10);
        $image = $nameFormFile; // $request->file(''.$nameForm.''); // on recupère le fichier depuis la requête
        $name = time().$randomString .'.'.$image->getClientOriginalExtension(); // on renomme le fichier image
        $destinationPath = public_path('/files/etudiants'); // on crée le chemin où on veut sauvegarder les images
        // URL::to('');
        if($image->move($destinationPath, $name)) // on déplace les images sur le serveur
            return $name ; // on renvoie le nom de l'image créée

        return 'not moving.jpg';
        //  }
    }
}
