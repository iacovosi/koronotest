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
{{--                    <p>--}}
{{--                    <center><img src="{{asset('images/RISE.png')}}" width="30%"></center>--}}
{{--                    </p>--}}
                    <br><br>
                    <p style="text-align: center; padding: 0px 30px 0px 30px"> @lang('wizard.disclaimerp1')
                        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">WHO</a>,
                        <a href="https://www.ecdc.europa.eu/en">ECDC </a>@lang('wizard.disclaimerp1.5')
                        <a href="https://www.cdc.gov/">CDC</a>@lang('wizard.disclaimerp2')

                    </p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            @switch($suggest)

                                @case("CASE1")
                                <h1><b>@lang("wizard.case1")</b></h1>
                                <p style="text-align: center; padding-left: 10px">
                                    @lang("wizard.result1")
                                    <br/>
                               <p class="text-center"><strong>@lang("wizard.case_instructions")</strong></p>
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
                                <p style="text-align: center; padding-left: 10px">
                                    @lang("wizard.result2")
                                    <br/>
                                <p class="text-center"><strong>@lang("wizard.case_instructions")</strong></p>
                                <ul style="text-align: center;float: left; padding-left: 10%;">
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
                                <p style="text-align: center; padding-left: 10px">
                                    @lang("wizard.result3")
                                    <br/>
                                <p class="text-center"><strong>@lang("wizard.case_instructions")</strong></p>
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
                                <p style="text-align: center; padding-left: 10px">
                                <p class="text-center"><strong>@lang("wizard.case_instructions")</strong></p>
                                <ul style="text-align: center;float: left;padding-left: 10%;">
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
                                <p style="text-align: center; padding-left: 10px">
                                    @lang("wizard.result5")
                                    <br/>
                                <p class="text-center"><strong>@lang("wizard.case_instructions")</strong></p>
                                <ul style="text-align: center;float: left; padding-left: 10%;">
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
{{--<footer class="footer">--}}
{{--    --}}{{--        <div class="container text-center">--}}
{{--    --}}{{--            <span id="opener_about" class="button" style="text-align: center;margin-top: 1%;" >RISE About</span>--}}
{{--    --}}{{--        </div>--}}
{{--    <div class="container">--}}
{{--        <img class="py-5" src="{{asset('images/RISE.png')}}" width="20%" height="20%" style='float:left;'/>--}}
{{--        <img class="py-5 mt-4" src="{{asset('images/Department_of_Computer_Science_en.jpg')}}" width="20%" height="20%"--}}
{{--             style='float:right;'/>--}}
{{--    </div>--}}
{{--</footer>--}}


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

<!-- Modal -->
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

    $('#aboutRise').appendTo("body");
</script>
</html>
