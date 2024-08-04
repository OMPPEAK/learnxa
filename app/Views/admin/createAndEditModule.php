<?php include(APPPATH .'Views/admin/include/head.php'); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<style>
    i {
        color: #007bff;
    }

    .logo-section {
        position: sticky;
        top: 0;
        z-index: 1000;
        text-align: center;
        font-weight: bolder;
    }
</style>

<body>
<?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>
        <div class="container mt-2" id="mainContent">
            <div class="mb-3 font-weight-bold">Create/Edit Module</div>
            <section class="create-edit-module">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="moduleTitle">Module Title</label>
                                <input type="text" class="form-control" id="moduleTitle" placeholder="Enter module title">
                            </div>
                            <div class="form-group">
                                <label for="moduleDescription">Module Description</label>
                                <textarea class="form-control" id="moduleDescription" rows="3" placeholder="Enter module description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="moduleOrder">Order</label>
                                <input type="number" class="form-control" id="moduleOrder" placeholder="Enter module order">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Module</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php include(APPPATH . 'Views/admin/include/js.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>
