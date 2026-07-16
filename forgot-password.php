<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dhurandhar LMS | Forgot Password page for the Dhurandhar Enterprise LMS frontend.">
    <title>Dhurandhar LMS | Forgot Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/forgot-password.css">
    <link rel="stylesheet" href="css/site-shell.css">
</head>
<body>
    <div class="auth-shell">
        <div class="container-fluid h-100">
            <div class="row g-0 min-vh-100">
                <section class="col-lg-5 auth-hero" aria-labelledby="forgotHeroTitle">
                    <div class="hero-inner">
                        <div class="brand-pill" data-aos="fade-down">
                            <i class="fas fa-unlock-alt"></i>
                            <span>Dhurandhar LMS</span>
                        </div>
                        <div class="hero-illustration" data-aos="zoom-in">
                            <div class="illustration-card">
                                <div class="icon-ring"></div>
                                <div class="center-icon"><i class="fas fa-envelope-open-text"></i></div>
                            </div>
                            <div class="floating-badge">OTP Secure</div>
                        </div>
                        <div class="hero-copy" data-aos="fade-up">
                            <h1 id="forgotHeroTitle">Recover your access safely</h1>
                            <p>We will send a one-time code to your email so you can regain access to your learning account.</p>
                        </div>
                    </div>
                </section>

                <section class="col-lg-7 auth-form-panel" aria-labelledby="forgotHeading">
                    <div class="form-card" data-aos="fade-left">
                        <div class="brand-mark">D</div>
                        <h2 id="forgotHeading">Forgot password?</h2>
                        <p class="form-intro">Enter the email associated with your account and we will handle the rest.</p>

                        <form id="forgotPasswordForm" novalidate method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" autocomplete="email" required>
                                </div>
                                <div class="invalid-feedback" id="emailError"></div>
                            </div>

                            <button type="submit" class="btn btn-primary-action" id="sendOtpButton">
                                <span class="btn-label">Send OTP</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </form>

                        <p class="switch-link"><a href="auth/login.php" class="text-link"><i class="fas fa-arrow-left"></i> Back to login</a></p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="toast" class="toast-notification" role="status" aria-live="polite" aria-atomic="true"></div>
<script src="js/site-shell.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/forgot-password.js"></script>
</body>
</html>







