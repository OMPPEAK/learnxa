<style>
  .navbar-brand {
    display: inline-block;
    /* line-height: inherit; */
    white-space: nowrap;
    font-size: 30px;
    font-weight: 700;
    /* color: white !important; */
    color: black !important;
    text-decoration: none !important;
  }

  
.link-dark.nav-link.active{
  border-right: red solid 4px !important;
  /* background-color: #495057; */
  /* background-color: white; */
  background-color: #007bff;
  /* color: rgb(9, 25, 60) !important; */
  color: white !important;
  font-weight: bold;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  /* box-shadow: 0 4px 8px rgba(4, 244, 8, 0.1); */
  transform: translateX(-5px);
  /* background-color: #f0f8ff; */
}

.custom-divider {
  border-top: 2px solid #000;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
</style>


<!-- <aside id="sidebar" class="sidebar "> -->
<aside id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-ltight sidebar" style="background-color: #ffff;">

  <div class="logo-section text-center">
    <a class="navbar-brand" href="/" style="font-weight: 500px; margin-bottom:0;">
      <div>Learn<span style="color: #007bff;">X</span>a</div>
    </a>
  </div>
  <hr class="custom-divider">

  <ul class="nav nav-pills text-dark flex-column mb-auto" >
    <div class="font-weight-bold">MENU</div>
    <li class="nav-item">
      <a href="/admin" class="nav-link link-dark">
        <i class="bi bi-speedometer2 me-2"></i>
        Dashboard
      </a>
    </li>
    <!-- Course Management -->
    <li>
      <a href="/admin/course" class="nav-link link-dark">
        <i class="bi bi-file-earmark-text me-2"></i>
        Course
      </a>
    </li>
    <!-- Test Management -->
    <li>
      <a href="/quizzes" class="nav-link link-dark">
        <i class="bi bi-file-earmark-text me-2"></i>
        Quiz Management
      </a>
    </li>
    <!-- Question Bank -->
    <li>
      <a href="/questionbank" class="nav-link link-dark">
        <i class="bi bi-journal-text me-2"></i>
        Question Bank
      </a>
    </li>
    <li>
      <a href="/modules" class="nav-link link-dark">
        <i class="bi bi-journal-text me-2"></i>
        Modules
      </a>
    </li>
    <li>
      <a href="/lessons" class="nav-link link-dark">
        <i class="bi bi-journal-text me-2"></i>
        Lessons
      </a>
    </li>

    <li>
      <a href="/assignments" class="nav-link link-dark">
        <i class="bi bi-file-earmark-text me-2"></i>
        Assignments
      </a>
    </li>

    
    <!-- Settings -->
    <li>
      <a href="/timetables" class="nav-link link-dark">
        <i class="bi bi-gear me-2"></i>
        Timetables
      </a>
    </li>
    <!-- Notification -->
    <li>
      <a href="#" class="nav-link link-dark">
        <i class="bi bi-bell me-2"></i>
        Virtual Classes
      </a>
    </li>
    <!-- Integration -->
    <li>
      <a href="#" class="nav-link link-dark">
        <i class="bi bi-code-slash me-2"></i>
        Integration
      </a>
    </li>
    <!-- Results and Analytics -->
    <li>
      <a href="#" class="nav-link link-dark">
        <i class="bi bi-graph-up me-2"></i>
        Results and Analytics
      </a>
    </li>

    <li>
      <a href="#" class="nav-link link-dark">
        <i class="bi bi-chat-text me-2"></i>
        Chat
      </a>
    </li>

    PRODUCT
    <li class="nav-item">
      <a href="#" class="nav-link link-dark">
        <i class="bi bi-speedometer2 me-2"></i>
        Subscription
      </a>
    </li>
    SETTINGS
    <li class="nav-item">
      <a href="#" class="nav-link link-dark">
        <i class="bi bi-speedometer2 me-2"></i>
        Subscription
      </a>
    </li>

  </ul>
</aside>
<!-- </aside> -->


<script>
  document.addEventListener("DOMContentLoaded", function() {
  const currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link');

  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
      link.classList.add('active');
    }
  });
});

</script>