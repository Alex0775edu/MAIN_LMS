<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta name="description" content="Settings | Dhurandhar Super Admin page for the Dhurandhar Enterprise LMS frontend.">
  <title>Settings | Dhurandhar Super Admin</title>
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
    <main class="main-panel">
      <header class="topbar">
        <div><p class="mb-1">Enterprise control center</p><h1>Settings</h1></div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar"><div><strong><?php echo htmlspecialchars($admin_data['fullname'] ?? 'Admin'); ?></strong><small><?php echo ucfirst($admin_data['role'] ?? 'Admin'); ?></small></div></div>
        </div>
      </header>
      <div class="content-area">
        <nav class="breadcrumb" aria-label="Breadcrumb"><span>Admin</span><span>/</span><span class="active">Settings</span></nav>
        <div class="page-header"><div><h2>Settings</h2><p>Adjust personal preferences and operational admin defaults.</p></div><div class="d-flex gap-2"><button type="button" class="btn btn-outline" data-toast="Action queued">Quick action</button><button type="button" class="btn btn-primary" data-toast="Saved">Save</button></div></div>
        <div class="card"><div class="page-header"><div><h2>Admin settings</h2><p>Tailor your administration preferences for daily operations.</p></div><button type="button" class="btn btn-outline">Reset</button></div><div class="row g-3"><div class="col-md-4"><label class="form-label">Theme</label><select class="form-select" name="field"><option>Light</option><option>Dark</option></select></div><div class="col-md-4"><label class="form-label">Language</label><select class="form-select" name="field"><option>English</option><option>Hindi</option></select></div><div class="col-md-4"><label class="form-label">Timezone</label><select class="form-select" name="field"><option>Asia/Kolkata</option><option>UTC</option></select></div></div></div>
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