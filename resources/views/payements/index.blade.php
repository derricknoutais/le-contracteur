@extends('layouts.app')
@section('content')
<div class="col-xs-12 col-md-12 col">
    <div class="panel panel-primary ">
        <div class="panel-heading">
            contrats
            <a href="/contrats/create" class="pull-right btn btn-primary btn-sm">Create New</a>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
            <thead>
                <tr>
                  <th>Payement Nº</th>
                  <th>Nom &amp; Prénom</th>
                  <th>Immatriculation</th>
                  <th>Somme Versée</th>
                </tr>
            </thead>
            <tbody>

                    @foreach($payements as $payement)
                        @php
                            $contrat = \App\Contrat::where('id' , '=', $payement->contrat_id)->first();
                            $client = \App\Client::where('id' , '=', $contrat->client_id)->first();
                            $voiture = \App\Voiture::where('id' , '=', $contrat->voiture_id)->first();
                        @endphp
                        <tr>
                            <td>{{ $payement->id }}</td>
                            <td>{{ $client->prenom . " " . $client->nom}}</td>
                            <td>{{ $voiture->immatriculation }}</td>
                            <td>{{ $payement->versement }}</td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
