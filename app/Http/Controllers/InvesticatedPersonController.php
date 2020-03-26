<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvesticatedPerson;
use DateTime;
use DatePeriod;
use DateInterval;
use App;
class InvesticatedPersonController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($loc = null)
    {

    }

    /**
     * Display a message when form submitted succesfully
     */
    public function submitted()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function __construct(){

       //have to add the locale here

//        App::setLocale();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$locale)
    {
        App::setLocale($locale);
        $data = $request->all();
        //dd($data);
        if (isset($data["malaise"]) && $data["malaise"] == "true") {
            $data["malaise"] = 1;
        } else {
            $data["malaise"] = 0;
        }

        if (isset($data["cough"]) && $data["cough"] == "true") {
            $data["cough"] = 1;
        } else {
            $data["cough"] = 0;
        }

        if (isset($data["myalgia"]) && $data["myalgia"] == "true") {
            $data["myalgia"] = 1;
        } else {
            $data["myalgia"] = 0;
        }

        if (isset($data["breathing_difficulties"]) && $data["breathing_difficulties"] == "true") {
            $data["breathing_difficulties"] = 1;
        } else {
            $data["breathing_difficulties"] = 0;
        }


        if (isset($data["symptoms_start"]) && !empty($data["symptoms_start"])) {
            $date_symptoms_start = DateTime::createFromFormat('d/m/Y', $data["symptoms_start"]);
            $date_today = new DateTime();
            $diff = $date_today->diff($date_symptoms_start);
            if ($diff->days > 2) {
                $data["symptoms_more_than_two_days"] = 1;
            } else {
                $data["symptoms_more_than_two_days"] = 0;
            }
            $data["symptoms_start"] = $date_symptoms_start->format('Y-m-d');
        } else {
            $date = new DateTime();
            $data["symptoms_start"] = $date->format('Y-m-d'); //->format('Y-m-d H:i:s');
            $data["symptoms_more_than_two_days"] = 0;
        }

        if (isset($data["other_symptom"]) && $data["other_symptom"] == "true") {
            $data["other_symptom"] = 1;
        } else {
            $data["other_symptom"] = 0;
        }

        if (isset($data["flight_recently"]) && $data["flight_recently"] == "true") {
            $data["flight_recently"] = 1;
        } else {
            $data["flight_recently"] = 0;
        }


        if (isset($data["covid_19_contact_within_14_from_today"]) && $data["covid_19_contact_within_14_from_today"] == "true") {
            $data["covid_19_contact_within_14_from_today"] = 1;
        } else {
            $data["covid_19_contact_within_14_from_today"] = 0;
        }

        if (isset($data["covid_19_contact_within_14_from_symptoms"]) && $data["covid_19_contact_within_14_from_symptoms"] == "true") {
            $data["covid_19_contact_within_14_from_symptoms"] = 1;
        } else {
            $data["covid_19_contact_within_14_from_symptoms"] = 0;
        }


        if (isset($data["chest_pain"]) && $data["chest_pain"] == "true") {
            $data["chest_pain"] = 1;
        } else {
            $data["chest_pain"] = 0;
        }

        if (isset($data["nothing"]) && $data["nothing"] == "true") {
            $data["nothing"] = 1;
        } else {
            $data["nothing"] = 0;
        }


        if (isset($data["vulnerable_group"]) && $data["vulnerable_group"] == "true") {
            $data["vulnerable_group"] = 1;
        } else {
            $data["vulnerable_group"] = 0;
        }


        $suggest = "error_occured";

        if ($data["nothing"]) {
            if ($data["flight_recently"] || $data["covid_19_contact_within_14_from_today"]) { //from today?Ask Doctor! Ask also from flight if it is from today?
                $suggest = "stay_home_14_days_asymptomatic"; //asymptomatic
                //check sujjestions if stays home 14 days from today
            } else {
                $suggest = "nothing_for_now_not_infected"; //nothing for now  . What text should we present to the user?
            }
        } else if ($data["malaise"] || $data["fever"] > 37.3 || $data["cough"] || $data["myalgia"] || $data["breathing_difficulties"]) {
            if ($data["flight_recently"] || $data["covid_19_contact_within_14_from_symptoms"]) { //if used did not give take today date. Ask.Ask Doctor!
                if ($data['vulnerable_group'] || $data["age"] > 60 || $data["fever"] > 38.5 || $data["breathing_difficulties"] || $data["chest_pain"] || $data["symptoms_more_than_two_days"]) {
                    $suggest = "go_and_seek_public_health_care"; //change to go_and_seek_public_health_care
                } else {
                    $suggest = "stay_home_14_days_symptomatic";
                }
            } else {
                $suggest = "odigies_apo_pi";
            }
        } else { // the user did not choose any symptoms or nothing choice. What to do? Handle like it choose nothing?
            if ($data["flight_recently"] || $data["covid_19_contact_within_14_from_today"]) { //from today?Ask Doctor! Ask also from flight if it is from today?
                $suggest = "stay_home_14_days_asymptomatic"; //asymptomatic
                //check sujjestions if stays home 14 days from today
            } else {
                $suggest = "nothing_for_now_not_infected"; //nothing for now  . What text should we present to the user?
            }
        }


        $data["result"] = $suggest;
        //dd($data);
        $id = InvesticatedPerson::create($data)->id;

        //dd($suggest);
        return view('result')->with([
            'suggest' => $suggest
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Helpline $helpline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Helpline $helpline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
