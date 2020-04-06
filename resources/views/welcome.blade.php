<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coronavirus Test</title>

    <!-- Fonts -->
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' rel='stylesheet'>
    <link href="{{asset('css/lang.css')}}" rel="stylesheet">
    <link href="{{asset('css/wizard.css')}}" rel="stylesheet">
    <link href="{{asset('css/niceCountryInput.css')}}" rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>

        .button {
            background-color: #09c7ff;
            color: #1be7d0; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .button:hover {
            background-color: #ccc;
            cursor: pointer;
        }

        input:required:invalid, input:focus:invalid {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAeVJREFUeNqkU01oE1EQ/mazSTdRmqSxLVSJVKU9RYoHD8WfHr16kh5EFA8eSy6hXrwUPBSKZ6E9V1CU4tGf0DZWDEQrGkhprRDbCvlpavan3ezu+LLSUnADLZnHwHvzmJlvvpkhZkY7IqFNaTuAfPhhP/8Uo87SGSaDsP27hgYM/lUpy6lHdqsAtM+BPfvqKp3ufYKwcgmWCug6oKmrrG3PoaqngWjdd/922hOBs5C/jJA6x7AiUt8VYVUAVQXXShfIqCYRMZO8/N1N+B8H1sOUwivpSUSVCJ2MAjtVwBAIdv+AQkHQqbOgc+fBvorjyQENDcch16/BtkQdAlC4E6jrYHGgGU18Io3gmhzJuwub6/fQJYNi/YBpCifhbDaAPXFvCBVxXbvfbNGFeN8DkjogWAd8DljV3KRutcEAeHMN/HXZ4p9bhncJHCyhNx52R0Kv/XNuQvYBnM+CP7xddXL5KaJw0TMAF8qjnMvegeK/SLHubhpKDKIrJDlvXoMX3y9xcSMZyBQ+tpyk5hzsa2Ns7LGdfWdbL6fZvHn92d7dgROH/730YBLtiZmEdGPkFnhX4kxmjVe2xgPfCtrRd6GHRtEh9zsL8xVe+pwSzj+OtwvletZZ/wLeKD71L+ZeHHWZ/gowABkp7AwwnEjFAAAAAElFTkSuQmCC);
            background-position: right top;
            background-repeat: no-repeat;
            -moz-box-shadow: none;
        }

        input:required:valid {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAepJREFUeNrEk79PFEEUx9/uDDd7v/AAQQnEQokmJCRGwc7/QeM/YGVxsZJQYI/EhCChICYmUJigNBSGzobQaI5SaYRw6imne0d2D/bYmZ3dGd+YQKEHYiyc5GUyb3Y+77vfeWNpreFfhvXfAWAAJtbKi7dff1rWK9vPHx3mThP2Iaipk5EzTg8Qmru38H7izmkFHAF4WH1R52654PR0Oamzj2dKxYt/Bbg1OPZuY3d9aU82VGem/5LtnJscLxWzfzRxaWNqWJP0XUadIbSzu5DuvUJpzq7sfYBKsP1GJeLB+PWpt8cCXm4+2+zLXx4guKiLXWA2Nc5ChOuacMEPv20FkT+dIawyenVi5VcAbcigWzXLeNiDRCdwId0LFm5IUMBIBgrp8wOEsFlfeCGm23/zoBZWn9a4C314A1nCoM1OAVccuGyCkPs/P+pIdVIOkG9pIh6YlyqCrwhRKD3GygK9PUBImIQQxRi4b2O+JcCLg8+e8NZiLVEygwCrWpYF0jQJziYU/ho2TUuCPTn8hHcQNuZy1/94sAMOzQHDeqaij7Cd8Dt8CatGhX3iWxgtFW/m29pnUjR7TSQcRCIAVW1FSr6KAVYdi+5Pj8yunviYHq7f72po3Y9dbi7CxzDO1+duzCXH9cEPAQYAhJELY/AqBtwAAAAASUVORK5CYII=);
            background-position: right top;
            background-repeat: no-repeat;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 90px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #5a6268;
            -webkit-transition: .4s;
            transition: .4s;
            width:90px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #138496;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(55px);
            -ms-transform: translateX(55px);
            transform: translateX(55px);
        }

        /*------ ADDED CSS ---------*/
        .on
        {
            display: none;
        }

        .on, .off
        {
            color: white;
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            font-size: 12px;
            font-family: Verdana, sans-serif;
        }

        input:checked+ .slider .on
        {display: block;}

        input:checked + .slider .off
        {display: none;}

        /*--------- END --------*/

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;}

        .btn-light:hover {

            color: #1b4b72 !important;


        }

    </style>
