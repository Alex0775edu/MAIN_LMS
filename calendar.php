<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Calendar | Dhurandhar LMS page for the Dhurandhar Enterprise LMS frontend.">
  <title>Calendar | Dhurandhar LMS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/student-module.css">
    <link rel="stylesheet" href="css/site-shell.css">
</head>
<body>
  <div class="student-shell">
    <aside class="sidebar">
      <div class="sidebar-header"><a class="brand" href="index.php"><span class="brand-mark">D</span><span>Dhurandhar LMS</span></a><button type="button" class="icon-btn mobile-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button></div>
      <nav class="sidebar-nav" aria-label="Student navigation">
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
          <a class="nav-item active" href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Calendar</span></a>
          <a class="nav-item" href="help-center.php"><i class="fas fa-life-ring"></i><span>Help Center</span></a>
      </nav>
    </aside>
    <main class="main-panel">
      <header class="topbar">
        <div>
          <p class="mb-1">Student dashboard</p>
          <h1>Calendar</h1>
        </div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search courses or events" data-search name="search_courses_or_events"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=8" alt="Student avatar"><div><strong>John Doe</strong><small>Student</small></div></div>
        </div>
      </header>
      <div class="content-area">
        <section class="card-surface">
          <div class="page-header">
            <div>
              <h2>Calendar</h2>
              <p>Track your course schedules, assignment deadlines, and quiz dates.</p>
            </div>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-outline" data-toast="Event added">Add Event</button>
              <button type="button" class="btn btn-primary" data-toast="Calendar synced">Sync Calendar</button>
            </div>
          </div>
          <div class="card-surface">
            <h4 class="fw-bold mb-3">Your learning schedule</h4>
            <div class="row g-2 text-center">
              <div class="col-2"><div class="schedule-card">Mon</div></div>
              <div class="col-2"><div class="schedule-card">Tue</div></div>
              <div class="col-2"><div class="schedule-card">Wed</div></div>
              <div class="col-2"><div class="schedule-card">Thu</div></div>
              <div class="col-2"><div class="schedule-card">Fri</div></div>
              <div class="col-2"><div class="schedule-card">Sat</div></div>
            </div>
            <div class="mt-3">
              <div class="schedule-card"><strong>Apr 10</strong><p class="text-muted mb-0">Assignment due • 11:59 PM</p></div>
              <div class="schedule-card mt-2"><strong>Apr 12</strong><p class="text-muted mb-0">Quiz: Web Development • 3:00 PM</p></div>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
<script src="js/site-shell.js"></script>
<script src="js/student-module.js"></script>
</body>
</html>







