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

                        <tr
                        @if( ($contrat->date_retour_reelle)->format('Y-m-d') == '1000-11-23' &&
                                ($balance >= 0) )
                           class="bg-warning"
                        @elseif( ($contrat->date_retour_reelle)->format('Y-m-d') != '1000-11-23' &&
                                ($balance >= 0) )
                            class="bg-success"
                        @elseif( ($contrat->date_retour_reelle)->format('Y-m-d') == '1000-11-23' &&
                                ($balance < 0) )
                            class="bg-danger"
                        @endif
                        >
                    <th scope="row"><a href="contrats/{{ $contrat->id }}">00{{ $contrat->id }}</a></th>
                    <td>
                        <a href="clients/{{ $contrat->client->id }}" title="">
                            {{ $contrat->client->nom }} {{ $contrat->client->prenom }}
                        </a>
                    </td>
                    <td>
                        <a href="voitures/{{ $contrat->voiture->id }}" title="">
                            {{ $contrat->voiture->immatriculation }}
                        </a>

                    </td>

                    <td>
                        @if( ($contrat->date_retour_reelle)->format('Y-m-d') != '1000-11-23' )
                            Retourné
                        @else

                            {{ Carbon::parse(($contrat->date_retour_prevue)->format('d-m-Y H:i:s'))->diffForHumans() }}

                        @endif
                    </td>
                    <td>
                    {{ number_format($balance) }}</td>
                    <td>
                        @if ($balance < 0)
                        <a  class="btn btn-primary btn-sm" href="/payements/create/{{ $contrat->id }}">Créer un payement</a>
                        @endif

                        @if( ($contrat->date_retour_reelle)->format('Y-m-d') == '1000-11-23' )
                        <a href="/contrats/{{ $contrat->id }}/edit" class="btn btn-primary btn-sm">Editer</a>
                        @endif

                        {{-- <a href="#" type="button" class="btn btn-primary btn-sm" onclick="var result = confirm('Etes vous sur de vouloir supprimer un client?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }" >Supprimer</a>
                            <form id="delete-form" action="{{ route('contrats.destroy' , [$contrat->id]) }}" method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                            </form> --}}
                            @if( ($contrat->date_retour_reelle)->format('Y-m-d') == '1000-11-23')
                            <a type="button" class="btn btn-primary btn-sm" href="/contrats/edit/{{ $contrat->id }}">Retourner</a>
                            @endif
                       <form id="retour-form" action="{{ route('contrats.update' , [$contrat->id]) }}" method="POST" style="display: none;">
                               <input type="hidden" name="_method" value="put">
                               {{ csrf_field() }}
                               <input type="date" name="date_retour_reelle" value="{{ Carbon::now()->format('Y-m-d')  }}">
                               <input type="text" name="client_id" value="{{ $contrat->id }}">
                               <input type="date" name="date_retour_prevue" value="{{ ($contrat->date_retour_prevue)->format('Y-m-d') }}">
                               <input type="" name="caution" value="{{ $contrat->caution }}">
                               <input type="submit" name="">
                       </form>
                    </td>

                </tr>
                </a>
                @endforeach
              </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
