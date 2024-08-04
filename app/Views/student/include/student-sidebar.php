<div class="sidebar d-flex flex-column" id="sidebar">
                    <a class="navbar-brand text-center text-light" href="/learnxa-lite">Learn<span
                            style="color: #007bff;">X</span>a</a>

                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link active-menu">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="enrolled-courses" class="nav-link">
                                <i class="fas fa-book"></i>
                                Courses
                            </a>
                        </li>
                        <li>
                            <a href="assignments" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                Assignments
                            </a>
                        </li>
                        <li>
                            <a href="quiz" class="nav-link">
                                <i class="fas fa-pencil-alt"></i>
                                Quiz
                            </a>
                        </li>
                        <li>
                            <a href="timetable" class="nav-link">
                                <i class="fas fa-pencil-alt"></i>
                                Timetable
                            </a>
                        </li>
                        <li>
                            <a href="payment" class="nav-link">
                                <i class="fas fa-credit-card"></i>
                                Payment
                            </a>
                        </li>
                        <li>
                            <a href="community" class="nav-link">
                                <i class="fas fa-users"></i>
                                Community
                            </a>
                        </li>
                        <li>
                            <a href="virtual-class" class="nav-link">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Virtual Class
                            </a>
                        </li>
                        <li>
                            <a href="result" class="nav-link">
                                <i class="fas fa-chart-line"></i>
                                Result
                            </a>
                        </li>
                        <li>
                            <a href="archievement" class="nav-link">
                                <i class="fas fa-medal"></i>
                                Achievement
                            </a>
                        </li>
                        <li>
                            <a href="notification" class="nav-link">
                                <i class="fas fa-bell"></i>
                                Notification
                            </a>
                        </li>
                        <li>
                            <a href="feedback" class="nav-link">
                                <i class="fas fa-comment-dots"></i>
                                Feedback
                            </a>
                        </li>
                        <li>
                            <a href="profile" class="nav-link">
                                <i class="fas fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="logout" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                    <footer class="mt-auto text-center"
                        style="padding: 10px; background-color: #343a40; color: white; font-size: 14px;">
                        <div class="container">
                            <p class="mb-0">
                                &copy; <span id="currentYear"></span>
                            </p>
                        </div>
                    </footer>
                </div>

                <!-- Add this script before the closing body tag to dynamically update the year -->
                <script>
                    document.getElementById('currentYear').textContent = new Date().getFullYear();
                </script>