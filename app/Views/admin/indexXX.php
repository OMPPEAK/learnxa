<?php include('./include/head.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <link href="https://unpkg.com/gridstack/dist/gridstack.min.css" rel="stylesheet"> -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="../admin.css"> -->


<style>
    i {
        color: green;
    }

    /* Logo section styling */
    .logo-section {
        position: sticky;
        top: 0;
        z-index: 1000;
        /* Ensure logo is above other sidebar content */
        background-color: #ffffff;
        /* Optional: set background color for logo section */
        /* padding: 10px; */
        /* Adjust padding as needed */
    }
</style>

<body>
    <!-- ======= Sidebar ======= -->
    <?php include('./include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include('./include/navbar.php'); ?>

        <div class="container mt-2" id="mainContent">
            <div class="mb-3 font-weight-bold">DASHBOARD</div>
            <!-- Dashboard Overview section -->
            <section class="dashboard-overview">
                <!-- Summary metrics -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div class="card-info">
                                    <h5 class="card-title small">Total Users</h5>
                                    <p class="card-text font-weight-400 fs-3">500</p>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div class="card-info">
                                    <h5 class="card-title small">Total Tests</h5>
                                    <p class="card-text font-weight-400 fs-3">100</p>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-tasks fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div class="card-info">
                                    <h5 class="card-title small">Average Score</h5>
                                    <p class="card-text font-weight-400 fs-3">85%</p>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-chart-line fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div class="card-info">
                                    <h5 class="card-title small">Sales Revenue</h5>
                                    <p class="card-text font-weight-400 fs-3">&#x20A6;104,435</p>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more summary metrics as needed -->
                </div>

                <!-- Quick Access Links (Shortcut Buttons or Tiles) -->
                <div class="col-md-12">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <a href="#new-test" class="btn btn-success btn-block shadow-sm">New Test</a>
                        </div>
                        <div class="col-md-4">
                            <a href="#manage-users" class="btn btn-success btn-block shadow-sm">Manage Users</a>
                        </div>
                        <div class="col-md-4">
                            <a href="#generate-reports" class="btn btn-success btn-block shadow-sm">Generate Reports</a>
                        </div>

                    </div>
                    <!-- Add more shortcut buttons or tiles as needed -->
                </div>

                <!-- Graphs or charts displaying trends and statistics -->
                <div class="row mt-4">
                    <div class="col-md-7">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Test Performance</h5>
                                <!-- Dummy graph container -->
                                <canvas id="myChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Sales Analytics</h5>

                                <!-- Dummy graph container -->
                                <!-- <canvas id="subscriptionSalesChart" width="400" height="200"></canvas> -->
                                <canvas id="myCharty" width="400" height="200"></canvas>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Access Links (Shortcut Buttons or Tiles) -->
                <div class="col-md-12">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <a href="#new-test" class="btn btn-success btn-block">New Test</a>
                        </div>
                        <div class="col-md-4">
                            <a href="#manage-users" class="btn btn-success btn-block">Manage Users</a>
                        </div>
                        <div class="col-md-4">
                            <a href="#generate-reports" class="btn btn-success btn-block">Generate Reports</a>
                        </div>

                    </div>
                    <!-- Add more shortcut buttons or tiles as needed -->
                </div>

                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-left shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title small">Sources</h4>
                                    <p class="card-text">Sales</p>
                                    <ul class="list-group">
                                        <!-- Activity Entry 1 -->
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <strong>User Registration:</strong> John Doe registered.
                                                </div>
                                                <div class="text-muted">1 hour ago</div>
                                            </div>
                                        </li>
                                        <!-- Activity Entry 2 -->
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <strong>Test Submission:</strong> Jane Smith submitted Test 123.
                                                </div>
                                                <div class="text-muted">2 hours ago</div>
                                            </div>
                                        </li>
                                        <!-- Add more activity entries as needed -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-left shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title small">Recent Activity Feed</h4>
                                    <p class="card-text">Sales</p>
                                    <ul class="list-group">
                                        <!-- Activity Entry 1 -->
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <strong>User Registration:</strong> John Doe registered.
                                                </div>
                                                <div class="text-muted">1 hour ago</div>
                                            </div>
                                        </li>
                                        <!-- Activity Entry 2 -->
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <strong>Test Submission:</strong> Jane Smith submitted Test 123.
                                                </div>
                                                <div class="text-muted">2 hours ago</div>
                                            </div>
                                        </li>
                                        <!-- Add more activity entries as needed -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-left shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title small">Test Taken Locations</h4>
                                    <!-- <p class="card-text">Sales</p> -->
                                    <div class="map-container">
                                        <!-- Google Maps iframe -->
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.3437201231443!2d-3.700779784192209!3d40.416775995345265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42288e67765f7b%3A0x7522f9a39bf26951!2sPuerta%20del%20Sol!5e0!3m2!1sen!2ses!4v1649797295702!5m2!1sen!2ses"
                                            width="100%" height="200" style="border:0;" allowfullscreen=""
                                            loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">System Status</h5>
                                <p class="card-text">Current Status: <span class="text-success">Operational</span></p>
                                <p class="card-text">Server Uptime: 99.9%</p>
                                <p class="card-text">Database Connectivity: <span class="text-success">Connected</span>
                                </p>
                                <p class="card-text">Maintenance: <span class="text-warning">Scheduled</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Latest Transaction</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="transactionTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Transaction data will be dynamically inserted here -->
                                            <tr>
                                                <td>1</td>
                                                <td>2024-04-10</td>
                                                <td>$100</td>
                                                <td>Lorem ipsum dolor sit amet</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>2024-04-09</td>
                                                <td>$200</td>
                                                <td>Consectetur adipiscing elit</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">User Status</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="transactionTable">
                                        <thead>
                                            <tr>
                                                <th>UserID</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Transaction data will be dynamically inserted here -->
                                            <tr>
                                                <td>1</td>
                                                <td>Admin</td>
                                                <td>Online</td>
                                                <td>Taking Test</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Teacher</td>
                                                <td>Online</td>
                                                <td>Setting Questions</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Basic Subscription</h5>
                                    <p class="card-text">Unlock basic features</p>
                                    <button class="btn btn-primary">Subscribed</button>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Premium Subscription</h5>
                                    <p class="card-text">Unlock premium features</p>
                                    <button class="btn btn-success">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>

    <footer class="mt-5">
        <!-- Footer section with links and copyright information -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Service</a></li>
                        <li class="list-inline-item"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-right">
                    <p>&copy; 2024 JETA Communications. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>


    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php include('./include/js.php'); ?>
    <!-- Bootstrap JS (optional, if you need any Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <!-- Dummy graph data and script -->
    <script>
        // Dummy data for the graph
        const data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Test Scores',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40]
            }]
        };

        // Create the graph using Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        const labelys = ['January', 'February', 'March', 'April', 'May'];
        const dataBar = [65, 59, 80, 81, 56];
        // Doughnut Chart
        new Chart(document.getElementById('myCharty').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: labelys,
                datasets: [{
                    data: dataBar,
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)', 'rgb(153, 102, 255)'
                    ]
                }]
            },
        });

        // // Create the graph using Chart.js
        // const ctxy = document.getElementById('myCharty').getContext('2d');
        // const myCharty = new Chart(ctxy, {
        //     type: 'doughnut',
        //     data: data,
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });


        // // Doughnut Chart
        // new Chart(document.getElementById('doughnutChart').getContext('2d'), {
        //     type: 'doughnut',
        //     data: {
        //         labels: labels,
        //         datasets: [{
        //             data: data,
        //             backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)',
        //                 'rgb(75, 192, 192)', 'rgb(153, 102, 255)'
        //             ]
        //         }]
        //     },
        // });


        // $(document).ready(function () {
        //     $('#transactionTable').DataTable();
        // });

        // // Sales data for basic and premium subscriptions
        // var salesData = {
        // labels: ['Basic', 'Premium'],
        // datasets: [{
        // label: 'Number of Subscriptions Sold',
        // backgroundColor: ['#007bff', '#28a745'],
        // borderColor: ['#007bff', '#28a745'],
        // data: [100, 50] // Replace with actual sales data
        // }]
        // };

        // // Create chart
        // var ctxy = document.getElementById('subscriptionSalesChart').getContext('2d');
        // var subscriptionSalesChart = new Chart(ctxy, {
        // type: 'bar',
        // data: salesData,
        // options: {
        // responsive: true,
        // maintainAspectRatio: false,
        // scales: {
        // yAxes: [{
        // ticks: {
        // beginAtZero: true
        // }
        // }]
        // }
        // }
        // });

        // Vue.component('grid-stack', window.GridStack);
        // Vue.component('grid-stack-item', window.GridStackItem);

        // new Vue({
        // el: '#app',
        // data: {
        // gridOptions: {
        // // Set grid options here
        // // For example, grid width, height, etc.
        // // See GridStack.js documentation for available options
        // }
        // }
        // });
    </script>

</body>

</html>