<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dhurandhar LMS | Achievements page for milestones and badges.">
    <title>Dhurandhar LMS | Achievements</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/site-shell.css">
</head>
<body>
    <div class="dashboard-shell">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="dashboard.php" class="brand"><span class="brand-mark">D</span><span class="brand-text">Dhurandhar</span></a>
                <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar"><i class="fas fa-bars"></i></button>
            </div>
            <nav class="sidebar-nav" aria-label="Student dashboard navigation">
                <a href="dashboard.php" class="nav-item"><i class="fas fa-home"></i><span>Dashboard</span></a>
                <a href="achievements.php" class="nav-item active"><i class="fas fa-medal"></i><span>Achievements</span></a>
                <a href="leaderboard.php" class="nav-item"><i class="fas fa-trophy"></i><span>Leaderboard</span></a>
                <a href="profile.php" class="nav-item"><i class="fas fa-user-circle"></i><span>Profile</span></a>
                <a href="settings.php" class="nav-item"><i class="fas fa-cog"></i><span>Settings</span></a>
                <a href="logout.php" class="nav-item"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </nav>
        </aside>
        <div class="main-panel">
            <header class="topbar">
                <button type="button" class="mobile-toggle" id="mobileToggle" aria-label="Open sidebar"><i class="fas fa-bars"></i></button>
                <div><p class="topbar-label">Student Dashboard</p><h1>Achievements</h1></div>
                <div class="topbar-actions">
                    <button type="button" class="icon-btn" aria-label="Notifications" data-dashboard-action="open-notifications"><i class="fas fa-bell"></i><span class="badge">3</span></button>
                    <button type="button" class="icon-btn" aria-label="Messages" data-dashboard-action="open-messages"><i class="fas fa-envelope"></i></button>
                    <button type="button" class="icon-btn theme-toggle" id="themeToggle" aria-label="Toggle dark mode"><i class="fas fa-moon"></i></button>
                </div>
            </header>
            <main class="content-area">
                <section class="card-section" data-aos="fade-up">
                    <div class="section-heading">
                        <div><span class="section-badge">Milestones</span><h3>Badges you have earned</h3></div>
                    </div>
                    <div class="badge-grid">
                        <div class="badge-card gold"><i class="fas fa-medal"></i><span>Top Learner</span></div>
                        <div class="badge-card silver"><i class="fas fa-star"></i><span>Perfect Attendance</span></div>
                        <div class="badge-card bronze"><i class="fas fa-bolt"></i><span>Fast Learner</span></div>
                    </div>
                </section>
            </main>
        </div>
    </div>
<script src="js/site-shell.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>







