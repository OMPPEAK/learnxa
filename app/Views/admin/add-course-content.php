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
        color: #007bff;
    }

    /* Logo section styling */
    .logo-section {
        position: sticky;
        top: 0;
        z-index: 1000;
        text-align: center;
        font-weight: bolder;
        /* Ensure logo is above other sidebar content */

    }
</style>

<body>
    <!-- ======= Sidebar ======= -->
    <?php include('./include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include('./include/nav2.php'); ?>

        <div class="container mt-2" id="mainContent">
            <div class="mb-3 font-weight-bold">COURSE MANAGEMENT</div>
            <!-- Dashboard Overview section -->


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Course</h5>

                    <!-- FThis place user can add modules and select the course  -->
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Course</label>
                            <select id="inputState" class="form-select">
                                <option selected>Mathematics</option>
                                <option>Data Analysis</option>
                            </select>
                        </div>
                        
                       
                        <div class="col-md-4">
                            <label for="inputAddress" class="form-label">Upload Module Course Video ID</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress" class="form-label">Upload Course Image</label>
                            <input type="file" accept=".jpg,.png,.webp,.jpeg" class="form-control" id="inputAddress"
                                placeholder="1234 Main St">
                        </div>
                        <div class="col-md-8">
                            <label for="inputAddress" class="form-label">Group Link (WhatsApp/Telegram)</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress" class="form-label">Course Description</label>
                            <textarea type="text" class="form-control" id="inputAddress"
                                placeholder="1234 Main St"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">ADD COURSE</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
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
    </script>

</body>

</html>