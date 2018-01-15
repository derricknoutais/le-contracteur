<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voiture;
use App\Contrat;
use DB;
use Charts;
use DateTime;
use DateInterval;
class Dashboard extends Model
{
    static public function tauxLocation(){
        $data = Voiture::all();
        $chart = Charts::database($data, 'pie', 'highcharts')
            ->groupBy('disponibilite', null, [1 => 'Disponible', 0 => 'En Location'])
            ->title("Nombre de voitures louées")
            ->responsive('true');
        return $chart;
    }

    static public function locationMensuelle(){
        $data = Contrat::all();
        $today = getDate();
        $chart = Charts::database($data, 'bar', 'highcharts')
            ->dateColumn('date_retour_prevue')
            ->elementLabel("Total")
            ->responsive(true)
            ->lastByMonth(6, true);
        return $chart;
    }
    static public function locationJournaliere(){
        $today = getDate();
        $data = Contrat::all();
        $chart = Charts::database($data, 'bar', 'highcharts')
            ->title("Nombre de Location Journaliere")
            ->responsive('true')
            ->lastByDay(14);
        return $chart;
    }
    static public function payementMensuel(){
        $data = Contrat::select('contrats.created_at', DB::raw('count(contrats.id) as aggregate'))->groupBy(DB::raw('Date(contrats.created_at)'))->get(); //must alias the aggregate column as aggregate

    $chart = Charts::database($data)->preaggregated(true)->lastByDay(7, false);
        return $chart;
    }
    static public function totalPayement(){
        $today = getDate();
        return $payementTotal = Payement::whereMonth('created_at', $today['mon'])->sum('versement');
    }
}
