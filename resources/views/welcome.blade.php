<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coronavirus Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <link href="{{asset('css/lang.css')}}" rel="stylesheet">
    <link href="{{asset('css/wizard.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' rel='stylesheet'>
</head>
<body>

<header>
    <div id="navbar-main">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="/">CORONAVIRUS TEST</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                    aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                </ul>
                <form class="form-inline my-2 my-md-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">

                            @if (App::isLocale('en'))
                                <a class="nav-link dropdown-toggle" href="en/" id="dropdown09"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="flag-icon flag-icon-us"> </span> English</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown09">
                                    <a class="dropdown-item" href="gr/"><span class="flag-icon flag-icon-gr"> </span>
                                        Greek</a>
                                    <a class="dropdown-item" href="tr/"><span class="flag-icon flag-icon-tr"> </span>
                                        Turkey</a>
                                </div>
                            @elseif(App::isLocale('gr'))
                                <a class="nav-link dropdown-toggle" href="gr/" id="dropdown09"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="flag-icon flag-icon-gr"> </span> Greek</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown09">
                                    <a class="dropdown-item" href="en/"><span class="flag-icon flag-icon-us"> </span>
                                        English</a>
                                    <a class="dropdown-item" href="tr/"><span class="flag-icon flag-icon-tr"> </span>
                                        Turkey</a>
                                </div>
                            @elseif(App::isLocale('tr'))
                                <a class="nav-link dropdown-toggle" href="tr/" id="dropdown09"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="flag-icon flag-icon-tr"> </span> Turkey</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown09">
                                    <a class="dropdown-item" href="en/"><span class="flag-icon flag-icon-us"> </span>
                                        English</a>
                                    <a class="dropdown-item" href="gr/"><span class="flag-icon flag-icon-gr"> </span>
                                        Greek</a>
                                </div>

                            @endif
                        </li>
                    </ul>
                </form>
            </div>
        </nav>
    </div>
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
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>@lang('wizard.KoronaVirusTest')</strong></h2>
                    <p>
                    <center><img src="{{asset('images/RISE.jpg')}}" width="30%"></center>
                    </p>
                    <p> While based upon the guidelines and recommendations of the CDC, this content
                        is not intended to be a substitute for professional medical advice, diagnosis, or treatment.
                        Always seek the advice of your physician or other qualified health provider with any questions
                        you may have regarding a medical condition.</p>
                    <p>The fields marked with * are required for the Test, all other are used for statistical
                        purposes</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action=" {{ route('save-test') }}" method="post">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="fas fa-user-alt active"><strong>Personal</strong></li>
                                    <li class="fas fa-notes-medical"><strong>Medical</strong></li>
                                    <li class="fas fa-comments"><strong>Comments</strong></li>
                                    <li></li>
                                </ul> <!-- fieldsets -->
                                <fieldset name="first" id="1">
                                    <div class="form-card">
                                        <h2 class="fs-title "><i class="fa fa-user"></i>Personal Information</h2>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" placeholder="Email" type="email"/>
                                        <label for="name">Name & Surname</label>
                                        <input type="text" name="name" placeholder="Name & Surname"/>
                                        <label for="zipcode">Zip Code</label>
                                        <input type="number" name="zipcode" placeholder="Zip Code" pattern="\d+"/>
                                        <label for="age">Age (*)</label>
                                        <input type="number" name="age" id="age" placeholder="Age" pattern="\d+"
                                               required/>
                                        <label for="mobile">Mobile Number</label>
                                        <input type="mobile" name="mobile" placeholder="Mobile Number"/>
                                        <label for="gender">Gender (*)</label>
                                        <!-- Group of default radios - option 1 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample1"
                                                   name="gender" value="male" checked>
                                            <label class="custom-control-label" for="defaultGroupExample1">Male</label>
                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample2"
                                                   name="gender" value="female">
                                            <label class="custom-control-label"
                                                   for="defaultGroupExample2">Female</label>
                                        </div>
                                        <br/>
                                        <p>Please select what is right for your case:</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="covid_19_contact_within_14_from_today"
                                                           name="covid_19_contact_within_14_from_today" value="true">
                                                    <label class="custom-control-label"
                                                           for="covid_19_contact_within_14_from_today">Contact with a
                                                        COVID-19
                                                        infected person withing 14 days from today</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="flight_recently"
                                                           name="flight_recently" value="true">
                                                    <label class="custom-control-label"
                                                           for="flight_recently">Did you travel abroad recendly?</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step"/>
                                </fieldset>
                                <fieldset name="second" id="2">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i class="fa fa-notes-medical"></i>Medical Information</h2>
                                        <label for="fever">Body Temperature Measurment in Celsius(*)</label>
                                        <input type="number" id="fever" name="fever"
                                               placeholder="Body Temperature Measurment"
                                               type="number" required min="0" value="37.4" step="0.01"/>
                                        <label for="symptoms_start">Begining of Symptoms Date</label>
                                        <input class="form-control" type="text" value="" id="symptoms_start"
                                               name="symptoms_start">
                                        <br/>
                                        <p>Please select what is right medical information for your case:</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="covid_19_contact_within_14_from_symptoms"
                                                           name="covid_19_contact_within_14_from_symptoms" value="true">
                                                    <label class="custom-control-label"
                                                           for="covid_19_contact_within_14_from_symptoms">Contact with a
                                                        COVID-19
                                                        infected person withing 14 days from symptoms</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="vulnerable_group"
                                                           name="vulnerable_group" value="true">
                                                    <label class="custom-control-label" for="vulnerable_group">
                                                        Cronical issues (diabetes/heart disease/lung
                                                        disease/cancer/smoking/other issues)</label>
                                                </div>
                                            </li>
                                        </ul>
                                        <br/>
                                        <p>Please select what is right about medical symptoms for your case:</p>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="malaise"
                                                           name="malaise" value="true">
                                                    <label class="custom-control-label" for="malaise">Malaise</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="myalgia"
                                                           name="myalgia" value="true">
                                                    <label class="custom-control-label" for="myalgia">Myalgia</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cough"
                                                           name="cough" value="true">
                                                    <label class="custom-control-label" for="cough">Cough</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="breathing_difficulties" name="breathing_difficulties"
                                                           value="true">
                                                    <label class="custom-control-label" for="breathing_difficulties">Breathing
                                                        difficulties</label>
                                                </div>
                                            </li>
                                            <!-- Default checked -->
                                            <!--
                                            <li class="list-group-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="symptoms_more_than_two_days"
                                                           name="symptoms_more_than_two_days" value="true">
                                                    <label class="custom-control-label"
                                                           for="symptoms_more_than_two_days">Symptoms more than two
                                                        days</label>
                                                </div>
                                            </li> -->
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="chest_pain"
                                                           name="chest_pain" value="true">
                                                    <label class="custom-control-label" for="chest_pain">Chest
                                                        pain</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="other_symptom"
                                                           name="other_symptom" value="true">
                                                    <label class="custom-control-label" for="other_symptom">Other
                                                        Symptom</label>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="nothing"
                                                           name="nothing" value="true">
                                                    <label class="custom-control-label" for="nothing">Nothing from the
                                                        above</label>
                                                </div>
                                            </li>

                                        </ul>


                                    </div>


                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>


                                    <input type="button" name="next"
                                           class="next action-button" value="Next Step"/>
                                </fieldset>
                                <fieldset name="third" id="3">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i class="fa fa-comments"></i>Comments</h2>
                                        <div class="form-group">
                                            <label for="comments">Comments</label>
                                            <textarea class="form-control" id="comments" rows="3"
                                                      name="comments"></textarea>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                    {{ csrf_field() }}
                                    <input type="submit" name="test" class="next action-button" value="Test"/>
                                </fieldset>
                                <input type="hidden" id="lat" name="lat" value="3487">
                                <input type="hidden" id="long" name="long" value="3487">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
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
<!-- Include Date Range Picker -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function () {
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        showPosition();

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
            //alert(current_fs[0].id);
            //console.log(next_fs[0]);
            //console.log($("#age").val());
            if (current_fs[0].id == 1) {
                console.log($("#age").val());
                if ($("#age").val() == "") {
                    alert("Age is required!");
                    return;
                }
            }


            if (current_fs[0].id == 2) {
                console.log($("#fever").val());
                if ($("#fever").val() == "") {
                    alert("Body Temperature is required!");
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
            } else {
                $(this).attr('value', 'false');
            }
        });

        $("#covid_19_contact_within_14_from_today").on('change', function () {
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

        $("#covid_19_contact_within_14_from_symptoms").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }
        });


        $("#malaise").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked'))) {
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
                    if (!($("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#malaise").is(':checked'))) {
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
                    if (!($("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
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
                    if (!($("#other_symptom").is(':checked') || $("#chest_pain").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });

        /*
                $("#symptoms_more_than_two_days").on('change', function () {
                    if ($(this).is(':checked')) {
                        $(this).attr('value', 'true');
                    } else {
                        $(this).attr('value', 'false');
                    }
                });
        */


        $("#chest_pain").on('change', function () {
            if ($(this).is(':checked')) {
                $("#nothing").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {
                if ($("#nothing").is('[disabled=disabled]')) {
                    if (!($("#other_symptom").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
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
                    if (!($("#chest_pain").is(':checked') || $("#breathing_difficulties").is(':checked') || $("#cough").is(':checked') || $("#myalgia").is(':checked') || $("#malaise").is(':checked'))) {
                        $("#nothing").removeAttr("disabled");
                    }
                    $(this).attr('value', 'false');
                }
            }
        });


        $("#nothing").on('change', function () {
            if ($(this).is(':checked')) {
                $("#other_symptom").attr("disabled", true);
                $("#chest_pain").attr("disabled", true);
                $("#breathing_difficulties").attr("disabled", true);
                $("#cough").attr("disabled", true);
                $("#myalgia").attr("disabled", true);
                $("#malaise").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {

                $("#other_symptom").removeAttr("disabled");
                $("#chest_pain").removeAttr("disabled");
                $("#breathing_difficulties").removeAttr("disabled");
                $("#cough").removeAttr("disabled");
                $("#myalgia").removeAttr("disabled");
                $("#malaise").removeAttr("disabled");

                $(this).attr('value', 'false');
            }
        });


    });
</script>

</html>
