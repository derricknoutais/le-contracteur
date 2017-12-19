@extends('layouts.app')
@section('stylesheet')

@endsection
@section('charts')
<div class="row text-center">
    <h1>Dashboard</h1>
</div>
<div class="row">
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
</div>
<div class="row" style="margin: 2em;">
    <div class="col-md-4">
    {!! $locationJournaliere->html() !!}
</div>
<div class="col-md-4">
    {!! $tauxLocation->html() !!}
</div>
<div class="col-md-4">
    {!! $locationMensuelle->html() !!}
</div>
</div>



@endsection

@section('chartScript')
{!! $tauxLocation->script() !!}
{!! $locationMensuelle->script() !!}
{!! $locationJournaliere->script() !!}
@endsection
