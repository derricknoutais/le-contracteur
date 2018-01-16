@extends('layouts.app')

@section('content')
<div class="span3 well">
    <center>
        <a href="#product_view" data-toggle="modal" data-target="#product_view"><img src="https://avatars1.githubusercontent.com/u/11767240?v=3&s=400" name="aboutme" width="160" height="160" class="img-circle img-responsive"></a>
        <h3>{{ $client->nom . " " . $client->prenom }}</h3>
        <h4>Caution: {{ number_format($client->caution) }} CFA</h4>
        <p><em>{{ $client->numero_phone  }} @if($client->numero_phone != "") / {{ $client->numero_phone2  }} @endif </em></p>
        <a type="button" class="btn btn-primary" href="/contrats/{{ $client->id }}/create"><span class="glyphicon glyphicon-shopping-cart"></span> Faire Louer</a>
    </center>
</div>
<div class="col-xs-12 col-md-12 col">
    <div class="panel panel-primary ">
        <div class="panel-heading">
            contrats
            <a href="/contrats/create" class="pull-right btn btn-primary btn-sm" >Create New</a>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th>Facture Nº</th>
                      <th>Nom &amp; Prénom</th>
                      <th>Date de Retour</th>
                      <th>Total Facture</th>
                      <th>Total Versé</th>
                      <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $balance = 0;
                        $totalFacture = 0;
                        $totalVersee = 0;
                    @endphp
                    @foreach($contrats as $contrat)
                    @php
                        {{
                            Carbon::setlocale(LC_TIME, 'fr');
                            $voiture = \App\Voiture::where('id' , '=', $contrat->voiture_id)->first();
                            //$client = \App\Client::where('id' , '=', $contrat->client_id)->first();
                            $payements = \App\Payement::where('contrat_id', $contrat->id)->get();
                            $sommeVersee =0;
                            foreach ($payements as $payement) {
                                $sommeVersee += $payement->versement;
                            }
                            if($contrat->date_retour_reelle == '1000-11-23 00:00:00' && $contrat->date_retour_prevue < Carbon\Carbon::now()  ){
                                $total = ($contrat->voiture->prix - $contrat->remise) * (($contrat->created_at)->startOfDay())->diffInDays((Carbon\Carbon::now())->startOfDay());
                            } else {
                                $total = ($contrat->voiture->prix - $contrat->remise) * (($contrat->created_at)->startOfDay())->diffInDays(($contrat->date_retour_prevue)->startOfDay());
                            }

                            $totalFacture += $total;
                            $totalVersee += $sommeVersee;

                        }}
                    @endphp
                    <tr>
                        <td>  {{$contrat->id }}</td>
                        <td> {{ $contrat->client->nom ." ". $contrat->client->prenom }}</td>
                        <td>@if ( $contrat->date_retour_reelle != '1000-11-23 00:00:00' )
                        Retourné
                        @elseif($contrat->date_retour_reelle == '1000-11-23 00:00:00' && $contrat->date_retour_prevue < Carbon\Carbon::now()  )
                        {{ Carbon\Carbon::now()->format('d-M-Y') }}
                        @else
                        {{ $contrat->date_retour_prevue }}
                        @endif</td>
                        <td>{{ number_format($total) }}</td>
                        <td>{{ $sommeVersee }}</td>

                        @if ($balance)
                            <td>{{  $sommeVersee - $total }}</td>
                        @else
                            <td>{{  $sommeVersee - $total }}</td>
                        @endif

                        @php
                            if($sommeVersee -$total != 0){
                                $balance = $sommeVersee - $total;
                            } else {
                                $balance = 0;
                            }
                        @endphp

                    </tr>

                    @endforeach

                    <tr style="color:red">
                        <strong>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalFacture }}</strong></td>
                            <td><strong>{{ $totalVersee }}</strong></td>
                            <td><strong>{{ $totalVersee - $totalFacture }}</strong></td>
                        </strong>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">{{ $client->nom . " " . $client->prenom }}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="https://avatars1.githubusercontent.com/u/11767240?v=3&s=400" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <p><strong>Age:</strong> {{ Carbon\Carbon::parse($client->date_naissance)->diffInYears(Carbon\Carbon::now()) }} ans</p>
                        <p><strong>Addresse:</strong> {{ $client->addresse }}</p>
                        <p><strong>Ville:</strong> {{ $client->ville }}</p>
                        <p><strong>Nº Permis:</strong> {{ $client->numero_permis }}</p>
                        <p><strong>Nº Téléphone:</strong> {{ $client->numero_phone }} @if($client->numero_phone != "") / {{ $client->numero_phone2  }} @endif </p>
                        <p><strong>e-mail:</strong> {{ $client->email }}</p>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <a type="button" href="#" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Faire Louer</a>
                            <a type="button" href="voitures/show/{{ $client->id }}" class="btn btn-primary"><span class="glyphicon glyphicon-heart"></span> Voir Plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
