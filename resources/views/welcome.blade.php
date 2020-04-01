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
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
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
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
</head>
<body>

<header>
    <nav class="navbar fixed-top navbar-expand"
         style="background-color:white;border-bottom: 2px solid rgb(44, 169, 240);">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/rise-new.png')}}" width="100" height="30" class="d-inline-block align-top" alt="">
            <span class="d-none d-sm-inline">
		<img src="{{asset('images/brand.png')}}" width="235" height="30" class="d-inline-block align-top ml-2 mt-1"
             alt="">
	</span>
        </a>
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
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 style="color: #5bc0de">@lang('wizard.coronaVirusTest')</h2>
                    <p>
                    <center><img src="{{asset('images/RISE.png')}}" width="35%"></center>
                    </p>
                    <p> @lang('wizard.disclaimer')</p>
                    <p>This test is intended for users in Cyprus. Use the Language tab on top for other
                        language options.</p>
                    <p>@lang('wizard.mandatory')</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action=" {{ route('save-test', ['locale' => App::getLocale()]) }}"
                                  method="post">
                                <ul id="progressbar">
                                    <li class="fas fa-user-alt active"><strong>@lang('wizard.demographic')</strong></li>
                                    <li class="fas fa-notes-medical"><strong>@lang('wizard.chronic_conditions')</strong>
                                    </li>
                                    <li class="fas fa-user-alt"><strong>@lang('wizard.travelling')</strong></li>
                                    <li class="fas fa-user-alt"><strong>@lang('wizard.symptoms')</strong></li>
                                    <li class="fas fa-comments"><strong>@lang('wizard.exposure')</strong></li>
                                    <li></li>
                                </ul>

                                <fieldset name="first" id="1">
                                    <div class="form-card">
                                        <h2 class="fs-title "><i class="fa fa-user"></i>@lang('wizard.demographic')
                                        </h2>
                                        <label for="age">@lang('wizard.age')</label>
                                        <input type="number" name="age" id="age" placeholder="" pattern="\d+"
                                               required oninvalid='alert("Please Insert a Number");'/>
                                        <div class="invalid-feedback">can't be blank, is a number</div>
                                        <br/>
                                        <label for="gender">@lang('wizard.gender')</label>
                                        <!-- Group of default radios - option 1 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="male"
                                                   name="gender" value="male" checked>
                                            <label class="custom-control-label"
                                                   for="defaultGroupExample1">@lang('wizard.male')</label>
                                        </div>
                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="female"
                                                   name="gender" value="female">
                                            <label class="custom-control-label"
                                                   for="defaultGroupExample2">@lang('wizard.female')</label>
                                        </div>
                                        <br/>
                                        <label for="zipcode">@lang('wizard.zip')</label>
                                        <input type="number" name="zipcode" placeholder="" pattern="\d+" id="zipcode"
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
                                                    class="fa fa-notes-medical"></i>@lang('wizard.chronic_conditions')
                                        </h2>


                                        <p>Do you have any of the following chronic conditions
                                            (*)?@lang('wizard.symptomsSelection')</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                Cardiovascular disease (including hypertension),
                                            </li>
                                            <li class="list-group-item">
                                                diabetes,
                                            </li>
                                            <li class="list-group-item">
                                                chronic diseases of the lung,
                                            </li>
                                            <li class="list-group-item">
                                                respiratory problems,
                                            </li>
                                            <li class="list-group-item">
                                                cancer,
                                            </li>
                                            <li class="list-group-item">
                                                immunodeficiency,
                                            </li>
                                        </ul>
                                        <br/>
                                        {{--
                                        <label for="vulnerable_group">@lang('wizard.chronic')*</label> --}}
                                        <label class="switch" style="text-align: right;float: right;">
                                            <input type="checkbox" id="vulnerable_group"
                                                   name="vulnerable_group" value="true">
                                            <span class="slider round"></span>
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
                                                    class="fa fa-notes-medical"></i>@lang('wizard.travelling')
                                        </h2>
                                        <label for="vulnerable_group">@lang('wizard.travel')</label>
                                        <label class="switch" style="text-align: right;float: right;">
                                            <input type="checkbox" id="flight_recently"
                                                   name="flight_recently" value="true">
                                            <span class="slider round"></span>
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
                                                    class="fa fa-notes-medical"></i>@lang('wizard.symptoms')
                                        </h2>
                                        <p>@lang('wizard.symptomsSelection')</p>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="fever"
                                                           name="fever" value="true">
                                                    <label class="custom-control-label"
                                                           for="fever">@lang('wizard.fever')</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="malaise"
                                                           name="malaise" value="true">
                                                    <label class="custom-control-label"
                                                           for="malaise">@lang('wizard.malaise')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="myalgia"
                                                           name="myalgia" value="true">
                                                    <label class="custom-control-label"
                                                           for="myalgia">@lang('wizard.myalgia')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cough"
                                                           name="cough" value="true">
                                                    <label class="custom-control-label"
                                                           for="cough">@lang('wizard.cough')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="breathing_difficulties" name="breathing_difficulties"
                                                           value="true">
                                                    <label class="custom-control-label"
                                                           for="breathing_difficulties">@lang('wizard.breath')</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="chest_pain"
                                                           name="chest_pain" value="true">
                                                    <label class="custom-control-label"
                                                           for="chest_pain">@lang('wizard.chest')
                                                    </label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
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
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="loss_of_smell"
                                                           name="loss_of_smell" value="true">
                                                    <label class="custom-control-label"
                                                           for="loss_of_smell">@lang('wizard.loss_of_smell')
                                                    </label>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="other_symptom"
                                                           name="other_symptom" value="true">
                                                    <label class="custom-control-label"
                                                           for="other_symptom">@lang('wizard.other')
                                                    </label>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="nothing"
                                                           name="nothing" value="true">
                                                    <label class="custom-control-label"
                                                           for="nothing">@lang('wizard.none')</label>
                                                </div>
                                            </li>

                                        </ul>


                                    </div>


                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous">@lang('wizard.previous')</button>


                                    <button type="button" name="next" class=" next btn btn-info"
                                            value="Next Step">@lang('wizard.next')
                                    </button>


                                </fieldset>
                                <fieldset name="fifth" id="5">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i
                                                    class="fa fa-comments"></i>@lang('wizard.covid_19_contact')</h2>
                                        <div class="form-group">
                                            <br/>
                                            <div id="opener" class="button">See here for a definition of close contact
                                            </div>
                                            <br/>
                                            <br/>
                                            <label for="vulnerable_group">@lang('wizard.covid_19_contact_short')</label>
                                            <label class="switch" style="text-align: right;float: right;">
                                                <input type="checkbox" id="covid_19_contact"
                                                       name="covid_19_contact" value="true">
                                                <span class="slider round"></span>
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
<footer class="footer">
        <div class="container text-center">
            <span id="opener_about" class="button" style="text-align: center;margin-top: 1%;" >RISE About</span>
        </div>
    <div class="container">
        <img src="{{asset('images/rise-new.png')}}" width="20%" height="20%"  style='float:left;'/>
        <img src="{{asset('images/Department_of_Computer_Science_en.jpg')}}" width="20%" height="20%" style='float:right;'/>
    </div>
