<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Page - eLearning Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            padding-top: 80px;
        }

        .navbar {
            transition: top 0.3s;
        }

        .course-content {
            margin-top: 20px;
        }

        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 80px;
            z-index: 1000;
        }

        .progress {
            height: 20px;
        }

        .progress-bar {
            line-height: 20px;
        }

        .card-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .course-video {
            width: 100%;
            height: 400px;
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 24px;
        }

        .course-materials ul {
            list-style: none;
            padding-left: 0;
        }

        .course-materials ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .course-materials ul li i {
            margin-right: 10px;
            color: #007bff;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }

        .course-info p {
            margin-bottom: 5px;
        }

        
       

        .sidebar-sticky {
            position: sticky;
            top: 80px; /* Adjust as needed */
            padding-top: 20px;
        }

        .sidebar-module-list {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-module-list li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container course-content">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-details">
                    <h2>Course Title</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget ante a libero efficitur
                        suscipit. Nulla facilisi. Nam nec ligula sed lectus mollis fermentum. Sed in felis varius,
                        vehicula felis ut, fermentum ligula.</p>

                    <h3>Course Content</h3>
                    <ul>
                        <li><i class="fas fa-play-circle"></i> <a href="#">Video 1</a></li>
                        <li><i class="fas fa-play-circle"></i> <a href="#">Video 2</a></li>
                        <li><i class="fas fa-play-circle"></i> <a href="#">Video 3</a></li>
                        <li><i class="fas fa-book"></i> <a href="#">Article 1</a></li>
                        <li><i class="fas fa-book"></i> <a href="#">Article 2</a></li>
                    </ul>

                    <div class="course-info mt-4">
                        <h3>Course Information</h3>
                        <p><i class="fas fa-clock"></i> Duration: 10 hours</p>
                        <p><i class="fas fa-user-graduate"></i> Instructor: John Doe</p>
                        <p><i class="fas fa-certificate"></i> Certificate: Yes</p>
                        <p><i class="fas fa-tv"></i> Access: Mobile & TV</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-sticky">
                    <h4>Course Modules</h4>
                    <ul class="sidebar-module-list">
                        <li><a href="#">Module 1: Introduction to Web Development</a></li>
                        <li><a href="#">Module 2: HTML & CSS Fundamentals</a></li>
                        <li><a href="#">Module 3: JavaScript Basics</a></li>
                        <li><a href="#">Module 4: Advanced JavaScript Concepts</a></li>
                        <li><a href="#">Module 5: Responsive Web Design</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="course-video">
                    Course Video Player
                </div>

                <div class="mt-4">
                    <h2>Course Title</h2>
                    <p>Course description goes here. This will provide an overview of what the course covers, including
                        key
                        topics and learning objectives.</p>

                    <div class="course-materials">
                        <h3>Course Materials</h3>
                        <ul>
                            <li><i class="fas fa-file-alt"></i> <a href="#">Downloadable Resource 1</a></li>
                            <li><i class="fas fa-file-alt"></i> <a href="#">Downloadable Resource 2</a></li>
                            <li><i class="fas fa-file-alt"></i> <a href="#">Downloadable Resource 3</a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h3>Progress</h3>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-sticky">
                    <div class="card card-custom mb-4">
                        <img src="./assets/img/web_dev.jpeg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title">Course Details</h5>
                            <p class="card-text"><i class="fas fa-clock"></i> 40 Hours</p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> Posted on Jan 10, 2024</p>
                            <p class="card-text"><i class="fas fa-book"></i> 18 Articles</p>
                            <p class="card-text"><i class="fas fa-download"></i> 12 Downloadable Resources</p>
                            <p class="card-text"><i class="fas fa-user-graduate"></i> 54 Hands-on Projects</p>
                            <p class="card-text"><i class="fas fa-certificate"></i> Certificate of Completion</p>
                            <a href="#" class="btn btn-custom btn-block">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 LearnXa. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>