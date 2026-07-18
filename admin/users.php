<?php
include('sidebar.php');

// Get all users from database
$users_query = "SELECT id, fullname, username, email, phone, country, gender, role, status, created_at, last_login FROM users ORDER BY created_at DESC";
$users_result = mysqli_query($con, $users_query);
$total_users = mysqli_num_rows($users_result);

// Get counts by role
$student_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM users WHERE role='student'"))['count'];
$instructor_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM users WHERE role='instructor'"))['count'];
$admin_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM users WHERE role='admin'"))['count'];
?>
<main class="main-panel">
      <header class="topbar">
        <div><p class="mb-1">Enterprise control center</p><h1>Users Management</h1></div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar"><div><strong><?php echo htmlspecialchars($admin_data['fullname'] ?? 'Admin'); ?></strong><small><?php echo ucfirst($admin_data['role'] ?? 'Admin'); ?></small></div></div>
        </div>
      </header>
      <div class="content-area">
        <nav class="breadcrumb" aria-label="Breadcrumb"><span>Admin</span><span>/</span><span class="active">Users</span></nav>
        
        <!-- Stats Row -->
        <div class="row g-3 mb-4">
          <div class="col-md-3">
            <div class="card p-3 text-center">
              <h4 class="fw-bold text-primary"><?php echo $total_users; ?></h4>
              <p class="text-muted mb-0">Total Users</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-3 text-center">
              <h4 class="fw-bold text-success"><?php echo $student_count; ?></h4>
              <p class="text-muted mb-0">Students</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-3 text-center">
              <h4 class="fw-bold text-info"><?php echo $instructor_count; ?></h4>
              <p class="text-muted mb-0">Instructors</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-3 text-center">
              <h4 class="fw-bold text-warning"><?php echo $admin_count; ?></h4>
              <p class="text-muted mb-0">Admins</p>
            </div>
          </div>
        </div>
        
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Users</h5>
            <a href="add_user.php" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Add User
            </a>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($total_users > 0): ?>
                    <?php $sno = 1; while($user = mysqli_fetch_assoc($users_result)): ?>
                    <tr>
                      <td><?php echo $sno++; ?></td>
                      <td><strong><?php echo htmlspecialchars($user['fullname']); ?></strong></td>
                      <td><?php echo htmlspecialchars($user['username']); ?></td>
                      <td><?php echo htmlspecialchars($user['email']); ?></td>
                      <td><?php echo htmlspecialchars($user['phone']); ?></td>
                      <td><?php echo htmlspecialchars($user['country']); ?></td>
                      <td>
                        <span class="badge <?php echo $user['role'] == 'admin' ? 'bg-danger' : ($user['role'] == 'instructor' ? 'bg-info' : 'bg-primary'); ?>">
                          <?php echo ucfirst($user['role']); ?>
                        </span>
                      </td>
                      <td>
                        <span class="badge <?php echo $user['status'] == 'active' ? 'bg-success' : ($user['status'] == 'inactive' ? 'bg-warning' : 'bg-danger'); ?>">
                          <?php echo ucfirst($user['status']); ?>
                        </span>
                      </td>
                      <td><?php echo date('M d, Y', strtotime($user['created_at'])); ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="view_user.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-info" title="View">
                            <i class="fas fa-eye"></i>
                          </a>
                          <button type="button" class="btn btn-outline-danger" title="Delete" onclick="confirmDelete(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['fullname']); ?>')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="10" class="text-center py-4">
                        <i class="fas fa-users fa-2x text-muted d-block mb-2"></i>
                        <p class="text-muted mb-0">No users found. <a href="add_user.php">Add your first user</a></p>
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  
  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete user: <strong id="deleteUserName"></strong>?</p>
          <p class="text-danger"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="#" id="deleteConfirmBtn" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    function confirmDelete(userId, userName) {
      document.getElementById('deleteUserName').textContent = userName;
      document.getElementById('deleteConfirmBtn').href = 'delete_user.php?id=' + userId;
      new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }
  </script>
  
  <?php
  include('footer.php');
  ?>