</footer>
<div id="dialog" title="Close Contact Definition">
    <p>
    <h1>Close contact of a probable or confirmed case is defined as:</h1>
    <ul>
        <li>A person living in the same household as a COVID-19 case</li>
        <li>A person having had direct physical contact with a COVID-19 case (e.g. shaking hands)</li>
        <li>A person having unprotected direct contact with infectious secretions of a COVID-19 case (e.g. being coughed
            on, touching used paper tissues with a bare hand)
        </li>
        <li>A person having had face-to-face contact with a COVID-19 case within 2 metres and > 15 minutes</li>
        <li>A person who was in a closed environment (e.g. classroom, meeting room, hospital waiting room, etc.) with a
            COVID-19 case for 15 minutes or more and at a distance of less than 2 metres
        </li>
        <li>A healthcare worker (HCW) or other person providing direct care for a COVID-19 case, or laboratory workers
            handling specimens from a COVID-19 case without recommended personal protective equipment (PPE) or with a
            possible breach of PPE
        </li>
        <li>A contact in an aircraft sitting within two seats (in any direction) of the COVID-19 case, travel companions
            or persons providing care, and crew members serving in the section of the aircraft where the index case was
            seated (if severity of symptoms or movement of the case indicate more extensive exposure, passengers seated
            in the entire section or all passengers on the aircraft may be considered close contacts)
        </li>
    </ul>
    </p>
</div>

<div id="about_dialog" title="About">
    <p>
    <h1>RISE</h1>
    <img src="{{asset('images/acknoledgements_RISE.png')}}"/>
    </p>
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

        //showPosition(); //to enable when wy have certificate



        $("#dialog").dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
            width: "50%",
            hight: "50%",
        });


        $("#about_dialog").dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
            width: "50%",
            hight: "50%",
        });


        $("#opener").on("click", function () {
            $("#dialog").dialog("open");
        });

        $("#opener_about").on("click", function () {
            $("#about_dialog").dialog("open");
        });


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
            }
            else {
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
</script>

</html>
