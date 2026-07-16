<?php
// Start session for registration
session_start();

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
            echo '<meta http-equiv="refresh" content="2;url=dashboard.php">';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dhurandhar LMS | Register page for the Dhurandhar Enterprise LMS frontend.">
    <title>Dhurandhar LMS | Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/site-shell.css">
    <style>
        /* Additional inline styles for validation messages */
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .success-message {
            color: #28a745;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .is-invalid {
            border-color: #dc3545 !important;
        }
        .is-valid {
            border-color: #28a745 !important;
        }
        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .alert-dismissible .close {
            position: relative;
            top: -0.75rem;
            right: -1.25rem;
            padding: 0.75rem 1.25rem;
            color: inherit;
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
            background: transparent;
            border: 0;
            cursor: pointer;
        }
        .spinner-border {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            vertical-align: text-bottom;
            border: 0.2em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }
        @keyframes spinner-border {
            to { transform: rotate(360deg); }
        }
        .d-none {
            display: none !important;
        }
        .text-center {
            text-align: center;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        .mb-0 {
            margin-bottom: 0;
        }
        .btn-register:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="auth-shell">
        <div class="container-fluid h-100">
            <div class="row g-0 min-vh-100">
                <section class="col-lg-5 auth-hero" aria-labelledby="registerHeroTitle">
                    <div class="hero-inner">
                        <div class="brand-pill" data-aos="fade-down">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Dhurandhar LMS</span>
                        </div>

                        <div class="hero-illustration" data-aos="zoom-in">
                            <div class="illustration-card">
                                <div class="ring ring-one"></div>
                                <div class="ring ring-two"></div>
                                <div class="center-badge">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="floating-note note-top">Live Cohorts</div>
                            <div class="floating-note note-bottom">Career Ready</div>
                        </div>

                        <div class="hero-copy" data-aos="fade-up">
                            <h1 id="registerHeroTitle">Create your account and start learning smarter</h1>
                            <p>Join a premium learning community with flexible paths, expert mentorship, and real-world projects.</p>
                        </div>

                        <div class="benefit-list" data-aos="fade-up">
                            <div class="benefit-item"><i class="fas fa-check-circle"></i><span>Beginner-friendly learning plans</span></div>
                            <div class="benefit-item"><i class="fas fa-check-circle"></i><span>Certificate-backed progress tracking</span></div>
                            <div class="benefit-item"><i class="fas fa-check-circle"></i><span>Mentored workshops and feedback</span></div>
                        </div>
                    </div>
                </section>

                <section class="col-lg-7 auth-form-panel" aria-labelledby="registerHeading">
                    <div class="form-card" data-aos="fade-left">
                        <div class="brand-mark">D</div>
                        <h2 id="registerHeading">Create your account</h2>
                        <p class="form-intro">Start your personalized learning journey in minutes.</p>

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

                        <div class="divider" role="separator" aria-label="Social signup options"><span>or sign up with</span></div>
                        <div class="social-grid">
                            <button type="button" class="social-btn"><i class="fab fa-google"></i><span>Google</span></button>
                            <button type="button" class="social-btn"><i class="fab fa-microsoft"></i><span>Microsoft</span></button>
                            <button type="button" class="social-btn"><i class="fab fa-github"></i><span>GitHub</span></button>
                        </div>

                        <p class="switch-link">Already have an account? <a href="auth/login.php" class="text-link">Log in</a></p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="toast" class="toast-notification" role="status" aria-live="polite" aria-atomic="true"></div>
    <script src="js/site-shell.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/register.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>
<?php
// Close database connection
mysqli_close($con);
?>