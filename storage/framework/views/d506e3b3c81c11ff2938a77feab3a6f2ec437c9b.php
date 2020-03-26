<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coronavirus Test</title>

    <!-- Fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <link href="<?php echo e(asset('css/lang.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/wizard.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' rel='stylesheet'>
</head>
<body>

<header>
    <nav class="navbar fixed-top navbar-expand"
         style="background-color:white;border-bottom: 2px solid rgb(44, 169, 240);">
        <a class="navbar-brand" href="/">
            <img src="<?php echo e(asset('images/rise-new.png')); ?>" width="100" height="30" class="d-inline-block align-top" alt="">
            <span class="d-none d-sm-inline">
		<img src="<?php echo e(asset('images/brand.png')); ?>" width="235" height="30" class="d-inline-block align-top ml-2 mt-1"
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

                        <?php if(App::isLocale('en')): ?>
                            <a class="nav-link dropdown-toggle" href="en" id="dropdown09"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-us"> </span> English</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="gr"><span class="flag-icon flag-icon-gr"> </span>
                                    Greek</a>
                                <a class="dropdown-item" href="tr"><span class="flag-icon flag-icon-tr"> </span>
                                    Turkish</a>
                            </div>
                        <?php elseif(App::isLocale('gr')): ?>
                            <a class="nav-link dropdown-toggle" href="gr" id="dropdown09"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-gr"> </span> Greek</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="en"><span class="flag-icon flag-icon-us"> </span>
                                    English</a>
                                <a class="dropdown-item" href="tr"><span class="flag-icon flag-icon-tr"> </span>
                                    Turkish</a>
                            </div>
                        <?php elseif(App::isLocale('tr')): ?>
                            <a class="nav-link dropdown-toggle" href="tr" id="dropdown09"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="flag-icon flag-icon-tr"> </span> Turkish</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="en"><span class="flag-icon flag-icon-us"> </span>
                                    English</a>
                                <a class="dropdown-item" href="gr"><span class="flag-icon flag-icon-gr"> </span>
                                    Greek</a>
                            </div>

                        <?php endif; ?>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

</header>


<div class="flex-center position-ref full-height">
    <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/home')); ?>">Home</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Login</a>

                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                    <?php endif; ?>
        </div>
<?php endif; ?>

