﻿<?php
include('header.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {

}
// Initialize variables for form data and messages
$name = $email = $phone = $subject = $message = '';
$nameerr = $emailerr = $phoneerr = $subjecterr = $messageerr = $agreeerr = '';
$success_message = $error_message = '';
$form_submitted = false;

$con = mysqli_connect(
    "localhost",
    "Aditya",
    "Aditya@0775",
    "dhurandhar_lms",
);

if(!$con){
    die("Database Connection Failed : " .mysqli_connect_error());
}

// Check if contact table exists, if not create it
$check_table = "SHOW TABLES LIKE 'contact'";
$table_result = mysqli_query($con, $check_table);

if(mysqli_num_rows($table_result) == 0) {
    // Create contact table if it doesn't exist
    $create_table = "CREATE TABLE IF NOT EXISTS contact (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) DEFAULT NULL,
        subject VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        agreed TINYINT(1) NOT NULL DEFAULT 0,
        ip_address VARCHAR(45) DEFAULT NULL,
        user_agent TEXT DEFAULT NULL,
        status ENUM('new', 'read', 'replied', 'archived') DEFAULT 'new',
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        INDEX idx_email (email),
        INDEX idx_created_at (created_at),
        INDEX idx_status (status),
        INDEX idx_subject (subject)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if(!mysqli_query($con, $create_table)){
        $error_message = 'Database setup error: ' .mysqli_error($con);
    }
}

