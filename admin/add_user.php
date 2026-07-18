<?php
include('sidebar.php');

// Initialize variables for form data and messages
$fullname = $username = $email = $phone = $country = $gender = $password = $confirm_password = '';
$fullnameerr = $usernameerr = $emailerr = $phoneerr = $countryerr = $gendererr = $passworderr = $confirm_passworderr = $termserr = '';
$success_message = $error_message = '';
$form_submitted = false;

// Check if users table exists, if not create it
$check_table = "SHOW TABLES LIKE 'users'";
$table_result = mysqli_query($con, $check_table);

if(mysqli_num_rows($table_result) == 0) {
    // Create users table if it doesn't exist
    $create_table = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) NOT NULL AUTO_INCREMENT,
        fullname VARCHAR(100) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(20) NOT NULL,
        country VARCHAR(50) NOT NULL,
        gender ENUM('Male', 'Female', 'Other') NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('student', 'instructor', 'admin') DEFAULT 'student',
        status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
        ip_address VARCHAR(45) DEFAULT NULL,
        user_agent TEXT DEFAULT NULL,
        last_login TIMESTAMP NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY unique_username (username),
        UNIQUE KEY unique_email (email),
        INDEX idx_email (email),
        INDEX idx_username (username),
        INDEX idx_created_at (created_at),
        INDEX idx_status (status)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if(!mysqli_query($con, $create_table)){
        $error_message = 'Database setup error: ' . mysqli_error($con);
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
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $terms = isset($_POST['terms']) ? 1 : 0;
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
    } else {
        // Check if username already exists
        $check_username = "SELECT id FROM users WHERE username = '$username'";
        $username_result = mysqli_query($con, $check_username);
        if(mysqli_num_rows($username_result) > 0) {
            $usernameerr = 'Username already taken. Please choose another.';
            $isValid = false;
        }
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
    } else {
        // Check if email already exists
        $check_email = "SELECT id FROM users WHERE email = '$email'";
        $email_result = mysqli_query($con, $check_email);
        if(mysqli_num_rows($email_result) > 0) {
            $emailerr = 'Email already registered. Please use another or login.';
            $isValid = false;
        }
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
    
    // Validate Password
    if (empty($password)) {
        $passworderr = 'Password is required.';
        $isValid = false;
    } elseif (strlen($password) < 8) {
        $passworderr = 'Password must be at least 8 characters.';
        $isValid = false;
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $passworderr = 'Password must contain at least one uppercase letter.';
        $isValid = false;
    } elseif (!preg_match('/[a-z]/', $password)) {
        $passworderr = 'Password must contain at least one lowercase letter.';
        $isValid = false;
    } elseif (!preg_match('/[0-9]/', $password)) {
        $passworderr = 'Password must contain at least one number.';
        $isValid = false;
    } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $passworderr = 'Password must contain at least one special character.';
        $isValid = false;
    }
    
    // Validate Confirm Password
    if (empty($confirm_password)) {
        $confirm_passworderr = 'Please confirm your password.';
        $isValid = false;
    } elseif ($password !== $confirm_password) {
        $confirm_passworderr = 'Passwords do not match.';
        $isValid = false;
    }
    
    // Validate Terms
    if (!$terms) {
        $termserr = 'You must agree to the Terms of Service and Privacy Policy.';
        $isValid = false;
    }
    
    // If no errors, insert into database
    if ($isValid) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Get IP address and user agent
        $ip_address = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
        $user_agent = mysqli_real_escape_string($con, $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown');
        
        // Insert query
        $sql = "INSERT INTO users 
                (fullname, username, email, phone, country, gender, password, role, ip_address, user_agent, created_at) 
                VALUES 
                ('$fullname', '$username', '$email', '$phone', '$country', '$gender', '$hashed_password', '$role', '$ip_address', '$user_agent', NOW())";
        
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
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control <?php echo !empty($passworderr) ? 'is-invalid' : ''; ?>" 
                                   id="password" name="password" placeholder="Create a strong password" 
                                   autocomplete="new-password" required>
                        </div>
                        <div class="strength-meter mt-2" style="height: 4px; background: #e9ecef; border-radius: 2px; overflow: hidden;">
                            <div id="strengthBar" style="width: 0%; height: 100%; background: #dc3545; transition: width 0.3s;"></div>
                        </div>
                        <small class="text-muted">Password must be at least 8 characters with uppercase, lowercase, number, and special character.</small>
                        <?php if (!empty($passworderr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($passworderr); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm_password" class="form-label">Confirm password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control <?php echo !empty($confirm_passworderr) ? 'is-invalid' : ''; ?>" 
                                   id="confirm_password" name="confirm_password" placeholder="Re-enter password" 
                                   autocomplete="new-password" required>
                        </div>
                        <?php if (!empty($confirm_passworderr)): ?>
                        <div class="invalid-feedback d-block"><?php echo htmlspecialchars($confirm_passworderr); ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-check mt-4">
                    <input class="form-check-input <?php echo !empty($termserr) ? 'is-invalid' : ''; ?>" 
                           type="checkbox" id="terms" name="terms"
                           <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>.
                    </label>
                    <?php if (!empty($termserr)): ?>
                    <div class="invalid-feedback d-block"><?php echo htmlspecialchars($termserr); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary" name="submit">
                        <i class="fas fa-user-plus me-1"></i> Create User
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