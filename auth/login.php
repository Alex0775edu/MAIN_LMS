<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../includes/schema.php';

lms_ensure_users_table($con);

$message = '';
$email = trim($_POST['email'] ?? '');

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];

function lms_login_redirect_for_role(string $role): string
{
    if ($role === 'admin') {
        return '../admin/index.php';
    }

    if ($role === 'instructor') {
        return '../instructor/dashboard.php';
    }

    return '../dashboard.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $posted_token = $_POST['csrf_token'] ?? '';

    if (!hash_equals($csrf_token, $posted_token)) {
        $message = 'Security check failed. Please refresh the page and try again.';
    } elseif ($email === '' || $password === '') {
        $message = 'Please enter email and password.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
    } else {
        $stmt = mysqli_prepare($con, "SELECT id, fullname, username, email, password, role, status FROM users WHERE email = ? LIMIT 1");

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);

            if ($user && ($user['status'] ?? 'active') !== 'active') {
                $message = 'Your account is not active. Please contact the administrator.';
            } elseif ($user) {
                $stored_password = (string) $user['password'];
                $is_hashed = password_get_info($stored_password)['algo'] !== 0;
                $password_valid = $is_hashed
                    ? password_verify($password, $stored_password)
                    : hash_equals($stored_password, $password);

                if ($password_valid) {
                    session_regenerate_id(true);

                    $role = in_array($user['role'], ['admin', 'instructor', 'student'], true) ? $user['role'] : 'student';
                    $_SESSION['user_id'] = (int) $user['id'];
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $role;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['login_data'] = [
                        'id' => (int) $user['id'],
                        'fullname' => $user['fullname'],
                        'email' => $user['email'],
                        'role' => $role,
                    ];

                    if (!$is_hashed || password_needs_rehash($stored_password, PASSWORD_DEFAULT)) {
                        $new_hash = password_hash($password, PASSWORD_DEFAULT);
                        $update_stmt = mysqli_prepare($con, "UPDATE users SET password = ?, last_login = NOW() WHERE id = ?");
                        if ($update_stmt) {
                            mysqli_stmt_bind_param($update_stmt, 'si', $new_hash, $user['id']);
                            mysqli_stmt_execute($update_stmt);
                            mysqli_stmt_close($update_stmt);
                        }
                    } else {
                        $update_stmt = mysqli_prepare($con, "UPDATE users SET last_login = NOW() WHERE id = ?");
                        if ($update_stmt) {
                            mysqli_stmt_bind_param($update_stmt, 'i', $user['id']);
                            mysqli_stmt_execute($update_stmt);
                            mysqli_stmt_close($update_stmt);
                        }
                    }

                    header('Location: ' . lms_login_redirect_for_role($role));
                    exit;
                }
            }
        }

        $message = 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Dhurandhar LMS secure login for students, instructors, and administrators.">
    <title>Dhurandhar LMS | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/site-shell.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <main class="login-shell">
        <div class="container-fluid">
            <div class="row g-0 min-vh-100">
                <section class="col-lg-5 left-panel" aria-labelledby="loginHeroTitle">
                    <div class="left-panel-inner">
                        <a class="brand-chip text-decoration-none text-white" href="../index.php" data-aos="fade-down">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Dhurandhar LMS</span>
                        </a>
                        <div class="welcome-copy" data-aos="fade-up">
                            <h1 id="loginHeroTitle">Continue learning with a secure account.</h1>
                            <p>Access courses, dashboards, progress reports, and role-specific tools from one polished workspace.</p>
                        </div>
                        <div class="benefit-list" data-aos="fade-up" data-aos-delay="100">
                            <div class="benefit-item"><i class="fas fa-shield-alt"></i><span>Role-based access for admins, instructors, and students</span></div>
                            <div class="benefit-item"><i class="fas fa-chart-line"></i><span>Progress and platform insights after login</span></div>
                            <div class="benefit-item"><i class="fas fa-lock"></i><span>Password hashes upgraded automatically</span></div>
                        </div>
                    </div>
                </section>

                <section class="col-lg-7 right-panel" aria-labelledby="loginHeading">
                    <div class="login-card" data-aos="fade-left">
                        <div class="brand-mark">D</div>
                        <h2 id="loginHeading">Login</h2>
                        <p class="login-description">Use your registered email and password to access Dhurandhar LMS.</p>

                        <?php if ($message !== ''): ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-circle-exclamation me-2"></i><?php echo htmlspecialchars($message); ?>
                            </div>
                        <?php endif; ?>

                        <form id="loginForm" method="post" novalidate>
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email address</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="loginEmail" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="name@example.com" autocomplete="email" required>
                                </div>
                                <div class="invalid-feedback" id="loginEmailError"></div>
                            </div>

                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <div class="input-group input-group-lg password-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                                    <button class="btn password-toggle" type="button" data-toggle-for="loginPassword" aria-label="Show password"><i class="fas fa-eye"></i></button>
                                </div>
                                <div class="invalid-feedback" id="loginPasswordError"></div>
                            </div>

                            <div class="form-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember_me">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a class="text-link" href="../forgot-password.php">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-login">
                                <i class="fas fa-right-to-bracket me-2"></i>Login
                            </button>
                        </form>

                        <p class="extra-links">New to Dhurandhar LMS? <a class="text-link" href="../register.php">Create a student account</a></p>
                        <div class="footer-links">
                            <a href="../index.php">Home</a>
                            <a href="../privacy-policy.php">Privacy</a>
                            <a href="../terms-and-conditions.php">Terms</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <div id="toastContainer" class="toast-container" aria-live="polite" aria-atomic="true"></div>
    <script src="../js/site-shell.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>if (window.AOS) AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });</script>
    <script src="../js/login.js"></script>
</body>
</html>
