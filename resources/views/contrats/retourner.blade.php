@extends('layouts.app')

@section('content')
<br>
<br>
    <h2 class="text-center text-success" >Retourner {{ $contrat->voiture->immatriculation }}</h2>
    <h5 class="text-center" style="margin-bottom: 3em">{{ $contrat->client->nom }} {{ $contrat->client->prenom }} a une caution de la valeur de <span class="text-primary">{{ $contrat->client->caution }}</span>. Combien voulez-vous retourner?</h5>
    <form id="retour-form" action="{{ route('contrats.retourner' , [$contrat->id]) }}" method="POST" class="text-center">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}
            <div class="form-group col-md-4 col-md-offset-4">
                <label for="">Date de Retour</label>
                <input type="date" name="date_retour_reelle" value="{{ Carbon::now()->format('Y-m-d')  }}" class="form-control">
            </div>

            <input type="text" name="client_id" value="{{ $contrat->client_id }}" style="display: none">
            <input type="date" name="date_retour_prevue" value="{{ ($contrat->date_retour_prevue)->format('Y-m-d') }}" style="display: none">
            <div class="form-group row">
                <div class="col-md-4 col-md-offset-4">
                    <label for="">Somme À Retourner</label>
                    <input type="number" name="caution" class="form-control">
                </div>

            </div>
            <div class="form-group row text-center">
                    <input type="submit" class="btn btn-primary" value="Oui">

                    <a href="{{ route('contrats.index') }}" class="btn btn-primary" title="">Non</a>

            </div>


    </form>

@endsection
