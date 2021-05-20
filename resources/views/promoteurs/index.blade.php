@extends('layouts.promoteurs')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @if(!($dossiers))
                            <div class="alert alert-warning">
                                Vous n'avez pas encore renseigné vos informations... <br><br>
                                <a href="{{route('dossiers.create')}}"><button class="btn btn-success" type="button">Remplir le formulaire</button> </a>
                            </div>
                        @else
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>

                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Nom </th>
                                                <th>Prénoms </th>
                                                <th>email</th>
                                                <th>téléphone</th>
                                                <th>date</th>
                                                <th>sexe</th>
                                                <th>Niveau d'étude</th>
                                                <th>Filière</th>
                                                <th>Etablissement</th>
                                                <th>relevé s1</th>
                                                <th>relevé s2</th>
                                                <th>relevé s3</th>
                                                <th>relevé s4</th>
                                                <th>relevé s5</th>
                                                <th>relevé s6</th>
                                                <th>relevé master1</th>
                                                <th>relevé master2</th>
                                                <th>relevé master3</th>
                                                <th>relevé master4</th>
                                                <th>Statut Sélection</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $dossiers as $dossier)
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{$dossier->nom}}</td>
                                                <td>
                                                    <span class="block-email">{{$dossier->prenom}}</span>

                                                </td>
                                                <td>
                                                    <span class="block-email">{{$dossier->email}}</span>
                                                </td>
                                                <td class="tel">{{$dossier->telephone}}</td>
                                                <td>{{ $dossier->date_naissance}}</td>
                                                <td>
                                                    <span class="status--process">@if($dossier->sexe == 1){{ 'Homme'  }} @else{{'Femme'}}@endif</span>
                                                </td>
                                                <td>@if($dossier->niveau_etude == 1){{ 'Licence'  }} @else{{'Master'}}@endif</td>
                                                <td>{{ $dossier->filiere}}</td>
                                                <td>{{ $dossier->etablissement}}</td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s1)}}"download>releve semestre 1 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s2)}}"download>releve semestre 2 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s3)}}"download>releve semestre 3 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s4)}}"download>releve semestre 4 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s5)}}"download>releve semestre 5 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s6)}}"download>releve semestre 6 </a></td>

                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s1)}}"download>releve master 1 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s1)}}"download>releve master 2 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s1)}}"download>releve master 3 </a></td>
                                                <td><a href="{{asset('files/etudiants/'.$dossier->releve_s1)}}"download>releve master 4 </a></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <form action="{{route('dossier.selection', $dossier->id)}}" method="post">
                                                            @csrf

                                                            @if($dossier->statut_selection) <button type="submit" class="btn btn-success">Sélectionné</button> @endif

                                                            @if(!($dossier->statut_selection))<button type="submit" class="btn btn-danger">Non Sélectionné</button> @endif
                                                        </form>
                                                        {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                             <i class="zmdi zmdi-mail-send"></i>
                                                         </button>--}}
                                                       {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Editer">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>--}}
                                                        {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                             <i class="zmdi zmdi-delete"></i>
                                                         </button>--}}
                                                        {{--<button class="item" data-toggle="tooltip" data-placement="top" title="Voir">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>--}}
                                                    </div>
                                                </td>
                                            </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->
                            </div>
                        @endif
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
    </div>
    <!-- END MAIN CONTENT-->
@endsection