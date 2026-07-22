<?php
include('sidebar.php');

// Initialize variables for form data and messages
$fullname = $username = $email = $phone = $country = $gender = $password = $confirm_password = '';
$fullnameerr = $usernameerr = $emailerr = $phoneerr = $countryerr = $gendererr = $passworderr = $confirm_passworderr = $termserr = '';
$success_message = $error_message = '';
$form_submitted = false;

// Check if users table exists, if not create it
if(isset($_GET['id'])){
    $user_id = intval($_GET['id']);
    $user_query = "SELECT * FROM users WHERE id = $user_id";
    $user_result = mysqli_query($con, $user_query);
    if(mysqli_num_rows($user_result) > 0){
        $user_data = mysqli_fetch_assoc($user_result);
        $fullname = $user_data['fullname'];
        $username = $user_data['username'];
        $email = $user_data['email'];
        $phone = $user_data['phone'];
        $country = $user_data['country'];
        $gender = $user_data['gender'];
    }
}

// Check if form is submitted
if(isset($_POST['submit'])){
    
    // Sanitize inputs
    $fullname = mysqli_real_escape_string($con, trim($_POST['fullname'] ?? ''));
    $username = mysqli_real_escape_string($con, trim($_POST['username'] ?? ''));
    $email = mysqli_real_escape_string($con, trim($_POST['email'] ?? ''));
    $phone = mysqli_real_escape_string($con, trim($_POST['phone'] ?? ''));
    $country = mysqli_real_escape_string($con, trim($_POST['country'] ?? ''));
    $gender = mysqli_real_escape_string($con, trim($_POST['gender'] ?? ''));
    $role = mysqli_real_escape_string($con, trim($_POST['role'] ?? 'student'));
    
    // Validation flags
    $isValid = true;
    
    // Validate Full Name
    if (empty($fullname)) {
        $fullnameerr = 'Full name is required.';
        $isValid = false;
    } elseif (strlen($fullname) < 2) {
        $fullnameerr = 'Full name must be at least 2 characters.';
        $isValid = false;
    } elseif (strlen($fullname) > 100) {
        $fullnameerr = 'Full name cannot exceed 100 characters.';
        $isValid = false;
    } elseif (!preg_match('/^[a-zA-Z\s\-\.\']+$/', $fullname)) {
        $fullnameerr = 'Full name can only contain letters, spaces, dots, hyphens, and apostrophes.';
        $isValid = false;
    }
    
    // Validate Username
    if (empty($username)) {
        $usernameerr = 'Username is required.';
        $isValid = false;
    } elseif (strlen($username) < 3) {
        $usernameerr = 'Username must be at least 3 characters.';
        $isValid = false;
    } elseif (strlen($username) > 50) {
        $usernameerr = 'Username cannot exceed 50 characters.';
        $isValid = false;
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $usernameerr = 'Username can only contain letters, numbers, and underscores.';
        $isValid = false;
    } 
    
    // Validate Email
    if (empty($email)) {
        $emailerr = 'Email address is required.';
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = 'Please enter a valid email address.';
        $isValid = false;
    } elseif (strlen($email) > 100) {
        $emailerr = 'Email cannot exceed 100 characters.';
        $isValid = false;
    } 
    
    // Validate Phone
    if (empty($phone)) {
        $phoneerr = 'Phone number is required.';
        $isValid = false;
    } elseif (!preg_match('/^[\+\d\s\-\(\)]{10,15}$/', $phone)) {
        $phoneerr = 'Please enter a valid phone number (10-15 digits with optional +, -, (), spaces).';
        $isValid = false;
    }
    
    // Validate Country
    if (empty($country)) {
        $countryerr = 'Please select your country.';
        $isValid = false;
    }
    
    // Validate Gender
    if (empty($gender)) {
        $gendererr = 'Please select your gender.';
        $isValid = false;
    } elseif (!in_array($gender, ['Male', 'Female', 'Other'])) {
        $gendererr = 'Invalid gender selected.';
        $isValid = false;
    }
    
    
    // If no errors, insert into database
    if ($isValid) {

        
        // Get IP address and user agent
        $ip_address = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
        $user_agent = mysqli_real_escape_string($con, $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown');
        
        // Insert query
        $sql = "update users set fullname='$fullname', username='$username', email='$email', phone='$phone', country='$country', gender='$gender', role='$role
', ip_address='$ip_address', user_agent='$user_agent' where id=$user_id";
        // Execute query
        if(mysqli_query($con, $sql)){
            $success_message = 'Registration successful! Welcome to Dhurandhar LMS.';
            $form_submitted = true;
            
            // Clear form data after successful submission
            $fullname = $username = $email = $phone = $country = $gender = $password = $confirm_password = '';
            $fullnameerr = $usernameerr = $emailerr = $phoneerr = $countryerr = $gendererr = $passworderr = $confirm_passworderr = $termserr = '';
            
            // Redirect to users page after 2 seconds
            echo '<meta http-equiv="refresh" content="2;url=users.php">';
        } else {
            $error_message = 'Sorry, there was an error creating your account. Please try again later.';
        }
    } else {
        // Set error message for display
        $error_message = 'Please correct the errors below.';
    }
}

$showSuccess = $form_submitted && empty($error_message) && !empty($success_message);
$showError = !empty($error_message);
?>
<main class="main-panel">
      <header class="topbar">
        <div><p class="mb-1">Enterprise control center</p><h1>Add New User</h1></div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar"><div><strong><?php echo htmlspecialchars($admin_data['fullname'] ?? 'Admin'); ?></strong><small><?php echo ucfirst($admin_data['role'] ?? 'Admin'); ?></small></div></div>
        </div>
      </header>
      <div class="content-area">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <span>Admin</span><span>/</span>
          <a href="users.php">Users</a><span>/</span>
          <span class="active">Add User</span>
        </nav>
        
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Create New User Account</h5>
          </div>
          <div class="card-body">
            <!-- Success Message -->
            <?php if ($showSuccess): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?php echo htmlspecialchars($success_message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if ($showError): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?php echo htmlspecialchars($error_message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <form id="registerForm" novalidate method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="fullname" class="form-label">Full name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control <?php echo !empty($fullnameerr) ? 'is-invalid' : ''; ?>" 
                                   id="fullname" name="fullname" placeholder="Your full name" 
                                   autocomplete="name" required
                                   value="<?php echo htmlspecialchars($fullname); ?>">
                        </div>
                        <?php if (!empty($fullnameerr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($fullnameerr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="text" class="form-control <?php echo !empty($usernameerr) ? 'is-invalid' : ''; ?>" 
                                   id="username" name="username" placeholder="Choose a username" 
                                   autocomplete="username" required
                                   value="<?php echo htmlspecialchars($username); ?>">
                        </div>
                        <?php if (!empty($usernameerr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($usernameerr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control <?php echo !empty($emailerr) ? 'is-invalid' : ''; ?>" 
                                   id="email" name="email" placeholder="name@example.com" 
                                   autocomplete="email" required
                                   value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                        <?php if (!empty($emailerr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($emailerr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone number <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control <?php echo !empty($phoneerr) ? 'is-invalid' : ''; ?>" 
                                   id="phone" name="phone" placeholder="9876543210" 
                                   autocomplete="tel" required
                                   value="<?php echo htmlspecialchars($phone); ?>">
                        </div>
                        <?php if (!empty($phoneerr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($phoneerr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                            <select class="form-select <?php echo !empty($countryerr) ? 'is-invalid' : ''; ?>" 
                                    id="country" name="country" required>
                                <option value="">Select country</option>
                                <option value="India" <?php echo $country === 'India' ? 'selected' : ''; ?>>India</option>
                                <option value="United States" <?php echo $country === 'United States' ? 'selected' : ''; ?>>United States</option>
                                <option value="United Kingdom" <?php echo $country === 'United Kingdom' ? 'selected' : ''; ?>>United Kingdom</option>
                                <option value="Canada" <?php echo $country === 'Canada' ? 'selected' : ''; ?>>Canada</option>
                                <option value="Australia" <?php echo $country === 'Australia' ? 'selected' : ''; ?>>Australia</option>
                                <option value="Germany" <?php echo $country === 'Germany' ? 'selected' : ''; ?>>Germany</option>
                                <option value="France" <?php echo $country === 'France' ? 'selected' : ''; ?>>France</option>
                                <option value="Japan" <?php echo $country === 'Japan' ? 'selected' : ''; ?>>Japan</option>
                            </select>
                        </div>
                        <?php if (!empty($countryerr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($countryerr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                        <div class="d-flex gap-3 pt-2">
                            <div class="form-check">
                                <input class="form-check-input <?php echo !empty($gendererr) ? 'is-invalid' : ''; ?>" 
                                       type="radio" name="gender" value="Male" id="genderMale"
                                       <?php echo $gender === 'Male' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input <?php echo !empty($gendererr) ? 'is-invalid' : ''; ?>" 
                                       type="radio" name="gender" value="Female" id="genderFemale"
                                       <?php echo $gender === 'Female' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input <?php echo !empty($gendererr) ? 'is-invalid' : ''; ?>" 
                                       type="radio" name="gender" value="Other" id="genderOther"
                                       <?php echo $gender === 'Other' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="genderOther">Other</label>
                            </div>
                        </div>
                        <?php if (!empty($gendererr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($gendererr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            <select class="form-select" id="role" name="role">
                                <option value="student">Student</option>
                                <option value="instructor">Instructor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary" name="submit">
                        <i class="fas fa-user-edit me-1"></i> Update User
                    </button>
                    <a href="users.php" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-1"></i> Cancel
                    </a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
  
  <script>
  // Password strength indicator
  document.getElementById('password').addEventListener('input', function() {
      const password = this.value;
      const strengthBar = document.getElementById('strengthBar');
      let strength = 0;
      
      if (password.length >= 8) strength++;
      if (/[A-Z]/.test(password)) strength++;
      if (/[a-z]/.test(password)) strength++;
      if (/[0-9]/.test(password)) strength++;
      if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;
      
      const percentage = (strength / 5) * 100;
      strengthBar.style.width = percentage + '%';
      
      if (percentage <= 20) {
          strengthBar.style.background = '#dc3545';
      } else if (percentage <= 40) {
          strengthBar.style.background = '#ffc107';
      } else if (percentage <= 60) {
          strengthBar.style.background = '#fd7e14';
      } else if (percentage <= 80) {
          strengthBar.style.background = '#0dcaf0';
      } else {
          strengthBar.style.background = '#198754';
      }
  });
  </script>
  
  <?php
  include('footer.php');
  ?>