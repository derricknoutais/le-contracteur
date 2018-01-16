@extends('layouts.app')
@section('stylesheet')

@endsection
@section('charts')

<div class="row" style="margin: 5em;">
    <div class="col-lg-3 col-md-3 col-sm-3 ">
        <div class="card card-stats bg-warning">
            <div class="card-header bg-success text-center" data-background-color="orange">
                Total Mensuel
            </div>
            <div class="card-content">
                <p class="category"></p>
                <h3 class="title text-center">{{ number_format($payementMensuel) }}
                    <small>F CFA</small>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 ">
        <div class="card card-stats bg-warning">
            <div class="card-header bg-success text-center" data-background-color="orange">
                Moyenne Dépensée par Location
            </div>
            <div class="card-content">
                <p class="category"></p>
                <h3 class="title text-center">{{ number_format($payementMensuel/$nombreFacture, 0) }}
                    <small>F CFA</small>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 ">
        <div class="card card-stats bg-warning">
            <div class="card-header bg-success text-center" data-background-color="orange">
                Durée Moyenne par Location
            </div>
            <div class="card-content">
                <p class="category"></p>
                <h3 class="title text-center">{{ number_format($averageDay, 2) }}
                    <small>Days</small>
                </h3>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">money_off</i>
            </div>
            <div class="card-content">
                <p class="category">Voitures en Location</p>
                <h3 class="title">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">money_off</i>
                    <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">money_off</i>
            </div>
            <div class="card-content">
                <p class="category">Retour dans 48h</p>
                <h3 class="title">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">money_off</i>
                    <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">money_off</i>
            </div>
            <div class="card-content">
                <p class="category">Contrats non-payées</p>
                <h3 class="title">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">money_off</i>
                    <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">money_off</i>
            </div>
            <div class="card-content">
                <p class="category">Total Revenus Hebdomadaire</p>
                <h3 class="title">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">money_off</i>
                    <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">money_off</i>
            </div>
            <div class="card-content">
                <p class="category">Used Space</p>
                <h3 class="title">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">money_off</i>
                    <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">money_off</i>
            </div>
            <div class="card-content">
                <p class="category">Used Space</p>
                <h3 class="title">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">money_off</i>
                    <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row" style="margin: 2em;">
    <div class="col-md-8 col-md-offset-2">
    {!! $locationJournaliere->html() !!}
    </div>
    <div class="col-md-8 col-md-offset-2">
        {!! $tauxLocation->html() !!}
    </div>
    <div class="col-md-8 col-md-offset-2">
        {!! $locationMensuelle->html() !!}
    </div>
    <div class="col-md-8 col-md-offset-2">
        {!! $locationMensuelle->html() !!}
    </div>
</div>




@endsection

@section('chartScript')
{!! $tauxLocation->script() !!}
{!! $locationMensuelle->script() !!}
{!! $locationJournaliere->script() !!}
{!! $locationJournaliere->script() !!}
@endsection
