<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta name="description" content="Instructor Dashboard | Dhurandhar LMS page for the Dhurandhar Enterprise LMS frontend.">
  <title>Instructor Dashboard | Dhurandhar LMS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="css/module-pages.css">
    <link rel="stylesheet" href="css/site-shell.css">
</head>
<body>
  <div class="dashboard-shell">
    <aside class="dashboard-sidebar">
      <h4 class="fw-bold mb-4">Instructor Panel</h4>
      <nav class="nav flex-column">
        <a class="nav-link active" href="instructor-dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a class="nav-link" href="instructor/my-courses.php"><i class="fas fa-book me-2"></i>My Courses</a>
        <a class="nav-link" href="instructor/create-course.php"><i class="fas fa-plus-circle me-2"></i>Create Course</a>
        <a class="nav-link" href="instructor/students.php"><i class="fas fa-users me-2"></i>Students</a>
      </nav>
    </aside>
    <main class="dashboard-main">
      <div class="dashboard-topbar">
        <div><h2 class="fw-bold mb-0">Welcome back, Aditya</h2><p class="text-muted mb-0">Your teaching dashboard at a glance.</p></div>
        <button type="button" class="mobile-toggle"><i class="fas fa-bars"></i></button>
      </div>
      <div class="dashboard-content">
        <div class="stat-grid">
          <div class="stats-card" data-aos="fade-up"><h6 class="text-muted">Active Courses</h6><h3 class="fw-bold">4</h3></div>
          <div class="stats-card" data-aos="fade-up" data-aos-delay="40"><h6 class="text-muted">Enrolled Students</h6><h3 class="fw-bold">1,284</h3></div>
          <div class="stats-card" data-aos="fade-up" data-aos-delay="80"><h6 class="text-muted">Avg. Rating</h6><h3 class="fw-bold">4.9</h3></div>
          <div class="stats-card" data-aos="fade-up" data-aos-delay="120"><h6 class="text-muted">Pending Reviews</h6><h3 class="fw-bold">12</h3></div>
        </div>
        <div class="card-surface p-4" data-aos="fade-up"><h4 class="fw-bold mb-3">Recent activity</h4><div class="list-stack"><div class="stack-row"><strong>New quiz submitted</strong><span class="text-muted">2 hours ago</span></div><div class="stack-row"><strong>Course updated</strong><span class="text-muted">5 hours ago</span></div></div></div>
      </div>
    </main>
  </div>
<script src="js/site-shell.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/module-pages.js"></script>
</body>
</html>







