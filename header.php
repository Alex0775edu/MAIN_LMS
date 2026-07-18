<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function lms_site_url(string $path = ''): string
{
    static $base = null;

    if ($base === null) {
        $document_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? '');
        $header_dir = str_replace('\\', '/', __DIR__);
        $base = '';

        if ($document_root !== '' && strpos($header_dir, $document_root) === 0) {
            $base = '/' . ltrim(substr($header_dir, strlen($document_root)), '/');
        }

        $base = rtrim($base, '/');
    }

    $path = ltrim($path, '/');
    return $base === '' ? '/' . $path : $base . '/' . $path;
}

$site_url = lms_site_url();
$is_logged_in = !empty($_SESSION['logged_in']) || isset($_SESSION['login_data']);
$current_role = $_SESSION['role'] ?? ($_SESSION['login_data']['role'] ?? 'student');
$dashboard_link = $current_role === 'admin'
    ? lms_site_url('admin/index.php')
    : ($current_role === 'instructor' ? lms_site_url('instructor/dashboard.php') : lms_site_url('dashboard.php'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description"
        content="Dhurandhar LMS | Learn Without Limits page for the Dhurandhar Enterprise LMS frontend.">
    <link rel="icon" href="<?php echo htmlspecialchars(lms_site_url('assets/logo-lms.png')); ?>" type="image/x-icon">
    <title>Dhurandhar LMS | Learn Without Limits</title>
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS Architecture -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/variables.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/utilities.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/animations.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/about-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/auth.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/blog-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/dashboard.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/forgot-password.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/instructors-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/module-pages.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/otp-verification.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/register.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/reset-password.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/instructor-module.css')); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(lms_site_url('css/student-module.css')); ?>">
</head>

<body>
    <!-- ==================== TOP ANNOUNCEMENT BAR ==================== -->
    <div class="top-announcement-bar">
        <div class="container">
            <div class="announcement-inner">
                <div class="announcement-links">
                    <a href="mailto:dhurandhar@gmail.com"><i class="fas fa-envelope"></i> dhurandhar@gmail.com</a>
                    <a href="tel:+91 9023208267"><i class="fas fa-phone-alt"></i> +91 9023208267</a>
                    <span><i class="fas fa-clock"></i> Mon - Fri 9:00 AM - 6:00 PM</span>
                </div>
                <div class="announcement-actions">
                    <div class="social-links" aria-label="Social media links">
                      <a href="https://www.facebook.com/@_alex_0775_" aria-label="Facebook" target="_blank"
                            rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/@_alex_0775_" aria-label="Instagram" target="_blank"
                            rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/aditya-kumar-cse/" aria-label="LinkedIn" target="_blank"
                            rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.youtube.com/@CodeWithAditya0775" aria-label="YouTube" target="_blank"
                            rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                        <a href="https://github.com/Alex0775edu" aria-label="GitHub" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MAIN NAVIGATION ==================== -->
    <nav id="mainNavbar" class="navbar navbar-expand-xl navbar-lms sticky-top" aria-label="Primary navigation">
        <div class="container">
            <a href="<?php echo htmlspecialchars(lms_site_url('index.php')); ?>" class="header-logo">
                <img src="<?php echo htmlspecialchars(lms_site_url('assets/logo-lms.png')); ?>" alt="Dhurandhar LMS Logo" class="logo-img" loading="lazy" width="70" height="70">
                Dhura<span>ndhar</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-xl-0">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo htmlspecialchars(lms_site_url('index.php')); ?>" data-nav-link>Home</a></li>
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo htmlspecialchars(lms_site_url('courses.php')); ?>" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" data-nav-link>
                            Courses
                        </a>
                        <div class="dropdown-menu mega-menu">
                            <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-code"></i>
                                        <span>
                                            <strong>Web Development</strong>
                                            <small>Build responsive websites and apps.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-terminal"></i>
                                        <span>
                                            <strong>Programming Languages</strong>
                                            <small>Master Python, JavaScript, C++, and more.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-mobile-alt"></i>
                                        <span>
                                            <strong>Mobile Development</strong>
                                            <small>Create iOS and Android applications.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-robot"></i>
                                        <span>
                                            <strong>Artificial Intelligence</strong>
                                            <small>Explore AI, machine learning, and automation.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-chart-line"></i>
                                        <span>
                                            <strong>Data Science</strong>
                                            <small>Learn analytics, statistics, and visualization.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>
                                            <strong>Cyber Security</strong>
                                            <small>Protect systems and understand ethical hacking.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-cloud"></i>
                                        <span>
                                            <strong>Cloud Computing</strong>
                                            <small>Build on AWS, Azure, and Google Cloud.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-paint-brush"></i>
                                        <span>
                                            <strong>UI/UX Design</strong>
                                            <small>Craft intuitive and polished digital products.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-bullhorn"></i>
                                        <span>
                                            <strong>Digital Marketing</strong>
                                            <small>Grow brands with strategy and content.</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a class="mega-item" href="courses.php">
                                        <i class="fas fa-briefcase"></i>
                                        <span>
                                            <strong>Business</strong>
                                            <small>Improve leadership, finance, and productivity.</small>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars(lms_site_url('categories.php')); ?>" data-nav-link>Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars(lms_site_url('pricing.php')); ?>" data-nav-link>Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars(lms_site_url('instructors.php')); ?>" data-nav-link>Instructors</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars(lms_site_url('blog.php')); ?>" data-nav-link>Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars(lms_site_url('about.php')); ?>" data-nav-link>About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars(lms_site_url('contact.php')); ?>" data-nav-link>Contact</a></li>
                </ul>
                <?php if ($is_logged_in): ?>
                    <a class="btn btn-outline-lms" href="<?php echo htmlspecialchars($dashboard_link); ?>">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-solid-lms" href="<?php echo htmlspecialchars(lms_site_url('admin/logout.php')); ?>">Logout</a>
                <?php else: ?>
                    <a class="btn btn-outline-lms" href="<?php echo htmlspecialchars(lms_site_url('auth/login.php')); ?>">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-solid-lms" href="<?php echo htmlspecialchars(lms_site_url('register.php')); ?>">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

