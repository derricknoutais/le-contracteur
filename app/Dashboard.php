<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voiture;
use App\Contrat;
use DB;
use Charts;
use DateTime;
use DateInterval;
use Carbon;
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
        $data = Contrat::whereMonth('created_at', $today['mon'])->get();
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
    static public function countLocation(){
        $today = getDate();
        return $count = Contrat::whereMonth('created_at', $today['mon'])->count();
    }
    static public function averageTime(){
        $today = getDate();

        DB::table('contrats')->orderBy('id')->chunk(100, $avg = function ($contrats) {
            $nombreJours = 0;
            foreach($contrats as $contrat) {
                if($contrat->date_retour_reelle != '1000-11-23 00:00:00'){
                    $nombreJours += (Carbon::parse($contrat->created_at))->diffInDays(Carbon::parse($contrat->date_retour_reelle));
                } else {
                    $nombreJours += (Carbon::parse($contrat->created_at))->diffInDays(Carbon::now());
                }
            }
            return $nombreJours;
        });
        $total = Dashboard::countLocation();
        return $nombre = $avg(Contrat::all())/$total;
    }
}
