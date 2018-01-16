@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-3 text-center">
    <h3>Nouveau Contrat</h3>
    <form action="{{ route('contrats.store') }}" method="post" class="text-center" >
                    {{ csrf_field() }}
                    @if($voitures != null )
                    <div class="form-group col-md-6" >
                        <label for="voiture_id">Choisissez la voiture<span class="required">*</span></label>
                        <select id="voiture_id" type="text" name="voiture_id" class="form-control" spellcheck="false" required placeholder="30000, 50000" >
                            @forelse($voitures as $voiture)
                            <option selected value="{{ $voiture->id }}"> {{ $voiture->immatriculation }} </option>
                            @empty
                            <option selected disabled value=""> Aucune voiture dispo</option>
                            @endforelse
                        </select>
                    </div>
                    @else
                    <input name="voiture_id" type="hidden" value="{{ $voiture_id }}" class="form-control" />
                    @endif

                    @if($clients !=null )
                    <div class="form-group col-md-6" >
                        <label for="client_id">Choisissez le client<span class="required">*</span></label>
                        <select id="client_id" type="text" name="client_id" class="form-control" spellcheck="false" required placeholder="30000, 50000" >
                            @foreach($clients as $client)
                            <option  selected value="{{ $client->id }}"> {{ $client->nom . " " . $client->prenom }} </option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input name="client_id" type="hidden" value="{{ $client_id }}" class="form-control" />
                    @endif
                    <div class="form-group col-md-6" >
                        <label for="date_retour_prevue">Date de Retour<span class="required">*</span></label>
                        <input id="date_retour_prevue" type="date" name="date_retour_prevue" class="form-control" spellcheck="false" required />
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="caution">Caution<span class="required">*</span></label>
                        <input id="caution" type="number" name="caution" class="form-control" spellcheck="false" required value="0" step="10000"/>
                    </div>
                    @if(Auth::user()->role < 2)
                        <div class="form-group col-md-6" >
                            <label for="remise">Remise<span class="required">*</span></label>
                            <input id="remise" type="number" name="remise" class="form-control" spellcheck="false" required value="0" step="5000" />
                        </div>
                    @endif
                    @if(Auth::user()->role < 2)
                        <div class="form-group col-md-6" >
                            <label for="created_at">Date du Jour<span class="required">*</span></label>
                            <input id="created_at" type="date" name="created_at" class="created_at" spellcheck="false" required value="{{ Carbon::now() }}"/>
                        </div>
                    @endif

                    <div class="form-group" >
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>

    </form>
</div>
@endsection
