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

    public function __construct()
    {

        //have to add the locale here

//

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        App::setLocale($locale);
        $data = $request->all();
        $clientIP = \Request::getClientIp(true);
        //dd($data);
        $data["ip"] = $clientIP;
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

        if (isset($data["loss_of_taste"]) && $data["loss_of_taste"] == "true") {
            $data["loss_of_taste"] = 1;
        } else {
            $data["loss_of_taste"] = 0;
        }

        if (isset($data["loss_of_smell"]) && $data["loss_of_smell"] == "true") {
            $data["loss_of_smell"] = 1;
        } else {
            $data["loss_of_smell"] = 0;
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


        if (isset($data["covid_19_contact"]) && $data["covid_19_contact"] == "true") {
            $data["covid_19_contact"] = 1;
        } else {
            $data["covid_19_contact"] = 0;
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

        if (isset($data["fever"]) && $data["fever"] == "true") {
            $data["fever"] = 1;
        } else {
            $data["fever"] = 0;
        }

        $suggest = "error_occured";

        if ($data["fever"] || $data["malaise"] || $data["cough"] || $data["myalgia"] || $data["breathing_difficulties"] || $data["loss_of_taste"] || $data["loss_of_smell"] || $data["chest_pain"] || $data["other_symptom"]) {

            if ($data["flight_recently"] || $data["covid_19_contact"]) {
                if ($data['vulnerable_group'] || $data["age"] > 60) {
                    $suggest = "CASE5";
                } else {
                    $suggest = "CASE4";
                }
            } else {
                $suggest = "CASE3";
            }
        } else {
            $suggest = "CASE1";
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
