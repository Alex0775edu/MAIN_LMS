<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../includes/schema.php';

lms_ensure_users_table($con);

if (!isset($_SESSION['login_data']) && isset($_SESSION['user_id'], $_SESSION['role'])) {
    $_SESSION['login_data'] = [
        'id' => (int) $_SESSION['user_id'],
        'fullname' => $_SESSION['fullname'] ?? '',
        'email' => $_SESSION['email'] ?? '',
        'role' => $_SESSION['role'],
    ];
}

if (!isset($_SESSION['login_data']) || ($_SESSION['login_data']['role'] ?? '') !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$admin_id = (int) ($_SESSION['login_data']['id'] ?? 0);
$admin_data = null;

$admin_stmt = mysqli_prepare($con, "SELECT id, fullname, email, role, status FROM users WHERE id = ? AND role = 'admin' LIMIT 1");
if ($admin_stmt) {
    mysqli_stmt_bind_param($admin_stmt, 'i', $admin_id);
    mysqli_stmt_execute($admin_stmt);
    $admin_result = mysqli_stmt_get_result($admin_stmt);
    $admin_data = mysqli_fetch_assoc($admin_result) ?: null;
    mysqli_stmt_close($admin_stmt);
}

if (!$admin_data) {
    session_destroy();
    header("Location: ../auth/login.php");
    exit();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$admin_csrf_token = $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta name="description" content="Super Admin Dashboard | Dhurandhar Super Admin page for the Dhurandhar Enterprise LMS frontend.">
  <title>Super Admin Dashboard | Dhurandhar Super Admin</title>
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
      <a class="brand" href="index.php"><span class="brand-mark">D</span><span>Dhurandhar Admin</span></a>
      <button type="button" class="mobile-toggle icon-btn" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
      <nav class="sidebar-nav" aria-label="Super admin navigation">
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'add_user.php' ? 'active' : ''; ?>" href="users.php"><i class="fas fa-users"></i><span>Users</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'students.php' ? 'active' : ''; ?>" href="students.php"><i class="fas fa-user-graduate"></i><span>Students</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'instructors.php' ? 'active' : ''; ?>" href="instructors.php"><i class="fas fa-chalkboard-teacher"></i><span>Instructors</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'staff.php' ? 'active' : ''; ?>" href="staff.php"><i class="fas fa-user-shield"></i><span>Staff</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'roles-permissions.php' ? 'active' : ''; ?>" href="roles-permissions.php"><i class="fas fa-key"></i><span>Roles & Permissions</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'departments.php' ? 'active' : ''; ?>" href="departments.php"><i class="fas fa-building"></i><span>Departments</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>" href="courses.php"><i class="fas fa-book-open"></i><span>Courses</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'course-categories.php' ? 'active' : ''; ?>" href="course-categories.php"><i class="fas fa-tags"></i><span>Course Categories</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'course-reviews.php' ? 'active' : ''; ?>" href="course-reviews.php"><i class="fas fa-star"></i><span>Course Reviews</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'enrollments.php' ? 'active' : ''; ?>" href="enrollments.php"><i class="fas fa-file-signature"></i><span>Enrollments</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'learning-paths.php' ? 'active' : ''; ?>" href="learning-paths.php"><i class="fas fa-route"></i><span>Learning Paths</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'assignments.php' ? 'active' : ''; ?>" href="assignments.php"><i class="fas fa-clipboard-list"></i><span>Assignments</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'quizzes.php' ? 'active' : ''; ?>" href="quizzes.php"><i class="fas fa-brain"></i><span>Quizzes</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'certificates.php' ? 'active' : ''; ?>" href="certificates.php"><i class="fas fa-award"></i><span>Certificates</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'payments.php' ? 'active' : ''; ?>" href="payments.php"><i class="fas fa-credit-card"></i><span>Payments</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'transactions.php' ? 'active' : ''; ?>" href="transactions.php"><i class="fas fa-exchange-alt"></i><span>Transactions</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'coupons.php' ? 'active' : ''; ?>" href="coupons.php"><i class="fas fa-ticket-alt"></i><span>Coupons</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'subscriptions.php' ? 'active' : ''; ?>" href="subscriptions.php"><i class="fas fa-crown"></i><span>Subscriptions</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'reports.php' ? 'active' : ''; ?>" href="reports.php"><i class="fas fa-chart-pie"></i><span>Reports</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'analytics.php' ? 'active' : ''; ?>" href="analytics.php"><i class="fas fa-chart-bar"></i><span>Analytics</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'notifications.php' ? 'active' : ''; ?>" href="notifications.php"><i class="fas fa-bell"></i><span>Notifications</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'announcements.php' ? 'active' : ''; ?>" href="announcements.php"><i class="fas fa-bullhorn"></i><span>Announcements</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'messages.php' ? 'active' : ''; ?>" href="messages.php"><i class="fas fa-envelope"></i><span>Messages</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'support-tickets.php' ? 'active' : ''; ?>" href="support-tickets.php"><i class="fas fa-headset"></i><span>Support Tickets</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'cms.php' ? 'active' : ''; ?>" href="cms.php"><i class="fas fa-puzzle-piece"></i><span>CMS</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'blog-management.php' ? 'active' : ''; ?>" href="blog-management.php"><i class="fas fa-blog"></i><span>Blog Management</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'pages-management.php' ? 'active' : ''; ?>" href="pages-management.php"><i class="fas fa-file-alt"></i><span>Pages Management</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'media-library.php' ? 'active' : ''; ?>" href="media-library.php"><i class="fas fa-photo-video"></i><span>Media Library</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'downloads.php' ? 'active' : ''; ?>" href="downloads.php"><i class="fas fa-download"></i><span>Downloads</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'email-templates.php' ? 'active' : ''; ?>" href="email-templates.php"><i class="fas fa-mail-bulk"></i><span>Email Templates</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'smtp-settings.php' ? 'active' : ''; ?>" href="smtp-settings.php"><i class="fas fa-satellite-dish"></i><span>SMTP Settings</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'system-settings.php' ? 'active' : ''; ?>" href="system-settings.php"><i class="fas fa-cogs"></i><span>System Settings</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'appearance.php' ? 'active' : ''; ?>" href="appearance.php"><i class="fas fa-palette"></i><span>Appearance</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'security.php' ? 'active' : ''; ?>" href="security.php"><i class="fas fa-shield-alt"></i><span>Security</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'backup-restore.php' ? 'active' : ''; ?>" href="backup-restore.php"><i class="fas fa-database"></i><span>Backup & Restore</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'audit-logs.php' ? 'active' : ''; ?>" href="audit-logs.php"><i class="fas fa-clipboard-check"></i><span>Audit Logs</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'activity-logs.php' ? 'active' : ''; ?>" href="activity-logs.php"><i class="fas fa-history"></i><span>Activity Logs</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'integrations.php' ? 'active' : ''; ?>" href="integrations.php"><i class="fas fa-plug"></i><span>Integrations</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'api-management.php' ? 'active' : ''; ?>" href="api-management.php"><i class="fas fa-code"></i><span>API Management</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'database-tools.php' ? 'active' : ''; ?>" href="database-tools.php"><i class="fas fa-server"></i><span>Database Tools</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'maintenance-mode.php' ? 'active' : ''; ?>" href="maintenance-mode.php"><i class="fas fa-tools"></i><span>Maintenance Mode</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>" href="profile.php"><i class="fas fa-user-circle"></i><span>Profile</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>" href="settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
        <a class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'help-center.php' ? 'active' : ''; ?>" href="help-center.php"><i class="fas fa-life-ring"></i><span>Help Center</span></a>
        <a class="nav-item" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
      </nav>
    </aside>
