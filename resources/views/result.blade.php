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

    <!-- Styles -->
    <style>

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

                                @case("nothing_for_now_not_infected")
                                <div style="background-color:	#C0C0C0;">
                                    <h1>
                                        <span><b>@lang('wizard.guides')</b><br/></span>
                                    </h1>
                                    <p><b>@lang('wizard.caseResultsNot')</b></p>
{{--                                    <p>Nothing for now!Not Affected!</p>--}}

                                </div>
                                @break

                                @case("odigies_apo_pi")
                                <div style="background-color: 	#C0C0C0;">
                                    <h1>
                                        <span><b>@lang('wizard.guides')</b><br/></span>
                                    </h1>
                                    <p>@lang('wizard.caseResultsNot')</p>
                                    <p>@lang('wizard.personalDrGuides')</p>
                                    </h1>
                                </div>
                                @break

                                @case("stay_home_14_days_asymptomatic")
                                <div style="background-color: #09c7ff;">
                                    <h1>
                                        <span><b>@lang('wizard.caseResultsInfected')</b></span>
                                    </h1>
                                    <p>
                                        <span><b>@lang('wizard.tips')</b></span> <br/>
                                        @lang('wizard.restriction') <br/>
                                        @lang('wizard.selfMonitoring') <br/>
                                        @lang('wizard.telephoneContact')
                                    </p>
                                </div>
                                @break

                                @case("stay_home_14_days_symptomatic")
                                <div style="background-color: #09c7ff;">
                                    <h1>
                                        <span><b>@lang('wizard.caseResultsInfected')</b></span>
                                    </h1>
                                    <p>
                                        <span><b>@lang('wizard.tips')</b></span> <br/>
                                        <br/>
                                        @lang('wizard.1420') <br/> @lang('wizard.restriction')
                                        @lang('wizard.selfMonitoring') <br/>
                                        @lang('wizard.telephoneContact')
                                    </p>
                                </div>
                                @break
                                <div style="background-color: red;">
                                    @case("go_and_seek_public_health_care")
                                    <h1><b> @lang('wizard.probablyInfected')</b></h1> <br/>
                                    <p> @lang('wizard.healthcare')</p>
                                    </p>
                                </div>
                                @break
                                <div style="background-color: #ffd000;">
                                    @case("error_occured")
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
        <span class="text-muted">Research Centre on Interactive Media, Smart Systems and Emerging Technologies - RISE Ltd.</span>
    </div>
</footer>
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        crossorigin="anonymous"></script>


</html>