</head>
<body>

<header>


    <nav class="navbar fixed-top navbar-expand "
         style="background-color: #f9f8fd;border-bottom: 2px solid rgb(44, 169, 240);">

        <!-- Button trigger modal -->


        <a class="navbar-brand" href="/" style="">
            <img src="{{asset('images/rise-new.png')}}" width="100" height="30" class="d-inline-block align-top" alt="">
            <span class="d-none d-sm-inline">
		<img src="{{asset('images/brand.png')}}" width="235" height="30" class="d-inline-block align-top ml-2 mt-1"
             alt="">
	</span>


        </a>


        <!-- Modal -->


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-md-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">

                        @if (App::isLocale('en'))
                            <a class="nav-link dropdown-toggle" href="en" id="dropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-us"> </span> English</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="gr"><span class="flag-icon flag-icon-gr"> </span>
                                    Greek</a>
                                <a class="dropdown-item" href="tr"><span class="flag-icon flag-icon-tr"> </span>
                                    Turkish</a>
                            </div>
                        @elseif(App::isLocale('gr'))
                            <a class="nav-link dropdown-toggle" href="gr" id="dropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-gr"> </span> Greek</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="en"><span class="flag-icon flag-icon-us"> </span>
                                    English</a>
                                <a class="dropdown-item" href="tr"><span class="flag-icon flag-icon-tr"> </span>
                                    Turkish</a>
                            </div>
                        @elseif(App::isLocale('tr'))
                            <a class="nav-link dropdown-toggle" href="tr" id="dropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-tr"> </span> Turkish</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="en"><span class="flag-icon flag-icon-us"> </span>
                                    English</a>
                                <a class="dropdown-item" href="gr"><span class="flag-icon flag-icon-gr"> </span>
                                    Greek</a>
                            </div>

                        @endif
                    </li>
                </ul>
            </form>
        </div>
    </nav>

</header>


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
@endif

