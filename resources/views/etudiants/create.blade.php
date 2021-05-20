@extends('layouts.etudiants')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-10">
                        <div class="card">
                            <form action="{{route('dossiers.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                            <div class="card-header">
                                <strong>Remplissez le formulaire</strong> Ajoutez vos informations
                            </div>
                            <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Civilité</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="civilite" id="select"  class="form-control">
                                                <option value="1">Monsieur</option>
                                                <option value="2">Madame</option>
                                                <option value="3">Mademoiselle</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nom</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nom" required placeholder="Nom" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Prénoms</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="prenom" required placeholder="Prénoms" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Téléphone</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="" name="telephone"  required placeholder="Téléphone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Sexe</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="sexe" id="sexe" class="form-control">
                                                <option value="1">Homme</option>
                                                <option value="2">Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Date de naissance</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="text-input" required name="date_naissance" placeholder="Date de naissance" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="niveau_etude" class=" form-control-label">Niveau d'étude</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="niveau_etude" id="select" class="form-control">
                                                <option value="1">Licence</option>
                                                <option value="2">Master</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="filiere" class=" form-control-label">Filiere</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="filiere" required name="filiere" placeholder="Filière" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="etablissement" class=" form-control-label">Etablissement</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="etablissement" required name="etablissement" placeholder="Etablissement" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Procès verbal de soutenance</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="proces_verbal" required name="proces_verbal" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="marquette" class=" form-control-label">La marquette</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="marquette" required name="marquette" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="diplome" class=" form-control-label">Le diplôme</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" required name="diplome" class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_s1" class=" form-control-label">Relevé Semestre 1 (Licence uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_s1"  name="releve_s1" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_s2" class=" form-control-label">Relevé Semestre 2 (Licence uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_s2" name="releve_s2" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_s3" class=" form-control-label">Relevé Semestre 3 (Licence uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_s3" name="releve_s3" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_s4" class=" form-control-label">Relevé Semestre 4 (Licence uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_s4" name="releve_s4" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_s5" class=" form-control-label">Relevé Semestre 5 (Licence uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_s5" name="releve_s5" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_s6" class=" form-control-label">Relevé Semestre 6 (Licence uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_s6" name="releve_s6" class="form-control-file">
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_m1" class=" form-control-label">Relevé Master 1 (Master uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_m1" name="releve_m1" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_m2" class=" form-control-label">Relevé Master 2 (Master uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_m2" name="releve_m2" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_m3" class=" form-control-label">Relevé Master 3 (Master uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_m3" name="releve_m3" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="releve_m4" class=" form-control-label">Relevé Master 4 (Master uniquement)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="releve_m4" name="releve_m4" class="form-control-file">
                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Soumettre
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Annuler
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection