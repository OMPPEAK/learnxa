<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php //print $title; ?></title>
    <link rel="icon" type="image/ico" href="favicon.ico">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link href='packages/core/main.css' rel='stylesheet' />
    <link href='packages/daygrid/main.css' rel='stylesheet' />
    <link href='packages/list/main.css' rel='stylesheet' />
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">
    <!--- FullCalendar plugin --->
    <link href='packages/core/main.css' rel='stylesheet' />
    <link href='packages/daygrid/main.css' rel='stylesheet' />
    <link href='packages/list/main.css' rel='stylesheet' />
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top header-bg-dark" style="background: #FFFFFF!;">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="https://techarise.com">
                <h1>Tech Arise</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://techarise.com">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://techarise.com/php-free-script-demos/">Live Demo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style type="text/css">
        .fc-sun {
            color: red;
        }

        .fc-ltr .fc-dayGrid-view .fc-day-top .fc-day-number {
            float: none;
        }

        .fc-day-top {
            text-align: center !important;
        }
    </style>
    <section class="showcase">
        <div class="container">
            <div class="pb-2 mt-4 mb-2 border-bottom">
                <h2>Integrate FullCalendar in Codeigniter and jQuery</h2>
            </div>
            <div class="row">
                <div class="col-md-12 gedf-main">
                    <span id="loading">Loading...</span>
                    <span id="load-calendar"></span>
                </div>
            </div>
        </div>
    </section>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('load-calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // load plugins
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar',
                    'momentTimezonePlugin', 'momentPlugin'
                ],
                firstDay: 1,
                locale: 'en',
                timeZone: 'local',
                editable: true,
                selectable: true,
                selectHelper: true,
                displayEventTime: true, // don't show the time column in list view
                buttonIcons: true, // show the prev/next text
                weekNumbers: false,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                // calendar header
                header: {
                    left: 'prevYear, prev,next, nextYear, today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                // change button text
                buttonText: {
                    today: "Today",
                    month: "Month",
                    week: "Week",
                    day: "Day",
                    listMonth: 'List'
                },
                // THIS KEY WON'T WORK IN PRODUCTION!!!
                // To make your own Google API key, follow the directions here:
                // http://fullcalendar.io/docs/google_calendar/
                googleCalendarApiKey: 'AIzaSyB6to01Dz3W6iHj5oQjkvt4JOybvT0J4eA',
                // US Holidays
                eventSources: [{
                        url: "odewayemayomi@gmail.com",
                        dataType: 'jsonp',
                        className: 'feed_one'
                    },
                    {
                        url: "<?= base_url();?>event/loadEventData",
                        dataType: 'jsonp',
                        className: 'feed_two',
                    }
                ],

                loading: function (bool) {
                    document.getElementById('loading').style.display =
                        bool ? 'block' : 'none';
                },

            });

            calendar.render();
        });
    </script>





    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src='packages/core/main.js'></script>
    <script src='packages/interaction/main.js'></script>
    <script src='packages/moment/main.js'></script>
    <script src='packages/moment-timezone/main.js'></script>
    <script src='packages/daygrid/main.js'></script>
    <script src='packages/timegrid/main.js'></script>
    <script src='packages/list/main.js'></script>
    <script src='packages/google-calendar/main.js'></script>
</body>

</html>