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

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