// Check if form is submitted
if(isset($_POST['submit'])){
    
    // Sanitize inputs
    $name = mysqli_real_escape_string($con, trim($_POST['contactname'] ?? ''));
    $email = mysqli_real_escape_string($con, trim($_POST['contactemail'] ?? ''));
    $phone = mysqli_real_escape_string($con, trim($_POST['contactphone'] ?? ''));
    $subject = mysqli_real_escape_string($con, trim($_POST['contactsubject'] ?? ''));
    $message = mysqli_real_escape_string($con, trim($_POST['contactmessage'] ?? ''));
    $agreed = isset($_POST['agreecontact']) ? 1 : 0;
    
    // Validation flags
    $isValid = true;
    // Validate Full Name
    if (empty($name)) {
        $nameerr = 'Full name is required.';
        $isValid = false;
    } elseif (strlen($name) < 2) {
        $nameerr = 'Name must be at least 2 characters.';
        $isValid = false;
    } elseif (strlen($name) > 100) {
        $nameerr = 'Name cannot exceed 100 characters.';
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
    
    // Validate Phone (optional but if provided, validate format)
    if (!empty($phone)) {
        $phone_pattern = '/^[\+\d\s\-\(\)]{10,20}$/';
        if (!preg_match($phone_pattern, $phone)) {
            $phoneerr = 'Please enter a valid phone number.';
            $isValid = false;
        }
    }
    
    // Validate Subject
    if (empty($subject)) {
        $subjecterr = 'Please select a subject.';
        $isValid = false;
    }
    
    // Validate Message
    if (empty($message)) {
        $messageerr = 'Message is required.';
        $isValid = false;
    } elseif (strlen($message) < 10) {
        $messageerr = 'Message must be at least 10 characters.';
        $isValid = false;
    } elseif (strlen($message) > 2000) {
        $messageerr = 'Message cannot exceed 2000 characters.';
        $isValid = false;
    }
    
    // Validate Agreement
    if (!$agreed) {
        $agreeerr = 'You must agree to our privacy policy.';
        $isValid = false;
    }
    
    // If no errors, insert into database
    if ($isValid) {
        // Get IP address and user agent
        $ip_address = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
        $user_agent = mysqli_real_escape_string($con, $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown');
        
        // Insert query
        $sql = "INSERT INTO contact 
                (name, email, phone, subject, message, agreed, ip_address, user_agent, created_at) 
                VALUES 
                ('$name', '$email', '$phone', '$subject', '$message', '$agreed', '$ip_address', '$user_agent', NOW())";
        
        // Execute query
        if(mysqli_query($con, $sql)){
            $success_message = 'Thank you! Your message has been sent successfully. We\'ll get back to you within 24 hours.';
            $form_submitted = true;
            
            // Clear form data after successful submission
            $name = $email = $phone = $subject = $message = '';
            $nameerr = $emailerr = $phoneerr = $subjecterr = $messageerr = $agreeerr = '';
        } else {
            $error_message = 'Sorry, there was an error sending your message. Please try again later.';
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

<!-- ==================== PAGE HEADER ==================== -->
<section class="page-header">
  <div class="container text-center" data-aos="fade-down">
    <h1 class="display-4 fw-bold">Get In Touch</h1>
    <p class="lead text-muted">We'd love to hear from you. Let's start a conversation.</p>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
      </ol>
    </nav>
  </div>
</section>

<!-- ==================== CONTACT INFO CARDS ==================== -->
<section class="contact-info-section py-5">
  <div class="container">
    <div class="row g-4">
      <!-- Card 1: Address -->
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="info-card text-center bg-white rounded-4 p-4 shadow-sm h-100">
          <div class="info-icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <h5 class="fw-bold mt-3">Our Address</h5>
          <p class="text-muted small">
            123 Learning Street<br>
            Tech Park, San Francisco<br>
            CA 94105, USA
          </p>
        </div>
      </div>

      <!-- Card 2: Phone -->
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="info-card text-center bg-white rounded-4 p-4 shadow-sm h-100">
          <div class="info-icon">
            <i class="fas fa-phone-alt"></i>
          </div>
          <h5 class="fw-bold mt-3">Call Us</h5>
          <p class="text-muted small">
            +1 (555) 987-6543<br>
            +1 (555) 123-4567<br>
            <small class="text-primary">Mon-Fri 9am-6pm</small>
          </p>
        </div>
      </div>

      <!-- Card 3: Email -->
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="info-card text-center bg-white rounded-4 p-4 shadow-sm h-100">
          <div class="info-icon">
            <i class="fas fa-envelope"></i>
          </div>
          <h5 class="fw-bold mt-3">Email Us</h5>
          <p class="text-muted small">
            hello@dhurandhar.com<br>
            support@dhurandhar.com<br>
            <small class="text-primary">We reply within 24hrs</small>
          </p>
        </div>
      </div>

      <!-- Card 4: Live Chat -->
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="info-card text-center bg-white rounded-4 p-4 shadow-sm h-100">
          <div class="info-icon">
            <i class="fas fa-comments"></i>
          </div>
          <h5 class="fw-bold mt-3">Live Chat</h5>
          <p class="text-muted small">
            Chat with our support team<br>
            Available 24/7<br>
            <button type="button" class="btn btn-sm btn-outline-primary mt-2">Start Chat</button>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== CONTACT FORM & MAP ==================== -->
<section class="contact-form-section py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <!-- Left: Contact Form -->
      <div class="col-lg-7" data-aos="fade-right">
        <div class="contact-form-wrapper bg-white rounded-4 p-4 p-md-5 shadow-sm">
          <h2 class="fw-bold mb-2">Send Us a Message</h2>
          <p class="text-muted mb-4">Fill out the form below and we'll get back to you shortly.</p>

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

          <form id="contactForm" method="post" novalidate>
            <div class="row g-3">
              <!-- Name Field -->
              <div class="col-md-6">
                <label for="contactName" class="form-label fw-medium">Full Name *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control <?php echo !empty($nameerr) ? 'is-invalid' : ''; ?>" 
                         id="contactName" placeholder="John Doe" required name="contactname"
                         value="<?php echo htmlspecialchars($name); ?>">
                </div>
                <?php if (!empty($nameerr)): ?>
                <div class="invalid-feedback d-block">
                  <?php echo htmlspecialchars($nameerr); ?>
                </div>
                <?php endif; ?>
              </div>

              <!-- Email Field -->
              <div class="col-md-6">
                <label for="contactEmail" class="form-label fw-medium">Email Address *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" class="form-control <?php echo !empty($emailerr) ? 'is-invalid' : ''; ?>" 
                         id="contactEmail" placeholder="you@example.com" required name="contactemail"
                         value="<?php echo htmlspecialchars($email); ?>">
                </div>
                <?php if (!empty($emailerr)): ?>
                <div class="invalid-feedback d-block">
                  <?php echo htmlspecialchars($emailerr); ?>
                </div>
                <?php endif; ?>
              </div>

              <!-- Phone Field -->
              <div class="col-md-6">
                <label for="contactPhone" class="form-label fw-medium">Phone Number</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                  <input type="tel" class="form-control <?php echo !empty($phoneerr) ? 'is-invalid' : ''; ?>" 
                         id="contactPhone" placeholder="+1 (555) 000-0000" name="contactphone"
                         value="<?php echo htmlspecialchars($phone); ?>">
                </div>
                <?php if (!empty($phoneerr)): ?>
                <div class="invalid-feedback d-block">
                  <?php echo htmlspecialchars($phoneerr); ?>
                </div>
                <?php endif; ?>
              </div>

              <!-- Subject Field -->
              <div class="col-md-6">
                <label for="contactSubject" class="form-label fw-medium">Subject *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-tag"></i></span>
                  <select class="form-select <?php echo !empty($subjecterr) ? 'is-invalid' : ''; ?>" 
                          id="contactSubject" required name="contactsubject">
                    <option value="" <?php echo empty($subject) ? 'selected' : ''; ?> disabled>Select a topic</option>
                    <option value="general" <?php echo $subject === 'general' ? 'selected' : ''; ?>>General Inquiry</option>
                    <option value="courses" <?php echo $subject === 'courses' ? 'selected' : ''; ?>>Course Information</option>
                    <option value="technical" <?php echo $subject === 'technical' ? 'selected' : ''; ?>>Technical Support</option>
                    <option value="billing" <?php echo $subject === 'billing' ? 'selected' : ''; ?>>Billing & Pricing</option>
                    <option value="partnership" <?php echo $subject === 'partnership' ? 'selected' : ''; ?>>Partnership Opportunity</option>
                    <option value="other" <?php echo $subject === 'other' ? 'selected' : ''; ?>>Other</option>
                  </select>
                </div>
                <?php if (!empty($subjecterr)): ?>
                <div class="invalid-feedback d-block">
                  <?php echo htmlspecialchars($subjecterr); ?>
                </div>
                <?php endif; ?>
              </div>

              <!-- Message Field -->
              <div class="col-12">
                <label for="contactMessage" class="form-label fw-medium">Your Message *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-pen"></i></span>
                  <textarea class="form-control <?php echo !empty($messageerr) ? 'is-invalid' : ''; ?>" 
                            id="contactMessage" rows="5"
                            placeholder="Tell us how we can help you..." 
                            required name="contactmessage"><?php echo htmlspecialchars($message); ?></textarea>
                </div>
                <?php if (!empty($messageerr)): ?>
                <div class="invalid-feedback d-block">
                  <?php echo htmlspecialchars($messageerr); ?>
                </div>
                <?php endif; ?>
              </div>

              <!-- Agreement Checkbox -->
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input <?php echo !empty($agreeerr) ? 'is-invalid' : ''; ?>" 
                         type="checkbox" id="agreeContact" required name="agreecontact"
                         <?php echo isset($_POST['agreecontact']) ? 'checked' : ''; ?>>
                  <label class="form-check-label small" for="agreeContact">
                    I agree that my submitted data is being collected and stored.
                    Read our <a href="privacy-policy.php" class="text-primary">Privacy Policy</a>.
                  </label>
                  <?php if (!empty($agreeerr)): ?>
                  <div class="invalid-feedback d-block">
                    <?php echo htmlspecialchars($agreeerr); ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary btn-submit-contact">
                  <i class="fas fa-paper-plane me-2"></i>Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Right: Map & Additional Info -->
      <div class="col-lg-5" data-aos="fade-left">
        <!-- Map Embed -->
        <div class="map-wrapper rounded-4 overflow-hidden shadow-sm mb-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6787.874884364184!2d80.94237478375352!3d26.91886235168885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399957f6b5f1fa83%3A0x9d06aea16ba57354!2sTechsima%20Solution%20Private%20Limited%20%7C%20Best%20IT%20Training%20Institute%20%26%20Top%20Software%20Company%20in%20Lucknow!5e0!3m2!1sen!2sin!4v1784167886105!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>

        <!-- Office Hours Card -->
        <div class="hours-card bg-white rounded-4 p-4 shadow-sm">
          <h5 class="fw-bold mb-3">
            <i class="far fa-clock text-primary me-2"></i>Office Hours
          </h5>
          <ul class="list-unstyled mb-0">
            <li class="d-flex justify-content-between py-2 border-bottom">
              <span>Monday - Friday</span>
              <span class="fw-medium">9:00 AM - 6:00 PM</span>
            </li>
            <li class="d-flex justify-content-between py-2 border-bottom">
              <span>Saturday</span>
              <span class="fw-medium">10:00 AM - 4:00 PM</span>
            </li>
            <li class="d-flex justify-content-between py-2">
              <span>Sunday</span>
              <span class="text-muted">Closed</span>
            </li>
          </ul>
        </div>

        <!-- Social Media Connect -->
        <div class="social-connect bg-white rounded-4 p-4 shadow-sm mt-4">
          <h5 class="fw-bold mb-3">
            <i class="fas fa-share-alt text-primary me-2"></i>Connect With Us
          </h5>
          <div class="d-flex gap-2 flex-wrap">
            <a href="https://www.facebook.com/" class="social-connect-icon facebook" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://x.com/" class="social-connect-icon twitter" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/" class="social-connect-icon linkedin" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://www.instagram.com/" class="social-connect-icon instagram" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.youtube.com/" class="social-connect-icon youtube" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== FAQ SECTION ==================== -->
<section class="faq-section py-5">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-down">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
      <p class="text-muted">Find quick answers to common questions</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="accordion" id="contactFaq">
          <!-- FAQ Item 1 -->
          <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed rounded-3" type="button"
                data-bs-toggle="collapse" data-bs-target="#faqContact1">
                How quickly do you respond to messages?
              </button>
            </h2>
            <div id="faqContact1" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
              <div class="accordion-body text-muted">
                We typically respond to all inquiries within 24 hours during business days.
                For urgent matters, we recommend using our live chat feature for immediate assistance.
              </div>
            </div>
          </div>

          <!-- FAQ Item 2 -->
          <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed rounded-3" type="button"
                data-bs-toggle="collapse" data-bs-target="#faqContact2">
                Can I visit your office in person?
              </button>
            </h2>
            <div id="faqContact2" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
              <div class="accordion-body text-muted">
                Yes! We welcome visitors during our office hours. Please schedule an appointment
                in advance by calling or emailing us so we can ensure someone is available to assist you.
              </div>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed rounded-3" type="button"
                data-bs-toggle="collapse" data-bs-target="#faqContact3">
                How do I report a technical issue?
              </button>
            </h2>
            <div id="faqContact3" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
              <div class="accordion-body text-muted">
                Select "Technical Support" from the subject dropdown in the contact form,
                describe your issue in detail, and our tech team will resolve it promptly.
                You can also email support@dhurandhar.com directly.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== CTA SECTION ==================== -->
<section class="cta-section py-5 bg-primary text-white text-center">
  <div class="container" data-aos="zoom-in">
    <h2 class="fw-bold mb-3">Still Have Questions?</h2>
    <p class="lead mb-4">Our friendly support team is ready to help you.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="tel:+15559876543" class="btn btn-light btn-lg">
        <i class="fas fa-phone-alt me-2"></i>Call Us Now
      </a>
      <a href="mailto:support@dhurandhar.com" class="btn btn-outline-light btn-lg">
        <i class="fas fa-envelope me-2"></i>Email Support
      </a>
    </div>
  </div>
</section>

<?php
// Close database connection
mysqli_close($con);
include('footer.php');
?>