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
    <link href="{{asset('css/lang.css')}}" rel="stylesheet">
    <link href="{{asset('css/wizard.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Styles -->
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars"
                aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
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
                                    Turkey</a>
                            </div>
                        @elseif(App::isLocale('gr'))
                            <a class="nav-link dropdown-toggle" href="gr" id="dropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-gr"> </span> Greek</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="en"><span class="flag-icon flag-icon-us"> </span>
                                    English</a>
                                <a class="dropdown-item" href="tr"><span class="flag-icon flag-icon-tr"> </span>
                                    Turkey</a>
                            </div>
                        @elseif(App::isLocale('tr'))
                            <a class="nav-link dropdown-toggle" href="tr" id="dropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-tr"> </span> Turkey</a>
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
                    <h2><strong>@lang('wizard.results')</strong></h2>
                    <p>
                    <center><img src="{{asset('images/RISE.png')}}" width="30%"></center>
                    </p>
                    <p class="disclaimer-2">@lang('wizard.disclaimer')</p>
                    {{--                    <p>The Result:</p>--}}
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            @switch($suggest)

                                @case("CASE1")
                                <h1><b>You are at a low risk for serious illness from COVID-19 and are not showing
                                        concerning symptoms </b></h1>
                                <p style="text-align: left;float: left;">
                                    It is unlikely that you have coronavirus
                                    We still recommend following general precautionary measures to minimize your risk of
                                    contracting the disease that are detailed at https://www.pio.gov.cy/coronavirus/
                                    <br/>
                                    According to official instructions you should act as follows:
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>You don't need to stay in quarantine, but as a general rule, everyone who can
                                        stay at home should do so. If you cannot stay at home, please maintain at least
                                        a
                                        2 metre distance with everyone.
                                    </li>

                                    <li>Monitor your health, particularly if you are over 60 years old or suffer from a
                                        chronic condition such as diabetes, lung disease or heart disease
                                    </li>

                                    <li>In case you develop symptoms, retake this self-assessment questionnaire.</li>

                                    <li>The COVID19 Emergency Response Line (1420) should be called only in case of
                                        emergency.
                                    </li>
                                </ul>
                                </p>
                                @break
                                @case("CASE2")
                                <h1><b>You are at a high risk for getting infected from COVID-19, but are not showing
                                        concerning symptoms</b></h1>
                                <p style="text-align: left;float: left;">
                                    Your symptoms are not indicative of a respiratory virus. However, due to your age
                                    and/or your chronic conditions, if you become infected, you are at risk of having a
                                    more
                                    severe course of the disease.
                                    We still recommend following general precautionary measures to minimize your risk of
                                    contracting the disease that are detailed at https://www.pio.gov.cy/coronavirus/
                                    <br/>
                                    According to official instructions you should act as follows:
                                <ul style="text-align: left;float: left; padding-left: 10%;">
                                    <li>Remain secluded for two weeks.
                                    </li>

                                    <li>Monitor your health
                                    </li>

                                    <li>In case you develop symptoms, contact your General Practitioner.
                                        The COVID19 Emergency Response Line (1420) should be called only in case of
                                        emergency.
                                    </li>

                                </ul>
                                </p>
                                @break
                                @case("CASE3")

                                <h1><b>You are at low risk for serious illness from COVID-19, but might be infected by
                                        the
                                        virus</b></h1>
                                <p style="text-align: left;float: left;">
                                    Your travel history or symptoms indicate that you may be infected by COVID-19.
                                    <br/>
                                    According to official instructions you should act as follows:
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>Contact your general practitioner who will arrange your further examination and
                                        treatment.*
                                    </li>

                                    <li>Remain in quarantine for two weeks.
                                    </li>

                                    <li>Monitor your health, particularly if you are over 60 years old or suffer from a
                                        chronic condition such as diabetes, lung disease or heart disease.
                                    </li>

                                    <li>In case you develop symptoms, retake this self-assessment questionnaire.
                                    </li>
                                </ul>

                                @break
                                @case("CASE4")
                                <h1><b>Your travel history and symptoms are indicative of a respiratory virus, which may
                                        be
                                        COVID-19.</b></h1>
                                <p style="text-align: left;float: left;">
                                    According to official instructions you should act as follows:
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>Contact your general practitioner who will arrange your further examination and
                                        treatment.*
                                    </li>

                                    <li>Remain in quarantine for two weeks.
                                    </li>

                                    <li>The COVID19 Emergency Response Line (1420) should be called only in case of
                                        emergency.
                                    </li>

                                    <li>Inform those you have been in close contact with to monitor their health, stay
                                        home if possible, and to fill out this self-assessment questionnaire for further
                                        instructions if necessary
                                    </li>
                                </ul>

                                @break
                                @case("CASE5")
                                <h1><b>You may have contracted COVID-19.</b></h1>
                                <p style="text-align: left;float: left;">
                                    Your travel history and/or symptoms are indicative of a respiratory virus, which may
                                    be
                                    COVID-19. Due to your age and/or your chronic conditions, you are at risk of having
                                    a
                                    more severe course of the disease.
                                    <br/>
                                    According to official instructions you should act as follows:
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>Contact the COVID19 Emergency Response Line (1420)
                                    </li>

                                    <li>Remain in quarantine for two weeks.
                                    </li>

                                    <li>Inform those you have been in close contact with to monitor their health, stay
                                        home if possible, and to fill out this self-assessment questionnaire for further
                                        instructions if necessary
                                    </li>
                                </ul>


                                @break
                                @case("error_occured")
                                <div style="background-color: #ffd000;">
                                    <h1><b>@lang('wizard.systemError')</b></h1> <br/>
                                    <p>@lang('wizard.error')</p>
                                    </p>
                                </div>
                                @break

                                @default
                                <span>@lang('wizard.tryAgain')</span>
                                @break
                            @endswitch
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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function () {

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


        $("#opener_about").on("click", function () {
            $("#about_dialog").dialog("open");
        });
    });

</script>
</html>
