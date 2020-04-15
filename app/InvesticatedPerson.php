<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvesticatedPerson extends Model
{
    //
    //
    protected $primaryKey = 'id';

    protected $fillable = [
        'age', 'malaise', 'fever', 'cough', 'myalgia', 'breathing_difficulties', 'other_symptom', 'flight_recently', 'flight_country', 'chest_pain', 'nothing',
        'gender', 'lat', 'long', 'vulnerable_group', 'result', 'zipcode', 'loss_of_taste', 'loss_of_smell', 'ip', 'covid_19_contact', 'country',
        'unique_identification','country_iso','flight_country_iso',

    ];
}
