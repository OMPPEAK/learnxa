<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React - The Complete Guide 2024 (incl. Next.js, Redux) | LearnXa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/course.css">
    <style>
        .course-card {
            /* border: 1px solid #e0e0e0; */
            /* border-radius: 10px; */
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            background-color: #fff;
            margin: 0.5rem 0;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            color: #00c3ff;
        }

        .course-card img {
            border: 1px solid #e0e0e0;
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>

<body style="background-color: #f2f2f2;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-6">
                <?php include(APPPATH . 'Views/student/include/student-sidebar.php'); ?>
            </div>


            <div class="col-lg-10 col-md-6">
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
                <div class="main-container mt-2 p-2" id="mainContent">

                    <div class="">
                        <div class="category-header" style="font-size:17px;">
                            Payment Receipts
                        </div>
                        <p>Below are the receipts of the payments you have made so far</p>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Timestamp</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">1</td>
                                    <td>Registration Fee</td>
                                    <td>2,000</td>
                                    <td>1/9/2024</td>
                                    <td><button class="btn btn-success bg-transparent text-success">Download <i
                                                class="fas fa-download"></i></button></td>
                                </tr>
                                <tr class="">
                                    <td scope="row">2</td>
                                    <td>React - The Complete Guide 2024 (incl. Next.js, Redux) | LearnXa</td>
                                    <td>2,000</td>
                                    <td>1/9/2024</td>
                                    <td><button class="btn btn-success bg-transparent text-success">Download <i
                                                class="fas fa-download"></i></button></td>
                                </tr>

                                <tr class="">
                                    <td scope="row">3</td>
                                    <td>Python Programming for Computer Engineering Students</td>
                                    <td>2,000</td>
                                    <td>1/9/2024</td>
                                    <td><button class="btn btn-success bg-transparent text-success">Download <i
                                                class="fas fa-download"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
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
        <script>
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