<!-- MultiStep Form -->
    <div class="container-fluid mt-5" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3"><br><br>
                    <h2 style="color: #5bc0de">@lang('wizard.coronaVirusTest')</h2>
                    {{--                    <p>--}}
                    {{--                    <center><img src="{{asset('images/RISE.png')}}" width="35%"></center>--}}
                    {{--                    </p>--}}
                    <br><br>

                    <p style="text-align: center; padding: 0 30px 0px 30px"> @lang('wizard.disclaimerp1')
                        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">WHO</a>,
                        <a href="https://www.ecdc.europa.eu/en">ECDC </a>@lang('wizard.disclaimerp1.5')
                        <a href="https://www.cdc.gov/">CDC</a>@lang('wizard.disclaimerp2')

                    </p>


                    <p style="text-align: center; padding: 0px 20px 0px 20px">@lang('wizard.language_options')</p>
                    <p style="text-align: center; padding: 0px 20px 0px 20px">@lang('wizard.mandatory')</p>
                    <div class="row">

                        <div class="col-md-12 mx-0">
                            <form id="msform" action=" {{ route('save-test', ['locale' => App::getLocale()]) }}"
                                  method="post">
                                <ul id="progressbar">
                                    <li class="fas fa-user-alt active"><p
                                                style="">@lang('wizard.demographic')</p>
                                    </li>
                                    <li class="fas fa-notes-medical"><p>@lang('wizard.medical')</p>
                                    </li>
                                    <li class="fas fa-plane"><p>@lang('wizard.travelling')</p></li>
                                    <li class="fas fa-clipboard-check"><p>@lang('wizard.symptoms')</p></li>
                                    <li class="fas fa-comments"><p>@lang('wizard.exposure')</p></li>

                                </ul>

                                <fieldset name="first" id="1">
                                    <div class="form-card">
                                        <h2 class="fs-title "><i class="fa fa-user"></i> @lang('wizard.demographic')
                                        </h2>
                                        <label for="age">@lang('wizard.age')</label>
                                        <input type="number" name="age" id="age" placeholder="" pattern="" min="1"
                                               max="99"
                                               required oninvalid='alert("Please Insert a Number");'/>
                                        <div class="invalid-feedback">can't be blank, is a number</div>
                                        <br/>

                                        <!-- Group of default radios - option 1 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="male" name="gender"
                                                   value="male">
                                            <label class="custom-control-label" for="male">@lang('wizard.male')</label>
                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="female" name="gender"
                                                   value="female">
                                            <label class="custom-control-label"
                                                   for="female">@lang('wizard.female')</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="other" name="gender"
                                                   value="other">
                                            <label class="custom-control-label"
                                                   for="other">@lang('wizard.gender_other')</label>
                                        </div>


                                        <br/>
                                        <label for="zipcode">@lang('wizard.zip')</label>
                                        <input type="number" name="zipcode" placeholder="" min="1" pattern=""
                                               id="zipcode"
                                               required oninvalid='alert("Please Insert a Number");'/>
                                        <div class="invalid-feedback">can't be blank, is a number</div>
                                        <br/>
                                        <div name="country_div" id="country_div">
                                            <label for="country">@lang('wizard.country')</label>
                                            <div id="niceCountryInputSelector" style="width: 100%;"
                                                 data-selectedcountry="CY" data-showspecial="false"
                                                 data-showflags="true" data-i18nall="All selected"
                                                 data-i18nnofilter="No selection" data-i18nfilter="Filter"
                                                 data-onchangecallback="onChangeCallback">
                                            </div>
                                        </div>
                                        <input type="hidden" id="country" name="country">
                                        <br/>


                                    </div>
                                    <button type="button" name="next" class=" next btn btn-info"
                                            value="Next Step">@lang('wizard.next')
                                    </button>


                                </fieldset>
                                <fieldset name="second" id="2">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i
                                                    class="fa fa-notes-medical"></i> @lang('wizard.medical')
                                        </h2>


                                        <p>@lang('wizard.chronic_conditions_questions')</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                @lang('wizard.cardiovascular')
                                            </li>
                                            <li class="list-group-item">
                                                @lang('wizard.diabetes')
                                            </li>
                                            <li class="list-group-item">
                                                @lang('wizard.lung')
                                            </li>
                                            <li class="list-group-item">
                                                @lang('wizard.respiratory')
                                            </li>
                                            <li class="list-group-item">
                                                @lang('wizard.cancer')
                                            </li>
                                            <li class="list-group-item">
                                                @lang('wizard.immunodeficiency')
                                            </li>
                                        </ul>
                                        <br/>
                                        <label class="switch"  style="text-align: right;float: right;">
                                            <input type="checkbox" id="vulnerable_group" name="vulnerable_group" value="true">
                                            <div class="slider round">
                                                <span class="on">@lang('wizard.yes')</span>
                                                <span class="off">@lang('wizard.no')</span>
                                            </div>
                                        </label>
                                        <br/>
                                    </div>
                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous">@lang('wizard.previous')</button>


                                    <button type="button" name="next" class=" next btn btn-info"
                                            value="Next Step">@lang('wizard.next')
                                    </button>

                                </fieldset>


                                <fieldset name="third" id="3">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i
                                                    class="fas fa-plane"></i> @lang('wizard.travelling')
                                        </h2>
                                        <label for="vulnerable_group">@lang('wizard.travel')</label>
                                        <label class="switch"  style="text-align: right;float: right;">
                                            <input type="checkbox" id="flight_recently" name="flight_recently" value="true">
                                            <div class="slider round">
                                                <span class="on">@lang('wizard.yes')</span>
                                                <span class="off">@lang('wizard.no')</span>
                                            </div>
                                        </label>
                                        <br/>
                                        <div name="flight_country_div" id="flight_country_div">
                                            <label for="flight_country">@lang('wizard.flight_country')</label>
                                            <br/>
                                            <div id="niceCountryInputSelector2" style="width: 100%;"
                                                 data-showspecial="false" data-selectedcountry="CY"
                                                 data-showflags="true" data-i18nall="All selected"
                                                 data-i18nnofilter="No selection" data-i18nfilter="Filter"
                                                 data-onchangecallback="onChangeCallback2"
                                            >
                                            </div>
                                        </div>
                                        <input type="hidden" id="flight_country" name="flight_country">
                                        <br/>
                                    </div>
                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous">@lang('wizard.previous')</button>


                                    <button type="button" name="next" class=" next btn btn-info"
                                            value="Next Step">@lang('wizard.next')
                                    </button>

                                </fieldset>

                                <fieldset name="forth" id="4">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i
                                                    class="fas fa-clipboard-check"></i> @lang('wizard.symptoms')
                                        </h2>
                                        <p>@lang('wizard.symptomsSelection')</p>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check" id="fever"
                                                           name="fever" value="true">
                                                    <label class="custom-control-label"
                                                           for="fever">@lang('wizard.fever')</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="malaise"
                                                           name="malaise" value="true">
                                                    <label class="custom-control-label"
                                                           for="malaise">@lang('wizard.malaise')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="myalgia"
                                                           name="myalgia" value="true">
                                                    <label class="custom-control-label"
                                                           for="myalgia">@lang('wizard.myalgia')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check" id="cough"
                                                           name="cough" value="true">
                                                    <label class="custom-control-label"
                                                           for="cough">@lang('wizard.cough')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="breathing_difficulties" name="breathing_difficulties"
                                                           value="true">
                                                    <label class="custom-control-label"
                                                           for="breathing_difficulties">@lang('wizard.breath')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="chest_pain"
                                                           name="chest_pain" value="true">
                                                    <label class="custom-control-label"
                                                           for="chest_pain">@lang('wizard.chest')
                                                    </label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="loss_of_taste"
                                                           name="loss_of_taste" value="true">
                                                    <label class="custom-control-label"
                                                           for="loss_of_taste">@lang('wizard.loss_of_taste')
                                                    </label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="loss_of_smell"
                                                           name="loss_of_smell" value="true">
                                                    <label class="custom-control-label"
                                                           for="loss_of_smell">@lang('wizard.loss_of_smell')
                                                    </label>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="other_symptom"
                                                           name="other_symptom" value="true">
                                                    <label class="custom-control-label"
                                                           for="other_symptom">@lang('wizard.other')
                                                    </label>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input check"
                                                           id="nothing"
                                                           name="nothing" value="true">
                                                    <label class="custom-control-label"
                                                           for="nothing">@lang('wizard.none')</label>
                                                </div>
                                            </li>

                                        </ul>


                                    </div>


                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous">@lang('wizard.previous')</button>


                                    <button id="sub" type="button" name="next" class="next btn btn-info"
                                            disabled="disabled"
                                            value="Next Step">@lang('wizard.next')
                                    </button>


                                </fieldset>


                                <fieldset name="fifth" id="5">


                                    <div class="form-card">
                                        <h2 class="fs-title"><i
                                                    class="fa fa-comments"></i> @lang('wizard.exposure')</h2>
                                        <div class="form-group">
                                            <br/>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#closeContact">
                                                Close contact definition
                                            </button>
                                            <!-- Modal -->


                                            <br/>
                                            <br/>


                                            <label for="vulnerable_group">@lang('wizard.covid_19_contact')</label>
                                            <label class="switch"  style="text-align: right;float: right;">
                                                <input type="checkbox" id="covid_19_contact" name="covid_19_contact" value="true">
                                                <div class="slider round">
                                                    <span class="on">@lang('wizard.yes')</span>
                                                    <span class="off">@lang('wizard.no')</span>
                                                </div>
                                            </label>
                                            <br/>

                                            {{--                                            <label for="comments">@lang('wizard.comments')</label>
                                            <textarea class="form-control" id="comments" rows="3"
                                                      name="comments"></textarea>--}}
                                        </div>
                                    </div>

                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous">@lang('wizard.previous')</button>


                                    {{ csrf_field() }}

                                    <button type="submit" name="next" class=" next btn btn-success"
                                    >@lang('wizard.test')
                                    </button>

                                </fieldset>
                                <input type="hidden" id="lat" name="lat" value="0">
                                <input type="hidden" id="long" name="long" value="0">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<span class="mobile-screen">
