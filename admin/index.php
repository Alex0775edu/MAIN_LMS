<?php
  include('sidebar.php');
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
            <div><strong>Aditya Rajak</strong><small>Super Admin</small></div>
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
                  <h2>Welcome back, Super Admin</h2>
                  <p>Monitor learning operations, system stability, and institutional growth from one command center.</p>
                </div>
                <div class="d-flex gap-2"><button type="button" class="btn btn-outline" data-toast="Quick action queued">Quick Actions</button><button type="button" class="btn btn-primary" data-toast="Dashboard refreshed">Refresh</button></div>
              </div>
              <div class="stat-grid">
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-users"></i></div>
                  <h3 class="fw-bold">24,812</h3>
                  <p class="text-muted mb-0">Students</p>
                </div>
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                  <h3 class="fw-bold">318</h3>
                  <p class="text-muted mb-0">Instructors</p>
                </div>
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-book-open"></i></div>
                  <h3 class="fw-bold">1,240</h3>
                  <p class="text-muted mb-0">Courses</p>
                </div>
                <div class="stat-card">
                  <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                  <h3 class="fw-bold">₹8.4M</h3>
                  <p class="text-muted mb-0">Revenue</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="page-header">
                <div>
                  <h3 class="fw-bold mb-1">Revenue overview</h3>
                  <p class="mb-0">Track growth across the learning ecosystem.</p>
                </div><a href="analytics.php" class="btn btn-outline">Open analytics</a>
              </div><canvas id="revenueChart" height="180"></canvas>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <h3 class="fw-bold mb-3">System health</h3>
              <div class="list-stack">
                <div class="stack-row"><strong>Server</strong><span class="chip chip-success">Healthy</span></div>
                <div class="stack-row"><strong>Database</strong><span class="chip chip-success">Online</span></div>
                <div class="stack-row"><strong>Storage</strong><span class="chip chip-warning">83% used</span></div>
                <div class="stack-row"><strong>License</strong><span class="chip chip-info">Valid</span></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <h3 class="fw-bold mb-3">Recent registrations</h3>
              <div class="list-stack">
                <div class="stack-row"><strong>Meera S.</strong><span class="chip chip-primary">Student</span></div>
                <div class="stack-row"><strong>Arjun K.</strong><span class="chip chip-info">Instructor</span></div>
                <div class="stack-row"><strong>Nisha R.</strong><span class="chip chip-success">Staff</span></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <h3 class="fw-bold mb-3">Pending approvals</h3>
              <div class="list-stack">
                <div class="stack-row"><strong>3 course submissions</strong><span class="chip chip-warning">Review</span></div>
                <div class="stack-row"><strong>5 instructor requests</strong><span class="chip chip-warning">Pending</span></div>
                <div class="stack-row"><strong>2 support escalations</strong><span class="chip chip-danger">Urgent</span></div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="card">
              <h3 class="fw-bold mb-3">Live activity feed</h3>
              <div class="timeline-item"><strong>Course published</strong>
                <p class="text-muted mb-0">AI Foundations was published by the content team.</p>
              </div>
              <div class="timeline-item"><strong>Payment received</strong>
                <p class="text-muted mb-0">A new enterprise subscription was activated.</p>
              </div>
              <div class="timeline-item"><strong>Security scan completed</strong>
                <p class="text-muted mb-0">No critical risks detected in the latest review.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <h3 class="fw-bold mb-3">Calendar</h3>
              <div id="adminCalendar"></div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
 <?php
  include('footer.php');
 
 ?>