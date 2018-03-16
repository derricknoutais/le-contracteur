@extends('layouts.app')

@section('content')

<h1 class="text-center text-primary">Liste de Contrats</h1>
<div class="col-xs-12 col-md-12 col">
    <div class="panel panel-primary ">
        <div class="panel-heading">
            contrats
            <a href="/contrats/create" class="pull-right btn btn-primary btn-sm">Create New</a>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <h3 class="text-center">Contrats En Cours</h3>
                    <tr>
                        <th>Facture Nº</th>
                        <th>Nom &amp; Prénom</th>
                        <th>Immatriculation</th>
                        <th>Date de Retour</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contrats as $contrat)
                        @php{{
                            Carbon::setlocale(LC_TIME, 'fr');
                            $payements = \App\Payement::where('contrat_id', $contrat->id)->get();
                            $sommeVersee =0;
                            $dateRetourReelle = $contrat->date_retour_reelle;
                            foreach ($payements as $payement) {
                                $sommeVersee += $payement->versement;
                            }
                            if( (($contrat->created_at)->startOfDay())->diffInDays(($contrat->date_retour_reelle)->startOfDay()) == 0 ){
                                $balance = $sommeVersee - ($contrat->voiture->prix - $contrat->remise) ;
                            } else {
                                if ( ($contrat->date_retour_reelle)->format('Y-m-d') == '1000-11-23' && ($contrat->date_retour_prevue)->format('Y-m-d') >= Carbon::parse(now()) ){
                                $balance = $sommeVersee - ($contrat->voiture->prix - $contrat->remise) * (($contrat->created_at)->startOfDay())->diffInDays(($contrat->date_retour_prevue)->startOfDay());
                                }
                                //Si la date prévue est passée et la voiture n'est pas retournée
                                else if ( ($contrat->date_retour_prevue)->format('Y-m-d') <= Carbon::parse(now()) && ($contrat->date_retour_reelle)->format('Y-m-d') == '1000-11-23' ) {
                                $balance = $sommeVersee - ($contrat->voiture->prix - $contrat->remise) * (($contrat->created_at)->startOfDay())->diffInDays((Carbon::parse( now() ))->startOfDay());
                                } else {
                                    $balance = $sommeVersee - ($contrat->voiture->prix - $contrat->remise) * (($contrat->created_at)->startOfDay())->diffInDays(($contrat->date_retour_reelle)->startOfDay());
                                }
                            }
                        }}@endphp


                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