<footer class="footer">

<div class="container">
       <img src="{{asset('images/RISE.png')}}" width="50%" height="50%" style='float:left;'/>
       <img src="{{asset('images/logoUcy.png')}}" width="50%" height="50%"
             style='float:right;'/>
    </div>
</footer>
</span>

<span class="regular-screen">
<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4 ">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-3 mr-auto my-md-2 my-0 mt-4 mb-1">
                <img  style="margin-left: 90px" class="py-0" src="{{asset('images/Department_of_Computer_Science_en.png')}}" width="50%"
                     height="80%"/>
                {{--                <img class="py-2" src="{{asset('images/Department_of_Computer_Science_en.jpg')}}" width="80%" height="60%"/>--}}

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

                <ul class="list-unstyled">

                    <li>
                        <p>
                            <a data-toggle="modal" data-target="#aboutRise" href="#aboutRise" style="color: black">ABOUT
                                US</a>
                        </p>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

                <!-- Contact details -->
                <h5 class="font-weight-bold text-uppercase mb-4">Contact</h5>

                <ul class="list-unstyled">

                    <li>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> info@rise.org.cy</p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-phone mr-3"></i> +357 22 747575</p>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

                <!-- Social buttons -->
                <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

                <!-- Facebook -->
                <a type="button" class="btn-floating btn-fb" href="https://www.facebook.com/RISECyprus/"
                   style="color: black">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <br>
                <!-- Twitter -->
                <a type="button" class="btn-floating btn-tw" href="https://twitter.com/risecyprus?lang=en"
                   style="color: black">
                    <i class="fab fa-twitter"></i>
                </a>
                <br>
                <!-- Instagram -->
                <a type="button" class="btn-floating btn-instagram" href="https://www.instagram.com/risecyprus/"
                   style="color: black">
                    <i class="fab fa-instagram"></i>
                </a>
                <br>
                <a type="button" class="btn-floating btn-linkedin"
                   href="https://www.linkedin.com/company/rise-ltd-cyprus/" style="color: black">
                    <i class="fab fa-linkedin"></i>
                </a>


            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">

            <div class="col-md-2 col-lg-3 mr-auto my-md-2 my-0 mt-4 mb-1">

                <img class="py-0" src="{{asset('images/RISE.png')}}" width="50%" height="40%" style="margin-top: 50px"/>

                {{--                <img class="py-2" src="{{asset('images/Department_of_Computer_Science_en.jpg')}}" width="80%" height="60%"/>--}}

            </div>
        </div>
        <!-- Grid row -->


    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="http://www.rise.org.cy/en-gb/"> RISE</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</span>

