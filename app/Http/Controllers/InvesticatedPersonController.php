<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\InvesticatedPerson;
use DateTime;
use DatePeriod;
use DateInterval;
use App;
use Cookie;


class InvesticatedPersonController extends Controller
{


    public function __construct()
    {

        //have to add the locale here

//

    }

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
        //dd($data);
        $data = $this->returnSuggestion($data);
        $suggest = $data["result"];

        $id = InvesticatedPerson::create($data)->id;

        //dd($suggest);
        return view('result')->with([
            'suggest' => $suggest
        ]);
    }


    public function returnSuggestion($data)
    {
        $clientIP = \Request::getClientIp(true);
        //dd($data);
        $data["ip"] = $clientIP;
        if (isset($data["malaise"]) && (!empty($data["malaise"]))) {
            $data["malaise"] = 1;
        } else {
            $data["malaise"] = 0;
        }

        if (isset($data["cough"]) &&  (!empty($data["cough"]))) {
            $data["cough"] = 1;
        } else {
            $data["cough"] = 0;
        }

        if (isset($data["myalgia"]) && (!empty($data["myalgia"]))) {
            $data["myalgia"] = 1;
        } else {
            $data["myalgia"] = 0;
        }

        if (isset($data["breathing_difficulties"]) && (!empty($data["breathing_difficulties"]))) {
            $data["breathing_difficulties"] = 1;
        } else {
            $data["breathing_difficulties"] = 0;
        }

        if (isset($data["loss_of_taste"]) && (!empty($data["loss_of_taste"]))) {
            $data["loss_of_taste"] = 1;
        } else {
            $data["loss_of_taste"] = 0;
        }

        if (isset($data["loss_of_smell"]) && (!empty($data["loss_of_smell"]))) {
            $data["loss_of_smell"] = 1;
        } else {
            $data["loss_of_smell"] = 0;
        }

        if (isset($data["other_symptom"]) && (!empty($data["other_symptom"]))) {
            $data["other_symptom"] = 1;
        } else {
            $data["other_symptom"] = 0;
        }

        if (isset($data["flight_recently"]) && (!empty($data["flight_recently"]))) {
            $data["flight_recently"] = 1;
        } else {
            $data["flight_recently"] = 0;
        }


        if (isset($data["covid_19_contact"]) && (!empty($data["covid_19_contact"]))) {
            $data["covid_19_contact"] = 1;
        } else {
            $data["covid_19_contact"] = 0;
        }

        if (isset($data["chest_pain"]) && (!empty($data["chest_pain"]))) {
            $data["chest_pain"] = 1;
        } else {
            $data["chest_pain"] = 0;
        }


        if (isset($data["vulnerable_group"]) && (!empty($data["vulnerable_group"]))) {
            $data["vulnerable_group"] = 1;
        } else {
            $data["vulnerable_group"] = 0;
        }

        if (isset($data["fever"]) && (!empty($data["fever"]))) {
            $data["fever"] = 1;
        } else {
            $data["fever"] = 0;
        }



        if (isset($data["nothing"]) && (!empty($data["nothing"]))) {
            $data["nothing"] = 1;
        } else {
            $data["nothing"] = 0;
            $data['malaise'] = 0;
            $data['fever'] = 0;
            $data['cough'] = 0;
            $data['myalgia'] = 0;
            $data['loss_of_taste'] = 0;
            $data['loss_of_smell'] = 0;
            $data['breathing_difficulties'] = 0;
            $data['chest_pain'] = 0;
            $data['other_symptom'] = 0;
        }


        $suggest = "error_occured";


        if ($data["flight_recently"] || $data["covid_19_contact"]) {
            if ($data["fever"] || $data["malaise"] || $data["cough"] || $data["myalgia"] || $data["breathing_difficulties"] || $data["loss_of_taste"] || $data["loss_of_smell"] || $data["chest_pain"] || $data["other_symptom"]) {
                if ($data['vulnerable_group'] || $data["age"] > 60) {
                    $suggest = "CASE5";
                } else {
                    $suggest = "CASE4";
                }
            } else {
                if ($data['vulnerable_group'] || $data["age"] > 60) {
                    $suggest = "CASE5";
                } else {
                    $suggest = "CASE3";
                }
            }
        } elseif ($data["fever"] || $data["malaise"] || $data["cough"] || $data["myalgia"] || $data["breathing_difficulties"] || $data["loss_of_taste"] || $data["loss_of_smell"] || $data["chest_pain"] || $data["other_symptom"]) {
            if ($data['vulnerable_group'] || $data["age"] > 60) {
                $suggest = "CASE5";
            } else {
                $suggest = "CASE3";
            }
        } elseif ($data['vulnerable_group'] || $data["age"] > 60) {
            $suggest = "CASE2";
        } else {
            $suggest = "CASE1";
        }

        $data["result"] = $suggest;
        return $data;


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

    public function storeAPILocale(Request $request, $locale)
    {

        App::setLocale($locale);
        return $this->storeAPI($request);
    }

    public function storeAPI(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $locale = App::getLocale();
        if (empty($locale)) {
            App::setLocale("en");
        }
        if (isset($data["id"]) && !empty($data["id"])) {
            unset($data["id"]);
        }
        $error = "";
        if (!isset($data['age'])) {
            $error .= "Age is missing.";
        } else if (($data['age'] > 200) || ($data['age'] < 0)) {
            $error .= "Age must be between 0 and 200 .";
        }

        if (!isset($data['zipcode'])) {
            $error .= "ZipCode is missing.";
        }

        if (!isset($data['zipcode'])) {
            $error .= "ZipCode is missing.";
        }

        if (!isset($data['country'])) {
            $data['country'] = "Cyprus (Κύπρος) CY";
        }

        if (!isset($data['flight_country'])) {
            $data['flight_country'] = "unknown";
        }

        if (!isset($data['vulnerable_group'])) {
            $error .= "vulnerable_group is missing.";
        }

        if (!isset($data['nothing'])) {
            $error .= "nothing is missing.";
        } else {
            if (empty($data['nothing'])) {
                if (!isset($data['malaise'])) {
                    $error .= "malaise is missing.";
                }

                if (!isset($data['fever'])) {
                    $error .= "fever is missing.";
                }

                if (!isset($data['cough'])) {
                    $error .= "cough is missing.";
                }

                if (!isset($data['myalgia'])) {
                    $error .= "myalgia is missing.";
                }

                if (!isset($data['loss_of_taste'])) {
                    $error .= "loss_of_taste is missing.";
                }

                if (!isset($data['loss_of_smell'])) {
                    $error .= "loss_of_smell is missing.";
                }

                if (!isset($data['breathing_difficulties'])) {
                    $error .= "breathing_difficulties is missing.";
                }
                if (!isset($data['chest_pain'])) {
                    $error .= "chest_pain is missing.";
                }

                if (!isset($data['other_symptom'])) {
                    $error .= "other_symptom is missing.";
                }
            }
        }
        if (!isset($data['flight_recently'])) {
            $error .= "flight_recently is missing.";
        }
        if (!isset($data['covid_19_contact'])) {
            $error .= "covid_19_contact is missing.";
        }

        if (!isset($data['unique_identification'])) {
            $error .= "unique_identification is missing.";
        }

        if (!empty($error)) {
            return Response::json(
                $error, 500);
        } else {
            $data = $this->returnSuggestion($data);
            $suggest = $data["result"];
            $reply["suggest"] = $suggest;
            $reply["html"] = $this->getHtml($suggest);
            $reply["text"] = $this->getText($suggest);
            $reply["textArray"] = $this->getTextArray($suggest);
            $id = InvesticatedPerson::create($data)->id;

            return Response::json(
                $reply, 200);
        }
        // dd($data);
    }

    public function getHtml($result)
    {
        $htmlresult = "";
        switch ($result) {

            case "CASE1":
                $htmlresult .= '
                                <h1><b>' . trans("wizard.case1") . '</b></h1>
                                <p style="text-align: center; padding-left: 10px">
                                    ' . trans("wizard.result1") . '
                                    <br/>
                               <p class="text-center"><strong>' . trans("wizard.case_instructions") . '</strong></p>
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li> ' . trans("wizard.1instruction1") . '
                                    </li>

                                    <li>' . trans("wizard.1instruction2") . '
                                    </li>

                                    <li>' . trans("wizard.1instruction3") . '</li>

                                    <li>' . trans("wizard.1instruction4") . '
                                    </li>
                                </ul>
                                </p>';
                break;
            case "CASE2":
                $htmlresult .= '
                                <h1><b>' . trans("wizard.case2") . '</b></h1>
                                <p style="text-align: center; padding-left: 10px">
                                    ' . trans("wizard.result2") . '
                                    <br/>
                               <p class="text-center"><strong>' . trans("wizard.case_instructions") . '</strong></p>
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li> ' . trans("wizard.2instruction1") . '
                                    </li>

                                    <li>' . trans("wizard.2instruction2") . '
                                    </li>

                                    <li>' . trans("wizard.2instruction3") . '</li>

                                    <li>' . trans("wizard.2instruction4") . '
                                    </li>
                                </ul>
                                </p>';
                break;
            case "CASE3":
                $htmlresult .= '
                                <h1><b>' . trans("wizard.case3") . '</b></h1>
                                <p style="text-align: center; padding-left: 10px">
                                    ' . trans("wizard.result3") . '
                                    <br/>
                               <p class="text-center"><strong>' . trans("wizard.case_instructions") . '</strong></p>
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li> ' . trans("wizard.3instruction1") . '
                                    </li>

                                    <li>' . trans("wizard.3instruction2") . '
                                    </li>

                                    <li>' . trans("wizard.3instruction3") . '</li>

                                    <li>' . trans("wizard.3instruction4") . '
                                    </li>
                                </ul>
                                </p>';
                break;
            case "CASE4":
                $htmlresult .= '
                                <h1><b>' . trans("wizard.case4") . '</b></h1>
                                <p style="text-align: center; padding-left: 10px">
                                    ' . trans("wizard.result4") . '
                                    <br/>
                               <p class="text-center"><strong>' . trans("wizard.case_instructions") . '</strong></p>
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li> ' . trans("wizard.4instruction1") . '
                                    </li>

                                    <li>' . trans("wizard.4instruction2") . '
                                    </li>

                                    <li>' . trans("wizard.4instruction3") . '</li>

                                    <li>' . trans("wizard.4instruction4") . '
                                    </li>
                                </ul>
                                </p>';
                break;
            case "CASE5":
                $htmlresult .= '
                                <h1><b>' . trans("wizard.case5") . '</b></h1>
                                <p style="text-align: center; padding-left: 10px">
                                    ' . trans("wizard.result5") . '
                                    <br/>
                               <p class="text-center"><strong>' . trans("wizard.case_instructions") . '</strong></p>
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li> ' . trans("wizard.5instruction1") . '
                                    </li>

                                    <li>' . trans("wizard.5instruction2") . '
                                    </li>

                                    <li>' . trans("wizard.5instruction3") . '</li>

                                </ul>
                                </p>';
                break;
            case "error_occured":
                $htmlresult .= '
                                <div style="background - color: #ffd000;">
                                    <h1 ><b > ' . trans('wizard.systemError') . '</b ></h1 > <br />
                                    <p >' . trans('wizard.error') . '</p >
                                    </p >
                                </div >';
                break;

            default:
                $htmlresult .= '
                                <span>' . trans('wizard.tryAgain') . '</span>';
                break;

        }
        return $htmlresult;
    }


    public function getText($result)
    {
        $txtresult = "";
        switch ($result) {

            case "CASE1":
                $txtresult .= trans("wizard.case1") . " |  " .
                    trans("wizard.result1") . " |  " .
                    trans("wizard.case_instructions") . " |  " .
                    trans("wizard.1instruction1") . " |  " .
                    trans("wizard.1instruction2") . " |  " .
                    trans("wizard.1instruction3") . " |  " .
                    trans("wizard.1instruction4");

                break;
            case "CASE2":
                $txtresult .= trans("wizard.case2") . " |  " .
                    trans("wizard.result2") . " |  " .
                    trans("wizard.case_instructions") . " |  " .
                    trans("wizard.2instruction1") . " |  " .
                    trans("wizard.2instruction2") . " |  " .
                    trans("wizard.2instruction3") . " |  " .
                    trans("wizard.2instruction4");
                break;
            case "CASE3":
                $txtresult .= trans("wizard.case3") . " |  " .
                    trans("wizard.result3") . " |  " .
                    trans("wizard.case_instructions") . " |  " .
                    trans("wizard.3instruction1") . " |  " .
                    trans("wizard.3instruction2") . " |  " .
                    trans("wizard.3instruction3") . " |  " .
                    trans("wizard.3instruction4");
                break;
            case "CASE4":
                $txtresult .= trans("wizard.case4") . " |  " .
                    trans("wizard.result4") . " |  " .
                    trans("wizard.case_instructions") . " |  " .
                    trans("wizard.4instruction1") . " |  " .
                    trans("wizard.4instruction2") . " |  " .
                    trans("wizard.4instruction3") . " |  " .
                    trans("wizard.4instruction4");
                break;
            case "CASE5":
                $txtresult .= trans("wizard.case5") . " |  " .
                    trans("wizard.result5") . " |  " .
                    trans("wizard.case_instructions") . " |  " .
                    trans("wizard.5instruction1") . " |  " .
                    trans("wizard.5instruction2") . " |  " .
                    trans("wizard.5instruction3") . " |  ";
                break;
            case "error_occured":
                $txtresult .= trans('wizard.systemError') . '|' . trans('wizard.error');
                break;

            default:
                $txtresult .= trans('wizard.tryAgain');
                break;

        }
        return $txtresult;
    }


    public function getTextArray($result)
    {
        $txtresultArray = Array();
        switch ($result) {
            case "CASE1":
                $txtresultArray['title'] = trans("wizard.case1");
                $txtresultArray['result'] = trans("wizard.result1");
                $txtresultArray['prompt'] = trans("wizard.case_instructions");
                $txtresultArray['instructions'][] = trans("wizard.1instruction1");
                $txtresultArray['instructions'][] = trans("wizard.1instruction2");
                $txtresultArray['instructions'][] = trans("wizard.1instruction3");
                $txtresultArray['instructions'][] = trans("wizard.1instruction4");
                break;
            case "CASE2":
                $txtresultArray['title'] = trans("wizard.case2");
                $txtresultArray['result'] = trans("wizard.result2");
                $txtresultArray['prompt'] = trans("wizard.case_instructions");
                $txtresultArray['instructions'][] = trans("wizard.2instruction1");
                $txtresultArray['instructions'][] = trans("wizard.2instruction2");
                $txtresultArray['instructions'][] = trans("wizard.2instruction3");
                $txtresultArray['instructions'][] = trans("wizard.2instruction4");
                break;
            case "CASE3":
                $txtresultArray['title'] = trans("wizard.case3");
                $txtresultArray['result'] = trans("wizard.result3");
                $txtresultArray['prompt'] = trans("wizard.case_instructions");
                $txtresultArray['instructions'][] = trans("wizard.3instruction1");
                $txtresultArray['instructions'][] = trans("wizard.3instruction2");
                $txtresultArray['instructions'][] = trans("wizard.3instruction3");
                $txtresultArray['instructions'][] = trans("wizard.3instruction4");
                break;
            case "CASE4":
                $txtresultArray['title'] = trans("wizard.case4");
                $txtresultArray['result'] = trans("wizard.result4");
                $txtresultArray['prompt'] = trans("wizard.case_instructions");
                $txtresultArray['instructions'][] = trans("wizard.4instruction1");
                $txtresultArray['instructions'][] = trans("wizard.4instruction2");
                $txtresultArray['instructions'][] = trans("wizard.4instruction3");
                $txtresultArray['instructions'][] = trans("wizard.4instruction4");
                break;
            case "CASE5":
                $txtresultArray['title'] = trans("wizard.case5");
                $txtresultArray['result'] = trans("wizard.result5");
                $txtresultArray['prompt'] = trans("wizard.case_instructions");
                $txtresultArray['instructions'][] = trans("wizard.5instruction1");
                $txtresultArray['instructions'][] = trans("wizard.5instruction2");
                $txtresultArray['instructions'][] = trans("wizard.5instruction3");
                break;
            case "error_occured":
                $txtresultArray['title'] = "Error";
                $txtresultArray['result'] = trans('wizard.systemError');
                $txtresultArray['prompt'] = "";
                $txtresultArray['instructions'][] = trans('wizard.error');

                break;

            default:
                $txtresultArray['title'] = "Try Again";
                $txtresultArray['result'] = trans('wizard.tryAgain');
                $txtresultArray['prompt'] = "";
                $txtresultArray['instructions'][] = trans('wizard.tryAgain');
                break;

        }
        return $txtresultArray;
    }


    public function getRecordsAPI()
    {
        $test = InvesticatedPerson::all();
        return Response::json(
            $test, 200);
    }

    public function getRecordAPIForSpecificUnique_identifier($identifier)
    {
        $tests = InvesticatedPerson::all();
        $usersForSpecificU_id = $tests->intersect(InvesticatedPerson::whereIn('unique_identification', [$identifier])->get());
        return Response::json(
            $usersForSpecificU_id, 200);
    }


}
