<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable = [
        'client_id',
        'voiture_id',
        'date_retour_prevue',
        'caution',
        'remise',
        'created_at'
    ];
    protected $dates = ['created_at', 'updated_at', 'date_retour_prevue' , 'date_retour_reelle'];
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function voiture(){
        return $this->belongsTo('App\Voiture');
    }
    public function payements(){
        return $this->hasMany('App\Payement');
    }
    public static function envoiesMessage($to,$message){



        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to'   => $to,
            'from' => 'STA',
            'text' => $message
        ]);
    }
}