<!-- MultiStep Form -->
    <div class="container-fluid mt-5" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 style="color: #5bc0de"><?php echo app('translator')->get('wizard.coronaVirusTest'); ?></h2>
                    <p>
                    <center><img src="<?php echo e(asset('images/RISE.png')); ?>" width="35%"></center>
                    </p>
                    <p> <?php echo app('translator')->get('wizard.disclaimer'); ?></p>
                    <p><?php echo app('translator')->get('wizard.mandatory'); ?></p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action=" <?php echo e(route('save-test', ['locale' => App::getLocale()])); ?>"
                                  method="post">
                                <!-- progressbar -->
                                
                                <ul id="progressbar">
                                    <li class="fas fa-user-alt active"><strong><?php echo app('translator')->get('wizard.personal'); ?></strong></li>
                                    <li class="fas fa-notes-medical"><strong><?php echo app('translator')->get('wizard.medical'); ?></strong></li>
                                    <li class="fas fa-comments"><strong><?php echo app('translator')->get('wizard.comments'); ?></strong></li>
                                    <li></li>
                                </ul> <!-- fieldsets -->
                                

                                <fieldset name="first" id="1">
                                    <div class="form-card">
                                        <h2 class="fs-title "><i class="fa fa-user"></i><?php echo app('translator')->get('wizard.personalInfo'); ?>
                                        </h2>
                                        <label for="email"><?php echo app('translator')->get('wizard.email'); ?></label>
                                        <input type="email" name="email" placeholder=""/>
                                        <label for="name"><?php echo app('translator')->get('wizard.full'); ?></label>
                                        <input type="text" name="name" placeholder=""/>
                                        <label for="zipcode"><?php echo app('translator')->get('wizard.zip'); ?></label>
                                        <input type="number" name="zipcode" placeholder="" pattern="\d+"/>
                                        <label for="age"><?php echo app('translator')->get('wizard.age'); ?></label>
                                        <input type="number" name="age" id="age" placeholder="" pattern="\d+"
                                               required/>
                                        <label for="mobile"><?php echo app('translator')->get('wizard.mobileNo'); ?></label>
                                        <input type="mobile" name="mobile" placeholder=""/>
                                        <label for="gender"><?php echo app('translator')->get('wizard.gender'); ?></label>
                                        <!-- Group of default radios - option 1 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample1"
                                                   name="gender" value="male" checked>
                                            <label class="custom-control-label"
                                                   for="defaultGroupExample1"><?php echo app('translator')->get('wizard.male'); ?></label>
                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample2"
                                                   name="gender" value="female">
                                            <label class="custom-control-label"
                                                   for="defaultGroupExample2"><?php echo app('translator')->get('wizard.female'); ?></label>
                                        </div>
                                        <br/>
                                        <p><?php echo app('translator')->get('wizard.selection'); ?></p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="covid_19_contact_within_14_from_today"
                                                           name="covid_19_contact_within_14_from_today" value="true">
                                                    <label class="custom-control-label"
                                                           for="covid_19_contact_within_14_from_today"><?php echo app('translator')->get('wizard.contact'); ?></label>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="flight_recently"
                                                           name="flight_recently" value="true">
                                                    <label class="custom-control-label"
                                                           for="flight_recently"><?php echo app('translator')->get('wizard.travel'); ?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <button type="button" name="next" class=" next btn btn-info"
                                            value="Next Step"><?php echo app('translator')->get('wizard.next'); ?>
                                    </button>
                                </fieldset>
                                <fieldset name="second" id="2">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i
                                                    class="fa fa-notes-medical"></i><?php echo app('translator')->get('wizard.medicalInfo'); ?></h2>
                                        <label for="fever"><?php echo app('translator')->get('wizard.bodyTemp'); ?></label>
                                        <input type="number" id="fever" name="fever"
                                               placeholder=""
                                               type="number" required min="0" value="37.2" step="0.01"/>
                                        <label for="symptoms_start"><?php echo app('translator')->get('wizard.symptomsDate'); ?></label>
                                        <input class="form-control" type="text" value="" id="symptoms_start"
                                               name="symptoms_start">
                                        <br/>
                                        <p><?php echo app('translator')->get('wizard.medicalInfoSelection'); ?></p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="covid_19_contact_within_14_from_symptoms"
                                                           name="covid_19_contact_within_14_from_symptoms" value="true">
                                                    <label class="custom-control-label"
                                                           for="covid_19_contact_within_14_from_symptoms"><?php echo app('translator')->get('wizard.contact'); ?></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="vulnerable_group"
                                                           name="vulnerable_group" value="true">
                                                    <label class="custom-control-label" for="vulnerable_group">
                                                        <?php echo app('translator')->get('wizard.chronic'); ?></label>
                                                </div>
                                            </li>
                                        </ul>
                                        <br/>
                                        <p><?php echo app('translator')->get('wizard.symptomsSelection'); ?></p>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="malaise"
                                                           name="malaise" value="true">
                                                    <label class="custom-control-label"
                                                           for="malaise"><?php echo app('translator')->get('wizard.malaise'); ?></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="myalgia"
                                                           name="myalgia" value="true">
                                                    <label class="custom-control-label"
                                                           for="myalgia"><?php echo app('translator')->get('wizard.myalgia'); ?></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cough"
                                                           name="cough" value="true">
                                                    <label class="custom-control-label"
                                                           for="cough"><?php echo app('translator')->get('wizard.cough'); ?></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="breathing_difficulties" name="breathing_difficulties"
                                                           value="true">
                                                    <label class="custom-control-label"
                                                           for="breathing_difficulties"><?php echo app('translator')->get('wizard.breath'); ?></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="chest_pain"
                                                           name="chest_pain" value="true">
                                                    <label class="custom-control-label"
                                                           for="chest_pain"><?php echo app('translator')->get('wizard.chest'); ?>
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
                                                           for="other_symptom"><?php echo app('translator')->get('wizard.other'); ?>
                                                    </label>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <!-- Default checked -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="nothing"
                                                           name="nothing" value="true">
                                                    <label class="custom-control-label"
                                                           for="nothing"><?php echo app('translator')->get('wizard.none'); ?></label>
                                                </div>
                                            </li>

                                        </ul>


                                    </div>


                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous"><?php echo app('translator')->get('wizard.previous'); ?></button>


                                    <button type="button" name="next" class=" next btn btn-info"
                                            value="Next Step"><?php echo app('translator')->get('wizard.next'); ?>
                                    </button>


                                </fieldset>
                                <fieldset name="third" id="3">
                                    <div class="form-card">
                                        <h2 class="fs-title"><i class="fa fa-comments"></i><?php echo app('translator')->get('wizard.comments'); ?></h2>
                                        <div class="form-group">
                                            
                                            <textarea class="form-control" id="comments" rows="3"
                                                      name="comments"></textarea>
                                        </div>
                                    </div>

                                    <button type="button" name="previous" class="previous btn btn-secondary"
                                            value="Previous"><?php echo app('translator')->get('wizard.previous'); ?></button>


                                    <?php echo e(csrf_field()); ?>


                                    <button type="submit" name="next" class=" next btn btn-success"
                                    ><?php echo app('translator')->get('wizard.test'); ?>
                                    </button>


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
    <div class="container text-center">
        <span class="text-muted" style="text-align: center">Research Centre on Interactive Media, Smart Systems and Emerging Technologies - RISE Ltd.</span>
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
                $("#symptoms_start").attr("disabled", true);
                $("#covid_19_contact_within_14_from_symptoms").attr("disabled", true);
                $(this).attr('value', 'true');
            } else {

                $("#other_symptom").removeAttr("disabled");
                $("#chest_pain").removeAttr("disabled");
                $("#breathing_difficulties").removeAttr("disabled");
                $("#cough").removeAttr("disabled");
                $("#myalgia").removeAttr("disabled");
                $("#malaise").removeAttr("disabled");
                $("#symptoms_start").removeAttr("disabled");
                $("#covid_19_contact_within_14_from_symptoms").removeAttr("disabled");
                $(this).attr('value', 'false');
            }
        });


    });
</script>

</html>
<?php /**PATH C:\Users\iacovosi\Google Drive\1420\koronotest\resources\views/welcome.blade.php ENDPATH**/ ?>