{{--<div id="dialog" title="Close Contact Definition">--}}
{{--    <p>--}}
{{--    <h1>@lang('wizard.close_contact')</h1>--}}
{{--    <ul>--}}
{{--        <li>@lang('wizard.same_household')</li>--}}
{{--        <li>@lang('wizard.direct_contact')</li>--}}
{{--        <li>@lang('wizard.unprotected_direct_contact')--}}
{{--        </li>--}}
{{--        <li>@lang('wizard.face-to-face')</li>--}}
{{--        <li>@lang('wizard.closed_environment')--}}
{{--        </li>--}}
{{--        <li>@lang('wizard.healthcare_worker')--}}
{{--        </li>--}}
{{--        <li>@lang('wizard.contact_aircraft')--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    </p>--}}
{{--</div>--}}

<div class="modal fade" id="aboutRise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog mw-100 w-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About RISE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('/images/acknoledgements_RISE.png')}}" width="100%" height="80%"
                     class="d-inline-block align-top" alt="">
                <div>
                <strong><b>Contributors & Developers</b></strong> <br/>
                Dr. Vasos Vassiliou<br/>
                Dr. Loizos Michael<br/>
                Dr. Kleanthis Neokleous<br/>
                Iacovos Ioannou<br/>
                Andreas Charalampous<br/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="closeContact" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog mw-100 w-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Close Contact
                    Definition</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>
                <ul style="margin-left: 20px">
                    <li s>@lang('wizard.same_household')</li>
                    <li>@lang('wizard.direct_contact')</li>
                    <li>@lang('wizard.unprotected_direct_contact')
                    </li>
                    <li>@lang('wizard.face-to-face')</li>
                    <li>@lang('wizard.closed_environment')
                    </li>
                    <li>@lang('wizard.healthcare_worker')
                    </li>
                    <li>@lang('wizard.contact_aircraft')
                    </li>
                </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


