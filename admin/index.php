<?php
include('sidebar.php');

$stats = [];


$user_result = mysqli_query($con, "SELECT COUNT(*) as count FROM users");
$stats['total_users'] = mysqli_fetch_assoc($user_result)['count'];


$student_result = mysqli_query($con, "SELECT COUNT(*) as count FROM users WHERE role='student'");
$stats['students'] = mysqli_fetch_assoc($student_result)['count'];

$instructor_result = mysqli_query($con, "SELECT COUNT(*) as count FROM users WHERE role='instructor'");
$stats['instructors'] = mysqli_fetch_assoc($instructor_result)['count'];


$admin_result = mysqli_query($con, "SELECT COUNT(*) as count FROM users WHERE role='admin'");
$stats['admins'] = mysqli_fetch_assoc($admin_result)['count'];

$recent_users_query = "SELECT fullname, email, role, created_at FROM users ORDER BY created_at DESC LIMIT 5";
$recent_users = mysqli_query($con, $recent_users_query);
?>
    <main class="main-panel">
      <header class="topbar">
        <div>
          <p class="mb-1">Enterprise control center</p>
          <h1>Super Admin Dashboard</h1>
        </div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar">
            <div><strong><?php echo htmlspecialchars($admin_data['fullname'] ?? 'Admin'); ?></strong><small><?php echo ucfirst($admin_data['role'] ?? 'Admin'); ?></small></div>
          </div>
        </div>
      </header>
      <div class="content-area">
        <nav class="breadcrumb" aria-label="Breadcrumb"><span>Admin</span><span>/</span><span class="active">Super Admin Dashboard</span></nav>
        <div class="page-header">
          <div>
            <h2>Super Admin Dashboard</h2>
            <p>Enterprise command center for operations, learning, finance, and platform health.</p>
          </div>
          <div class="d-flex gap-2"><button type="button" class="btn btn-outline" data-toast="Action queued">Quick action</button><button type="button" class="btn btn-primary" data-toast="Saved">Save</button></div>
        </div>
        <div class="row g-3">
          <div class="col-12">
            <div class="card">
              <div class="page-header">
                <div>
                  <h2>Welcome back, <?php echo htmlspecialchars($admin_data['fullname'] ?? 'Super Admin'); ?></h2>
                  <p>Monitor learning operations, system stability, and institutional growth from one command center.</p>
                </div>
                <div class="d-flex gap-2"><button type="button" class="btn btn-outline" data-toast="Quick action queued">Quick Actions</button><button type="button" class="btn btn-primary" data-toast="Dashboard refreshed">Refresh</button></div>
              </div>
              <div class="stat-grid">
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-users"></i></div>
                  <h3 class="fw-bold"><?php echo number_format($stats['total_users']); ?></h3>
                  <p class="text-muted mb-0">Total Users</p>
                </div>
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                  <h3 class="fw-bold"><?php echo number_format($stats['students']); ?></h3>
                  <p class="text-muted mb-0">Students</p>
                </div>
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                  <h3 class="fw-bold"><?php echo number_format($stats['instructors']); ?></h3>
                  <p class="text-muted mb-0">Instructors</p>
                </div>
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-user-shield"></i></div>
                  <h3 class="fw-bold"><?php echo number_format($stats['admins']); ?></h3>
                  <p class="text-muted mb-0">Admins</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <h3 class="fw-bold mb-3">Recent Registrations</h3>
              <div class="list-stack">
                <?php if(mysqli_num_rows($recent_users) > 0): ?>
                  <?php while($user = mysqli_fetch_assoc($recent_users)): ?>
                  <div class="stack-row">
                    <div>
                      <strong><?php echo htmlspecialchars($user['fullname']); ?></strong>
                      <small class="text-muted d-block"><?php echo htmlspecialchars($user['email']); ?></small>
                    </div>
                    <span class="chip <?php echo $user['role'] == 'admin' ? 'chip-danger' : ($user['role'] == 'instructor' ? 'chip-info' : 'chip-primary'); ?>">
                      <?php echo ucfirst($user['role']); ?>
                    </span>
                  </div>
                  <?php endwhile; ?>
                <?php else: ?>
                  <p class="text-muted">No recent registrations</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <h3 class="fw-bold mb-3">System Health</h3>
              <div class="list-stack">
                <div class="stack-row"><strong>Server</strong><span class="chip chip-success">Healthy</span></div>
                <div class="stack-row"><strong>Database</strong><span class="chip chip-success">Online</span></div>
                <div class="stack-row"><strong>Storage</strong><span class="chip chip-warning">83% used</span></div>
                <div class="stack-row"><strong>License</strong><span class="chip chip-info">Valid</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
 <?php
  include('footer.php');
 ?>