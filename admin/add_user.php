<?php
  include('sidebar.php');
?>
<?php


// Initialize variables for form data and messages
$fullname = $username = $email = $phone = $country = $gender = $password = $confirm_password = '';
$fullnameerr = $usernameerr = $emailerr = $phoneerr = $countryerr = $gendererr = $passworderr = $confirm_passworderr = $termserr = '';
$success_message = $error_message = '';
$form_submitted = false;

// Database connection
$con = mysqli_connect(
    "localhost",
    "Aditya",
    "Aditya@0775",
    "dhurandhar_lms"
);

if(!$con){
    die("Database Connection Failed : " . mysqli_connect_error());
}

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
    $password = mysqli_real_escape_string($con, trim($_POST['password'] ?? ''));
    $confirm_password = mysqli_real_escape_string($con, trim($_POST['confirm_password'] ?? ''));
    $terms = isset($_POST['terms']) ? 1 : 0;
    
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
                (fullname, username, email, phone, country, gender, password, ip_address, user_agent, created_at) 
                VALUES 
                ('$fullname', '$username', '$email', '$phone', '$country', '$gender', '$hashed_password', '$ip_address', '$user_agent', NOW())";
        
        // Execute query
        if(mysqli_query($con, $sql)){
            $success_message = 'Registration successful! Welcome to Dhurandhar LMS.';
            $form_submitted = true;
            
            // Clear form data after successful submission
            $fullname = $username = $email = $phone = $country = $gender = $password = $confirm_password = '';
            $fullnameerr = $usernameerr = $emailerr = $phoneerr = $countryerr = $gendererr = $passworderr = $confirm_passworderr = $termserr = '';
            
            // Set session for auto-login
            $_SESSION['user_id'] = mysqli_insert_id($con);
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['role'] = 'student';
            $_SESSION['logged_in'] = true;
            
            // Redirect to dashboard after 2 seconds
            echo '<meta http-equiv="refresh" content="2;url=users.php">';
        } else {
            $error_message = 'Sorry, there was an error creating your account. Please try again later.';
            // Debug: Uncomment below line to see actual error
            // $error_message .= ' Error: ' . mysqli_error($con);
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
        <div><p class="mb-1">Enterprise control center</p><h1>Users</h1></div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar"><div><strong>Aditya Rajak</strong><small>Super Admin</small></div></div>
        </div>
      </header>
      <button class="btn btn-primary w-25"><a href="add_user.php">add User</a></button>
<!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
</table> -->
 <!-- Success Message -->
                        <?php if ($showSuccess): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo htmlspecialchars($success_message); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <!-- Error Message -->
                        <?php if ($showError): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?php echo htmlspecialchars($error_message); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <form id="registerForm" novalidate method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="fullname" class="form-label">Full name</label>
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
                                    <label for="username" class="form-label">Username</label>
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
                                    <label for="email" class="form-label">Email address</label>
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
                                    <label for="phone" class="form-label">Phone number</label>
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
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country</label>
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
                                        </select>
                                    </div>
                                    <?php if (!empty($countryerr)): ?>
                                    <div class="invalid-feedback d-block"><?php echo htmlspecialchars($countryerr); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <div class="gender-row">
                                        <label class="gender-option <?php echo !empty($gendererr) ? 'is-invalid' : ''; ?>">
                                            <input type="radio" name="gender" value="Male" <?php echo $gender === 'Male' ? 'checked' : ''; ?>> Male
                                        </label>
                                        <label class="gender-option <?php echo !empty($gendererr) ? 'is-invalid' : ''; ?>">
                                            <input type="radio" name="gender" value="Female" <?php echo $gender === 'Female' ? 'checked' : ''; ?>> Female
                                        </label>
                                        <label class="gender-option <?php echo !empty($gendererr) ? 'is-invalid' : ''; ?>">
                                            <input type="radio" name="gender" value="Other" <?php echo $gender === 'Other' ? 'checked' : ''; ?>> Other
                                        </label>
                                    </div>
                                    <?php if (!empty($gendererr)): ?>
                                    <div class="invalid-feedback d-block"><?php echo htmlspecialchars($gendererr); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group password-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control <?php echo !empty($passworderr) ? 'is-invalid' : ''; ?>" 
                                               id="password" name="password" placeholder="Create a strong password" 
                                               autocomplete="new-password" required
                                               value="<?php echo htmlspecialchars($password); ?>">
                                        <button class="btn password-toggle" type="button" data-toggle-for="password" aria-label="Show password"><i class="fas fa-eye"></i></button>
                                    </div>
                                    <div class="strength-meter" aria-label="Password strength"><div id="strengthBar"></div></div>
                                    <ul class="requirement-list" id="passwordChecklist">
                                        <li data-pass="length">At least 8 characters</li>
                                        <li data-pass="uppercase">One uppercase letter</li>
                                        <li data-pass="lowercase">One lowercase letter</li>
                                        <li data-pass="number">One number</li>
                                        <li data-pass="special">One special character</li>
                                    </ul>
                                    <?php if (!empty($passworderr)): ?>
                                    <div class="invalid-feedback d-block"><?php echo htmlspecialchars($passworderr); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm password</label>
                                    <div class="input-group password-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control <?php echo !empty($confirm_passworderr) ? 'is-invalid' : ''; ?>" 
                                               id="confirm_password" name="confirm_password" placeholder="Re-enter password" 
                                               autocomplete="new-password" required
                                               value="<?php echo htmlspecialchars($confirm_password); ?>">
                                        <button class="btn password-toggle" type="button" data-toggle-for="confirm_password" aria-label="Show password"><i class="fas fa-eye"></i></button>
                                    </div>
                                    <?php if (!empty($confirm_passworderr)): ?>
                                    <div class="invalid-feedback d-block"><?php echo htmlspecialchars($confirm_passworderr); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input <?php echo !empty($termserr) ? 'is-invalid' : ''; ?>" 
                                       type="checkbox" id="terms" name="terms"
                                       <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="terms">I agree to the Terms of Service and Privacy Policy.</label>
                                <?php if (!empty($termserr)): ?>
                                <div class="invalid-feedback d-block"><?php echo htmlspecialchars($termserr); ?></div>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-register" id="registerButton" name="submit">
                                <span class="btn-label">Create account</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </form>

    </main>
  </div>
  <?php
  include('footer.php');
  ?>




