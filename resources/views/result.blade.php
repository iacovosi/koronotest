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


        <button id="opener_about" type="button" class="btn btn-light border-0 ml-auto" data-toggle="modal"
                data-target="#about_rise"
                style="color: #5bc0de; background-color: transparent; ">
            About RISE
        </button>


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
                                <h1><b>@lang("wizard.case1")</b></h1>
                                <p style="text-align: left;float: left;">
                                    @lang("wizard.result1")
                                    <br/>
                                @lang("wizard.case_instructions")
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li> @lang("wizard.1instruction1")
                                    </li>

                                    <li> @lang("wizard.1instruction2")
                                    </li>

                                    <li> @lang("wizard.1instruction3")</li>

                                    <li> @lang("wizard.1instruction4")
                                    </li>
                                </ul>
                                </p>
                                @break
                                @case("CASE2")
                                <h1><b> @lang("wizard.case2")</b></h1>
                                <p style="text-align: left;float: left;">
                                    @lang("wizard.result2")
                                    <br/>
                                @lang("wizard.case_instructions")
                                <ul style="text-align: left;float: left; padding-left: 10%;">
                                    <li>@lang("wizard.2instruction1")
                                    </li>

                                    <li>
                                    <li>@lang("wizard.2instruction2")
                                    </li>

                                    <li>
                                    <li>@lang("wizard.2instruction3")
                                    </li>

                                </ul>
                                </p>
                                @break
                                @case("CASE3")

                                <h1><b>@lang("wizard.case3")</b></h1>
                                <p style="text-align: left;float: left;">
                                    @lang("wizard.result3")
                                    <br/>
                                @lang("wizard.case_instructions")
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>@lang("wizard.3instruction1")
                                    </li>

                                    <li>@lang("wizard.3instruction2")
                                    </li>

                                    <li>@lang("wizard.3instruction3")
                                    </li>

                                    <li>@lang("wizard.3instruction4")
                                    </li>
                                </ul>

                                @break
                                @case("CASE4")
                                <h1><b>@lang("wizard.case4")</b></h1>
                                <p style="text-align: left;float: left;">
                                @lang("wizard.case_instructions")
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>@lang("wizard.4instruction1")
                                    </li>

                                    <li>@lang("wizard.4instruction2")
                                    </li>

                                    <li>@lang("wizard.4instruction3")
                                    </li>

                                    <li>@lang("wizard.4instruction4")
                                    </li>
                                </ul>

                                @break
                                @case("CASE5")
                                <h1><b>@lang("wizard.case5")</b></h1>
                                <p style="text-align: left;float: left;">
                                    @lang("wizard.result5")
                                    <br/>
                                @lang("wizard.case_instructions")
                                <ul style="text-align: left;float: left;padding-left: 10%;">
                                    <li>@lang("wizard.5instruction1")
                                    </li>

                                    <li>@lang("wizard.5instruction2")
                                    </li>

                                    <li>@lang("wizard.5instruction3")
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
    {{--        <div class="container text-center">--}}
    {{--            <span id="opener_about" class="button" style="text-align: center;margin-top: 1%;" >RISE About</span>--}}
    {{--        </div>--}}
    <div class="container">
        <img class="py-5" src="{{asset('images/RISE.png')}}" width="20%" height="20%" style='float:left;'/>
        <img class="py-5 mt-4" src="{{asset('images/Department_of_Computer_Science_en.jpg')}}" width="20%" height="20%"
             style='float:right;'/>
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
