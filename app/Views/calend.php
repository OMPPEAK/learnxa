<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FpiUpdates</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/course.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">
    <!--- FullCalendar plugin --->
    <link href='packages/core/main.css' rel='stylesheet' />
    <link href='packages/daygrid/main.css' rel='stylesheet' />
    <link href='packages/list/main.css' rel='stylesheet' />
    <style>
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
</head>

<body style="background-color: #f2f2f2;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-6">
                <?php include(APPPATH . 'Views/student/include/student-sidebar.php'); ?>

            </div>


            <div class="col-lg-10 col-md-6 ">
                <nav class="navbar navbar-expand-lg p-2 bg-light box-shadow">
                    <div class="container-fluid pl-0 pr-0 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <form class="custom-search-form d-none d-md-flex w-100 box-shadow">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>


                        <!-- Centered logo -->
                        <div class="logo d-md-none m-auto">
                            <a class="navbar-brand text-centter text-dark" href="/learnxa-lite">Learn<span
                                    style="color: #007bff;">X</span>a</a>
                        </div>


                        <div class="d-flex align-items-center ml-auto">
                            <!-- Search Form -->
                            <div class="custom-btn d-md-none mr-2" id="searchIcon" type="button">
                                <i class="fas fa-search"></i>
                            </div>

                            <!-- User Info and Notification Bell -->
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img src="../assets/img/profile-img.jpg" alt="User" class="mr-1"
                                            style="width: 40px; height: 40px; border-radius: 50%;">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <div class="p-2">
                                            <div style="color: black;">
                                                <h5 class="mb-0">Mayor Odewaye</h5>
                                            </div>
                                            <h6 class="username mb-0" style="color: grey;">3rd Year</h6>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn my-2 my-sm-0 " type="button"><i class="fas fa-bell"></i></button>
                                <!-- Sidebar toggle button for mobile view -->
                                <div class="custom-btn d-md-none" type="button" id="sidebarToggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>




                <!-- Hero Section -->
                <div class="main-container mt-2 p-2" id="mainContent">
                    <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                    <?php endif; ?>
                    <section class="showcase">
                        <div class="container">
                            <div class="pb-2 mt-4 mb-2 border-bottom">
                                <h2>Python Programming Class</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-12 gedf-main">
                                    <span id="loading">Loading...</span>
                                    <span id="load-calendar"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>






    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    <script>
        // Calendar Integration with Google
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
                // The API Key can only work for the particular email, to setup another API will be for another email
                googleCalendarApiKey: 'AIzaSyB6to01Dz3W6iHj5oQjkvt4JOybvT0J4eA',
                // US Holidays
                eventSources: [{
                        // Any URL must be related to the email used to created the APIKey
                        // url: "odewayemayomi@gmail.com",
                        // url: "elearnxa@gmail.com",
                        url: "d6cba05f633ff08bc8401ec6a1b101a8766fb17adfcbd31194185b76f6fe6a60@group.calendar.google.com",
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

        // Toggle sidebar when the toggle button is clicked
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking on the main content area
        document.getElementById('mainContent').addEventListener('click', function (e) {
            // Check if the click target is not the sidebar or the sidebar toggle button
            if (!document.getElementById('sidebar').contains(e.target) && e.target.id !== 'sidebarToggle') {
                document.getElementById('sidebar').classList.remove('show');
            }
        });

        // Toggle search form visibility when the search icon is clicked
        document.getElementById('searchIcon').addEventListener('click', function () {
            var searchForm = document.getElementById('searchForm');
            if (searchForm.classList.contains('d-none')) {
                searchForm.classList.remove('d-none');
                searchForm.classList.add('d-flex');
            } else {
                searchForm.classList.remove('d-flex');
                searchForm.classList.add('d-none');
            }
        });
    </script>
    <!-- Custom JS -->
    <script src="scripts.js"></script>
</body>

</html>