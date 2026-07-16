<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="My Courses | Student Module page for the Dhurandhar Enterprise LMS frontend.">
  <title>My Courses | Student Module</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="css/student-module.css">
    <link rel="stylesheet" href="css/site-shell.css">
</head>
<body>
  <div class="student-shell">
    <div class="page-wrapper">
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
          <a class="brand" href="index.php"><span class="brand-mark">D</span><span>Dhurandhar LMS</span></a>
          <button type="button" class="icon-btn mobile-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>
        </div>
        <div class="sidebar-search"><i class="fas fa-search"></i><input type="text" placeholder="Search" aria-label="Search" name="search"></div>
        <nav class="sidebar-nav" aria-label="Student module navigation">
          <a class="nav-item" href="my-courses.php"><i class="fas fa-book-open"></i><span>My Courses</span></a>
          <a class="nav-item" href="course-player.php"><i class="fas fa-play-circle"></i><span>Course Player</span></a>
          <a class="nav-item" href="continue-learning.php"><i class="fas fa-forward"></i><span>Continue Learning</span></a>
          <a class="nav-item" href="assignments.php"><i class="fas fa-clipboard-list"></i><span>Assignments</span></a>
          <a class="nav-item" href="quiz.php"><i class="fas fa-brain"></i><span>Quiz</span></a>
          <a class="nav-item" href="certificates.php"><i class="fas fa-award"></i><span>Certificates</span></a>
          <a class="nav-item" href="wishlist.php"><i class="fas fa-heart"></i><span>Wishlist</span></a>
          <a class="nav-item" href="downloads.php"><i class="fas fa-download"></i><span>Downloads</span></a>
          <a class="nav-item" href="profile.php"><i class="fas fa-user-circle"></i><span>Profile</span></a>
          <a class="nav-item" href="settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
          <a class="nav-item" href="notifications.php"><i class="fas fa-bell"></i><span>Notifications</span></a>
          <a class="nav-item" href="messages.php"><i class="fas fa-envelope"></i><span>Messages</span></a>
          <a class="nav-item" href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Calendar</span></a>
          <a class="nav-item" href="help-center.php"><i class="fas fa-life-ring"></i><span>Help Center</span></a>
        </nav>
      </aside>
      <main class="main-content">
        <header class="topbar">
          <button type="button" class="icon-btn mobile-toggle" aria-label="Open sidebar"><i class="fas fa-bars"></i></button>
          <div>
            <p class="text-muted mb-1">Student Module</p>
            <h1>My Courses</h1>
          </div>
          <div class="topbar-actions">
            <div class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search your courses" data-search aria-label="Search your courses" name="search_your_courses"></div>
            <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">2</span></button>
            <button type="button" class="icon-btn" data-theme-toggle aria-label="Toggle dark mode"><i class="fas fa-moon"></i></button>
            <div class="user-pill">
              <img src="https://i.pravatar.cc/100?img=32" alt="Student avatar">
              <div><strong>Aisha Khan</strong><small>Premium Learner</small></div>
            </div>
          </div>
        </header>
        <section class="page" data-aos="fade-up">
          <nav class="breadcrumb" aria-label="Breadcrumb"><span>Home</span><span>/</span><span>Student</span><span>/</span><span class="text-primary">My Courses</span></nav>
          <div class="page-header">
            <div>
              <h2>My Courses</h2>
              <p>Track progress, resume lessons, and discover what is next.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
              <button type="button" class="btn btn-outline"><i class="fas fa-th-large me-2"></i>Grid View</button>
              <button type="button" class="btn btn-outline"><i class="fas fa-list me-2"></i>List View</button>
              <button type="button" class="btn btn-primary" data-toast="Filters updated"><i class="fas fa-filter me-2"></i>Filter</button>
            </div>
          </div>
          <div class="card card-body">
            <div class="row g-3 align-items-center">
              <div class="col-md-3"><label class="form-label">Sort By</label><select class="form-select" name="field"><option>Newest</option><option>Popular</option><option>Completed</option></select></div>
              <div class="col-md-3"><label class="form-label">Status</label><select class="form-select" name="field"><option>In Progress</option><option>Completed</option><option>Saved</option></select></div>
              <div class="col-md-3"><label class="form-label">Category</label><select class="form-select" name="field"><option>All</option><option>Design</option><option>Development</option></select></div>
              <div class="col-md-3"><label class="form-label">Search</label><input class="form-control" type="text" placeholder="Type course title" data-search name="type_course_title"></div>
            </div>
          </div>
          <div class="grid-cards">
            <article class="course-card" data-search-item>
              <div class="course-thumb"><i class="fas fa-palette"></i></div>
              <div class="course-meta"><span>Design</span><span>6 weeks</span><span>Intermediate</span></div>
              <h4 class="fw-bold mb-2">UI/UX Design Masterclass</h4>
              <p class="text-muted mb-3">Create polished interfaces with user-centered research and modern prototyping.</p>
              <div class="progress-track mb-2"><div class="progress-bar" data-progress="74%" style="width: 0"></div></div>
              <div class="d-flex justify-content-between align-items-center mb-3"><span class="badge badge-primary">74% complete</span><span class="text-muted small">12 lessons left</span></div>
              <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary btn-sm" href="course-player.php">Continue</a>
                <button type="button" class="btn btn-outline btn-sm" data-toast="Added to favorites"><i class="fas fa-heart"></i></button>
              </div>
            </article>
            <article class="course-card" data-search-item>
              <div class="course-thumb"><i class="fas fa-code"></i></div>
              <div class="course-meta"><span>Development</span><span>8 weeks</span><span>Beginner</span></div>
              <h4 class="fw-bold mb-2">JavaScript Essentials</h4>
              <p class="text-muted mb-3">Learn modern JavaScript syntax, events, APIs, and practical debugging.</p>
              <div class="progress-track mb-2"><div class="progress-bar" data-progress="56%" style="width: 0"></div></div>
              <div class="d-flex justify-content-between align-items-center mb-3"><span class="badge badge-warning">56% complete</span><span class="text-muted small">8 lessons left</span></div>
              <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary btn-sm" href="course-player.php">Continue</a>
                <button type="button" class="btn btn-outline btn-sm" data-toast="Added to favorites"><i class="fas fa-heart"></i></button>
              </div>
            </article>
            <article class="course-card" data-search-item>
              <div class="course-thumb"><i class="fas fa-brain"></i></div>
              <div class="course-meta"><span>AI</span><span>4 weeks</span><span>Intermediate</span></div>
              <h4 class="fw-bold mb-2">AI for Product Teams</h4>
              <p class="text-muted mb-3">Turn prompts, tools, and workflows into reliable team accelerators.</p>
              <div class="progress-track mb-2"><div class="progress-bar" data-progress="91%" style="width: 0"></div></div>
              <div class="d-flex justify-content-between align-items-center mb-3"><span class="badge badge-success">91% complete</span><span class="text-muted small">Certificate ready</span></div>
              <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary btn-sm" href="course-player.php">Continue</a>
                <button type="button" class="btn btn-outline btn-sm" data-toast="Added to favorites"><i class="fas fa-heart"></i></button>
              </div>
            </article>
          </div>
          <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="fw-bold mb-0">Recently accessed</h4>
              <a href="continue-learning.php" class="text-primary">View all</a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead><tr><th>Course</th><th>Last Accessed</th><th>Status</th><th>Action</th></tr></thead>
                <tbody>
                  <tr><td>Frontend System Design</td><td>2h ago</td><td><span class="badge badge-warning">In Progress</span></td><td><a class="btn btn-outline btn-sm" href="course-player.php">Resume</a></td></tr>
                  <tr><td>Data Storytelling</td><td>Yesterday</td><td><span class="badge badge-success">Completed</span></td><td><a class="btn btn-outline btn-sm" href="course-player.php">Review</a></td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <nav class="pagination" aria-label="Pagination">
            <li class="page-item active"><a href="my-courses.php?page=1">1</a></li><li class="page-item"><a href="my-courses.php?page=2">2</a></li><li class="page-item"><a href="my-courses.php?page=3">3</a></li>
          </nav>
        </section>
      </main>
    </div>
  </div>
  <button type="button" class="scroll-top-btn" aria-label="Scroll to top"><i class="fas fa-arrow-up"></i></button>
  <div class="toast-container"></div>
<script src="js/site-shell.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/student-module.js"></script>
</body>
</html>







