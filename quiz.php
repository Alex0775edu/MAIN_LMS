<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Quiz Center | Student Module page for the Dhurandhar Enterprise LMS frontend.">
  <title>Quiz Center | Student Module</title>
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
        <div class="sidebar-header"><a class="brand" href="index.php"><span class="brand-mark">D</span><span>Dhurandhar LMS</span></a><button type="button" class="icon-btn mobile-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button></div>
        <div class="sidebar-search"><i class="fas fa-search"></i><input type="text" placeholder="Search" aria-label="Search" name="search"></div>
        <nav class="sidebar-nav" aria-label="Student module navigation">
          <a class="nav-item" href="my-courses.php"><i class="fas fa-book-open"></i><span>My Courses</span></a>
          <a class="nav-item" href="course-player.php"><i class="fas fa-play-circle"></i><span>Course Player</span></a>
          <a class="nav-item" href="continue-learning.php"><i class="fas fa-forward"></i><span>Continue Learning</span></a>
          <a class="nav-item" href="assignments.php"><i class="fas fa-clipboard-list"></i><span>Assignments</span></a>
          <a class="nav-item active" href="quiz.php"><i class="fas fa-brain"></i><span>Quiz</span></a>
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
          <div><p class="text-muted mb-1">Student Module</p><h1>Quiz Center</h1></div>
          <div class="topbar-actions">
            <div class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search quizzes" data-search name="search_quizzes"></div>
            <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">1</span></button>
            <button type="button" class="icon-btn" data-theme-toggle aria-label="Toggle dark mode"><i class="fas fa-moon"></i></button>
            <div class="user-pill"><img src="https://i.pravatar.cc/100?img=24" alt="Student avatar"><div><strong>Aisha Khan</strong><small>Quiz Ready</small></div></div>
          </div>
        </header>
        <section class="page" data-aos="fade-up">
          <nav class="breadcrumb" aria-label="Breadcrumb"><span>Home</span><span>/</span><span>Assessment</span><span>/</span><span class="text-primary">Quiz</span></nav>
          <div class="page-header"><div><h2>Quiz Center</h2><p>Practice, review, and improve your scores with timed assessments.</p></div><div class="timer-pill"><i class="fas fa-clock"></i> 12:45</div></div>
          <div class="quiz-grid">
            <div class="card card-body">
              <h4 class="fw-bold mb-3">Instructions</h4>
              <p class="text-muted">You will answer 10 questions. Each correct answer adds one point. Review your answers before submitting.</p>
              <div class="list-stack">
                <div class="stack-item"><span><i class="fas fa-list-ol me-2"></i>10 questions</span></div>
                <div class="stack-item"><span><i class="fas fa-stopwatch me-2"></i>15-minute timer</span></div>
                <div class="stack-item"><span><i class="fas fa-check-circle me-2"></i>Instant review</span></div>
              </div>
              <button type="button" class="btn btn-primary mt-3" data-toast="Quiz started">Start Quiz</button>
            </div>
            <div class="card card-body">
              <h4 class="fw-bold mb-3">Question Navigation</h4>
              <div class="chip-row">
                <span class="badge badge-primary">1</span><span class="badge badge-primary">2</span><span class="badge badge-primary">3</span><span class="badge badge-primary">4</span><span class="badge badge-primary">5</span>
              </div>
              <div class="chip-row mt-2">
                <span class="badge badge-outline">6</span><span class="badge badge-outline">7</span><span class="badge badge-outline">8</span><span class="badge badge-outline">9</span><span class="badge badge-outline">10</span>
              </div>
              <div class="progress-track mt-3"><div class="progress-bar" data-progress="40%" style="width: 0"></div></div>
              <p class="text-muted mt-2 mb-0">Progress: 4 of 10 answered</p>
            </div>
          </div>
          <div class="card card-body mt-3">
            <h4 class="fw-bold mb-3">Quiz History</h4>
            <div class="table-responsive">
              <table class="table">
                <thead><tr><th>Quiz</th><th>Score</th><th>Date</th><th>Status</th></tr></thead>
                <tbody>
                  <tr data-search-item><td>JavaScript Quick Quiz</td><td>96%</td><td>May 22</td><td><span class="badge badge-success">Passed</span></td></tr>
                  <tr data-search-item><td>Design Principles</td><td>81%</td><td>May 15</td><td><span class="badge badge-info">Review</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>
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







