<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta name="description" content="Learning Paths | Dhurandhar Super Admin page for the Dhurandhar Enterprise LMS frontend.">
  <title>Learning Paths | Dhurandhar Super Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/admin-panel.css">
    <link rel="stylesheet" href="css/site-shell.css">
</head>
<body>
  <div class="app-shell">
    <aside class="sidebar">
      <a class="brand" href="admin-dashboard.php"><span class="brand-mark">D</span><span>Dhurandhar Admin</span></a>
      <button type="button" class="mobile-toggle icon-btn" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
      <nav class="sidebar-nav" aria-label="Super admin navigation"><a class="nav-item" href="admin-dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a><a class="nav-item" href="users.php"><i class="fas fa-users"></i><span>Users</span></a><a class="nav-item" href="students.php"><i class="fas fa-user-graduate"></i><span>Students</span></a><a class="nav-item" href="instructors.php"><i class="fas fa-chalkboard-teacher"></i><span>Instructors</span></a><a class="nav-item" href="staff.php"><i class="fas fa-user-shield"></i><span>Staff</span></a><a class="nav-item" href="roles-permissions.php"><i class="fas fa-key"></i><span>Roles & Permissions</span></a><a class="nav-item" href="departments.php"><i class="fas fa-building"></i><span>Departments</span></a><a class="nav-item" href="courses.php"><i class="fas fa-book-open"></i><span>Courses</span></a><a class="nav-item" href="course-categories.php"><i class="fas fa-tags"></i><span>Course Categories</span></a><a class="nav-item" href="course-reviews.php"><i class="fas fa-star"></i><span>Course Reviews</span></a><a class="nav-item" href="enrollments.php"><i class="fas fa-file-signature"></i><span>Enrollments</span></a><a class="nav-item active" href="learning-paths.php"><i class="fas fa-route"></i><span>Learning Paths</span></a><a class="nav-item" href="assignments.php"><i class="fas fa-clipboard-list"></i><span>Assignments</span></a><a class="nav-item" href="quizzes.php"><i class="fas fa-brain"></i><span>Quizzes</span></a><a class="nav-item" href="certificates.php"><i class="fas fa-award"></i><span>Certificates</span></a><a class="nav-item" href="payments.php"><i class="fas fa-credit-card"></i><span>Payments</span></a><a class="nav-item" href="transactions.php"><i class="fas fa-exchange-alt"></i><span>Transactions</span></a><a class="nav-item" href="coupons.php"><i class="fas fa-ticket-alt"></i><span>Coupons</span></a><a class="nav-item" href="subscriptions.php"><i class="fas fa-crown"></i><span>Subscriptions</span></a><a class="nav-item" href="reports.php"><i class="fas fa-chart-pie"></i><span>Reports</span></a><a class="nav-item" href="analytics.php"><i class="fas fa-chart-bar"></i><span>Analytics</span></a><a class="nav-item" href="notifications.php"><i class="fas fa-bell"></i><span>Notifications</span></a><a class="nav-item" href="announcements.php"><i class="fas fa-bullhorn"></i><span>Announcements</span></a><a class="nav-item" href="messages.php"><i class="fas fa-envelope"></i><span>Messages</span></a><a class="nav-item" href="support-tickets.php"><i class="fas fa-headset"></i><span>Support Tickets</span></a><a class="nav-item" href="cms.php"><i class="fas fa-puzzle-piece"></i><span>CMS</span></a><a class="nav-item" href="blog-management.php"><i class="fas fa-blog"></i><span>Blog Management</span></a><a class="nav-item" href="pages-management.php"><i class="fas fa-file-alt"></i><span>Pages Management</span></a><a class="nav-item" href="media-library.php"><i class="fas fa-photo-video"></i><span>Media Library</span></a><a class="nav-item" href="downloads.php"><i class="fas fa-download"></i><span>Downloads</span></a><a class="nav-item" href="email-templates.php"><i class="fas fa-mail-bulk"></i><span>Email Templates</span></a><a class="nav-item" href="smtp-settings.php"><i class="fas fa-satellite-dish"></i><span>SMTP Settings</span></a><a class="nav-item" href="system-settings.php"><i class="fas fa-cogs"></i><span>System Settings</span></a><a class="nav-item" href="appearance.php"><i class="fas fa-palette"></i><span>Appearance</span></a><a class="nav-item" href="security.php"><i class="fas fa-shield-alt"></i><span>Security</span></a><a class="nav-item" href="backup-restore.php"><i class="fas fa-database"></i><span>Backup & Restore</span></a><a class="nav-item" href="audit-logs.php"><i class="fas fa-clipboard-check"></i><span>Audit Logs</span></a><a class="nav-item" href="activity-logs.php"><i class="fas fa-history"></i><span>Activity Logs</span></a><a class="nav-item" href="integrations.php"><i class="fas fa-plug"></i><span>Integrations</span></a><a class="nav-item" href="api-management.php"><i class="fas fa-code"></i><span>API Management</span></a><a class="nav-item" href="database-tools.php"><i class="fas fa-server"></i><span>Database Tools</span></a><a class="nav-item" href="maintenance-mode.php"><i class="fas fa-tools"></i><span>Maintenance Mode</span></a><a class="nav-item" href="profile.php"><i class="fas fa-user-circle"></i><span>Profile</span></a><a class="nav-item" href="settings.php"><i class="fas fa-cog"></i><span>Settings</span></a><a class="nav-item" href="help-center.php"><i class="fas fa-life-ring"></i><span>Help Center</span></a></nav>
    </aside>
    <main class="main-panel">
      <header class="topbar">
        <div><p class="mb-1">Enterprise control center</p><h1>Learning Paths</h1></div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar"><div><strong>Rahul Verma</strong><small>Super Admin</small></div></div>
        </div>
      </header>
      <div class="content-area">
        <nav class="breadcrumb" aria-label="Breadcrumb"><span>Admin</span><span>/</span><span class="active">Learning Paths</span></nav>
        <div class="page-header"><div><h2>Learning Paths</h2><p>Plan and govern curriculum journeys and skill-based sequencing.</p></div><div class="d-flex gap-2"><button type="button" class="btn btn-outline" data-toast="Action queued">Quick action</button><button type="button" class="btn btn-primary" data-toast="Saved">Save</button></div></div>
        <div class="card"><div class="page-header"><div><h2>Learning paths</h2><p>Organize skill tracks, milestones, and prerequisites for learners.</p></div><button type="button" class="btn btn-primary" data-toast="Path created">New learning path</button></div><div class="grid-cards"><div class="card"><h5 class="fw-bold">Frontend Mastery</h5><p class="text-muted">8 modules • 4 weeks</p></div><div class="card"><h5 class="fw-bold">Product Analytics</h5><p class="text-muted">5 modules • 3 weeks</p></div></div></div>
      </div>
    </main>
  </div>
  <button type="button" class="scroll-top" aria-label="Scroll to top"><i class="fas fa-arrow-up"></i></button>
  <div class="toast-container"></div>
<script src="js/site-shell.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
<script src="js/admin-panel.js"></script>
</body>
</html>






