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
        $chart = Charts::database($data, 'line', 'highcharts')
            ->dateColumn('date_retour_prevue')->groupByMonth($today['year'])
            ->title("Nombre de Location Mensuelle")
            ->responsive('true');
        return $chart;
    }
    static public function locationJournaliere(){
        $today = getDate();
        $data = Contrat::all();
        $chart = Charts::database($data, 'line', 'highcharts')
            ->groupByDay()
            ->title("Nombre de Location Journaliere")
            ->responsive('true');
        return $chart;
    }
    static public function payementMensuel(){
        $data = Payement::select('created_at', DB::raw('sum(versement) as aggregate'))->groupBy(DB::raw('created_at'))->get();
        $chart = Charts::database($data)->preaggregated(true)->lastByDay(14, false);
        return $chart;
    }
}
