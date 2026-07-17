<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Instructor Dashboard | Dhurandhar Instructor Portal page for the Dhurandhar Enterprise LMS frontend.">
  <title>Instructor Dashboard | Dhurandhar Instructor Portal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../css/instructor-module.css">
    <link rel="stylesheet" href="../css/site-shell.css">
</head>
<body>
  <div class="instructor-shell">
    <aside class="sidebar">
      <a class="brand" href="dashboard.php"><span class="brand-mark">D</span><span>Dhurandhar Instructor</span></a>
      <nav class="sidebar-nav" aria-label="Instructor navigation"><a class="nav-item active" href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a><a class="nav-item" href="my-courses.php"><i class="fas fa-book-open"></i><span>My Courses</span></a><a class="nav-item" href="create-course.php"><i class="fas fa-plus-circle"></i><span>Create Course</span></a><a class="nav-item" href="course-builder.php"><i class="fas fa-puzzle-piece"></i><span>Course Builder</span></a><a class="nav-item" href="curriculum-manager.php"><i class="fas fa-sitemap"></i><span>Curriculum</span></a><a class="nav-item" href="upload-content.php"><i class="fas fa-cloud-upload-alt"></i><span>Upload Content</span></a><a class="nav-item" href="students.php"><i class="fas fa-users"></i><span>Students</span></a><a class="nav-item" href="assignments.php"><i class="fas fa-clipboard-list"></i><span>Assignments</span></a><a class="nav-item" href="quizzes.php"><i class="fas fa-brain"></i><span>Quizzes</span></a><a class="nav-item" href="live-classes.php"><i class="fas fa-video"></i><span>Live Classes</span></a><a class="nav-item" href="announcements.php"><i class="fas fa-bullhorn"></i><span>Announcements</span></a><a class="nav-item" href="reviews.php"><i class="fas fa-star"></i><span>Reviews</span></a><a class="nav-item" href="earnings.php"><i class="fas fa-dollar-sign"></i><span>Earnings</span></a><a class="nav-item" href="analytics.php"><i class="fas fa-chart-bar"></i><span>Analytics</span></a><a class="nav-item" href="messages.php"><i class="fas fa-envelope"></i><span>Messages</span></a><a class="nav-item" href="notifications.php"><i class="fas fa-bell"></i><span>Notifications</span></a><a class="nav-item" href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Calendar</span></a><a class="nav-item" href="certificates.php"><i class="fas fa-award"></i><span>Certificates</span></a><a class="nav-item" href="resources.php"><i class="fas fa-folder-open"></i><span>Resources</span></a><a class="nav-item" href="profile.php"><i class="fas fa-user-circle"></i><span>Profile</span></a><a class="nav-item" href="settings.php"><i class="fas fa-cog"></i><span>Settings</span></a><a class="nav-item" href="help-center.php"><i class="fas fa-life-ring"></i><span>Help Center</span></a></nav>
    </aside>
    <main class="main-panel">
      <header class="topbar">
        <div>
          <p class="mb-1">Instructor portal</p>
          <h1>Instructor Dashboard</h1>
        </div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search content" data-search name="search_content"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Instructor avatar"><div><strong>Aditya Rajak</strong><small>Senior instructor</small></div></div>
        </div>
      </header>
      <div class="content-area">
        <section class="card-surface">
          <div class="page-header">
            <div>
              <h2>Instructor Dashboard</h2>
              <p>Keep your courses, learners, and revenue in one polished command center.</p>
            </div>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-outline" data-toast="Quick action queued">Quick Action</button>
              <button type="button" class="btn btn-primary" data-toast="Progress saved">Save</button>
            </div>
          </div>
          <div class="row g-3">
  <div class="col-12">
    <div class="card-surface">
      <div class="page-header">
        <div><h2>Teaching command center</h2><p>Monitor engagement, revenue, and pending work from a premium instructor workspace.</p></div>
        <a href="create-course.php" class="btn btn-primary">Create Course</a>
      </div>
      <div class="stats-grid">
        <div class="stat-card"><h6 class="text-muted mb-2">Live Courses</h6><h3 class="fw-bold">4</h3><p class="mb-0">2 published this month</p></div>
        <div class="stat-card"><h6 class="text-muted mb-2">Enrolled Learners</h6><h3 class="fw-bold">1,284</h3><p class="mb-0">+18% growth</p></div>
        <div class="stat-card"><h6 class="text-muted mb-2">Avg. Rating</h6><h3 class="fw-bold">4.9</h3><p class="mb-0">957 reviews</p></div>
        <div class="stat-card"><h6 class="text-muted mb-2">Monthly Revenue</h6><h3 class="fw-bold">₹74k</h3><p class="mb-0">+12% QoQ</p></div>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="card-surface">
      <h4 class="fw-bold mb-3">Recent activity</h4>
      <div class="row g-3">
        <div class="col-md-6"><div class="task-card"><strong>New quiz submissions</strong><p class="text-muted mb-2">12 learners completed the latest assessment.</p><span class="badge-chip badge-primary">Needs review</span></div></div>
        <div class="col-md-6"><div class="task-card"><strong>Live class reminder</strong><p class="text-muted mb-2">Your next session starts in 45 minutes.</p><span class="badge-chip badge-success">Scheduled</span></div></div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card-surface">
      <h4 class="fw-bold mb-3">Upcoming deadlines</h4>
      <div class="timeline-card mb-2"><strong>Assignment review</strong><p class="text-muted mb-0">Due today • 6 submissions</p></div>
      <div class="timeline-card"><strong>Curriculum update</strong><p class="text-muted mb-0">Due tomorrow • AI Foundations</p></div>
    </div>
  </div>
</div>
        </section>
      </div>
    </main>
  </div>
<script src="../js/site-shell.js"></script>
<script src="../js/instructor-module.js"></script>
</body>
</html>






