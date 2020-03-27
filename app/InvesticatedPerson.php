<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvesticatedPerson extends Model
{
    //
    //
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','age',
        'malaise','fever','cough','myalgia','breathing_difficulties','symptoms_more_than_two_days','other_symptom',
        'flight_recently','covid_19_contact_within_14_from_today','covid_19_contact_within_14_from_symptoms','chest_pain','nothing',
        'gender','lat','long','mobile','email','comments','vulnerable_group','result','symptoms_start','zipcode','loss_of_taste','loss_of_smell','IP',
    ];
}