<!-- Include Date Range Picker -->
<script type="text/javascript"
        src="{{asset('js/niceCountryInput.js')}}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>

    function onChangeCallback(ctr) {
        $("#country").val(ctr);
    }

    function onChangeCallback2(ctr) {
        $("#flight_country").val(ctr);
    }

    $(document).ready(function () {
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $("#niceCountryInputSelector").is(function (i, e) {
            new NiceCountryInput(e).init();
            $("#country").val("Cyprus (Κύπρος) CY");
        });

        $("#niceCountryInputSelector2").is(function (i, e) {
            var test = new NiceCountryInput(e).init();

        });

        $("#flight_country_div").is(function (i, e) {
            if ($("#flight_recently").is(':checked')) {
                $("#flight_country").val("Cyprus (Κύπρος) CY");
            } else {
                e.style.visibility = "hidden";
                $("#flight_country").val("");
            }
        });

        var date_input = $('input[name="symptoms_start"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        }).datepicker("setDate", new Date());


        $(".next").click(function () {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            if (current_fs[0].id == 1) {
                if ($("#age").val() == "" || $("#zipcode").val() == "") {
                    alert("Age and ZipCode are required!");
                    return;
                } else if (($("#age").val() <= 0 || $("#zipcode").val() <= 0) || ($("#age").val() >= 99)) {
                    alert("Age or ZipCode are not valid!");
                    return;
                }
            }


            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });

        $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });

        $('.radio-group .radio').click(function () {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });


        function showPosition() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    $("#lat").value = position.coords.latitude;
                    $("#long").value = position.coords.longitude;
                    var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                    document.getElementById("result").innerHTML = positionInfo;
                });
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
        }


        $("#flight_recently").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                document.getElementById("flight_country_div").style.visibility = "visible";
                document.getElementById("flight_country").value = "Cyprus (Κύπρος) CY";
            } else {
                $(this).attr('value', 'false');
                document.getElementById("flight_country_div").style.visibility = "hidden";
                document.getElementById("flight_country").value = "";
            }
        });


        $("#covid_19_contact").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }
        });


        $("#vulnerable_group").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }
        });


        $("#fever").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#malaise").is(':checked') || $("#loss_of_taste").is(':checked') || $("#loss_of_smell").is(':checked') || $("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#malaise").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_taste").is(':checked') || $("#loss_of_smell").is(':checked') || $("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#myalgia").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_taste").is(':checked') || $("#loss_of_smell").is(':checked') || $("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#cough").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_taste").is(':checked') || $("#loss_of_smell").is(':checked') || $("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#breathing_difficulties").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_taste").is(':checked') || $("#loss_of_smell").is(':checked') || $("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#chest_pain").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_taste").is(':checked') || $("#loss_of_smell").is(':checked') || $("#other_symptom").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#loss_of_taste").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_smell").is(':checked') || $("#chest_pain").is(':checked') || $("#other_symptom").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#loss_of_smell").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#loss_of_taste").is(':checked') || $("#chest_pain").is(':checked') || $("#other_symptom").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#other_symptom").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#fever").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#nothing").on('change', function () {
            if ($(this).is(':checked')) {
                $("#fever").attr("disabled", true);
                $("#other_symptom").attr("disabled", true);
                $("#chest_pain").attr("disabled", true);
                $("#breathing_difficulties").attr("disabled", true);
                $("#cough").attr("disabled", true);
                $("#myalgia").attr("disabled", true);
                $("#malaise").attr("disabled", true);
                $("#loss_of_taste").attr("disabled", true);
                $("#loss_of_smell").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                $("#fever").removeAttr("disabled");
                $("#other_symptom").removeAttr("disabled");
                $("#chest_pain").removeAttr("disabled");
                $("#breathing_difficulties").removeAttr("disabled");
                $("#cough").removeAttr("disabled");
                $("#myalgia").removeAttr("disabled");
                $("#malaise").removeAttr("disabled");
                $("#loss_of_taste").removeAttr("disabled");
                $("#loss_of_smell").removeAttr("disabled");
                $(this).attr('value', 'false');
            }
        });


    });
    $('#aboutRise').appendTo("body");
    $('#closeContact').appendTo("body");


    $('.check').change(function () {
        if ($('.check:checked').length) {
            $('#sub').removeAttr('disabled');
        } else {
            $('#sub').attr('disabled', 'disabled');
        }
    });



    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });



</script>

</html>
