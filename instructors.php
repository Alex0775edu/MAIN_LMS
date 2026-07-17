<?php
include('header.php');
?>
    
  <!-- ==================== PAGE HEADER ==================== -->
  <section class="instructors-header">
    <div class="container text-center" data-aos="fade-down">
      <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill">Our Team</span>
      <h1 class="display-4 fw-bold">Meet Our Expert Instructors</h1>
      <p class="lead text-muted">Learn from industry leaders, experienced professionals, and passionate educators</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Instructors</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ==================== STATISTICS SECTION ==================== -->
  <section class="instructor-stats py-4 bg-primary text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-6 col-md-3 mb-3 mb-md-0" data-aos="fade-up">
          <span class="counter fs-2 fw-bold d-block" data-target="860">0</span>
          <small>Total Instructors</small>
        </div>
        <div class="col-6 col-md-3 mb-3 mb-md-0" data-aos="fade-up" data-aos-delay="100">
          <span class="fs-2 fw-bold d-block">50+</span>
          <small>Countries</small>
        </div>
        <div class="col-6 col-md-3 mb-3 mb-md-0" data-aos="fade-up" data-aos-delay="200">
          <span class="fs-2 fw-bold d-block">4.8</span>
          <small>Average Rating</small>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
          <span class="fs-2 fw-bold d-block">15+</span>
          <small>Years Experience Avg</small>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== FEATURED INSTRUCTORS ==================== -->
  <!-- <section class="featured-instructors py-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-down">
        <h2 class="fw-bold">Featured Instructors</h2>
        <p class="text-muted">Our top-rated instructors loved by students worldwide</p>
      </div>
      <div class="row g-4">
        <!-- Featured Instructor 1 
        <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="100">
          <div class="instructor-card bg-white rounded-4 shadow-sm overflow-hidden text-center">
            <div class="instructor-image-wrapper">
              <img src="assets/images/instructors/aditya.jpg"  class="instructor-image">
              <div class="instructor-social">
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="Website"><i class="fas fa-globe"></i></a>
              </div>
              <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                <i class="fas fa-star"></i> 4.9
              </span>
            </div>
            <div class="p-3">
              <h5 class="fw-bold mb-1">Aditya</h5>
              <small class="text-primary fw-medium">Web Development Expert</small>
              <p class="text-muted small mt-2">1+ years at Aaditech. Taught 50+ students worldwide.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="small text-muted"><i class="fas fa-book me-1"></i>12 Courses</span>
                <span class="small text-muted"><i class="fas fa-user-graduate me-1"></i>50+ Students</span>
              </div>
              <button class="btn btn-outline-primary btn-sm w-100 mt-3">View Profile</button>
            </div>
          </div>
        </div>

        <!-- Featured Instructor 2 
        <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="200">
          <div class="instructor-card bg-white rounded-4 shadow-sm overflow-hidden text-center">
            <div class="instructor-image-wrapper">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Mitchell" class="instructor-image">
              <div class="instructor-social">
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="Website"><i class="fas fa-globe"></i></a>
              </div>
              <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                <i class="fas fa-star"></i> 4.8
              </span>
            </div>
            <div class="p-3">
              <h5 class="fw-bold mb-1">Sarah Mitchell</h5>
              <small class="text-primary fw-medium">AI & Machine Learning</small>
              <p class="text-muted small mt-2">PhD from Stanford. Research scientist turned educator.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="small text-muted"><i class="fas fa-book me-1"></i>8 Courses</span>
                <span class="small text-muted"><i class="fas fa-user-graduate me-1"></i>18k Students</span>
              </div>
              <button class="btn btn-outline-primary btn-sm w-100 mt-3">View Profile</button>
            </div>
          </div>
        </div>

        <!-- Featured Instructor 3 
        <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="300">
          <div class="instructor-card bg-white rounded-4 shadow-sm overflow-hidden text-center">
            <div class="instructor-image-wrapper">
              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Prof. James Wilson" class="instructor-image">
              <div class="instructor-social">
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="Website"><i class="fas fa-globe"></i></a>
              </div>
              <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                <i class="fas fa-star"></i> 4.9
              </span>
            </div>
            <div class="p-3">
              <h5 class="fw-bold mb-1">Prof. James Wilson</h5>
              <small class="text-primary fw-medium">Data Science & Analytics</small>
              <p class="text-muted small mt-2">20+ years in data science. Author of 3 best-selling books.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="small text-muted"><i class="fas fa-book me-1"></i>15 Courses</span>
                <span class="small text-muted"><i class="fas fa-user-graduate me-1"></i>32k Students</span>
              </div>
              <button class="btn btn-outline-primary btn-sm w-100 mt-3">View Profile</button>
            </div>
          </div>
        </div>

        <!-- Featured Instructor 4 
        <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="400">
          <div class="instructor-card bg-white rounded-4 shadow-sm overflow-hidden text-center">
            <div class="instructor-image-wrapper">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily Rodriguez" class="instructor-image">
              <div class="instructor-social">
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="Website"><i class="fas fa-globe"></i></a>
              </div>
              <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                <i class="fas fa-star"></i> 4.7
              </span>
            </div>
            <div class="p-3">
              <h5 class="fw-bold mb-1">Emily Rodriguez</h5>
              <small class="text-primary fw-medium">UI/UX Design Lead</small>
              <p class="text-muted small mt-2">Designed for Apple & Airbnb. Passionate design educator.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="small text-muted"><i class="fas fa-book me-1"></i>10 Courses</span>
                <span class="small text-muted"><i class="fas fa-user-graduate me-1"></i>20k Students</span>
              </div>
              <button class="btn btn-outline-primary btn-sm w-100 mt-3">View Profile</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- ==================== ALL INSTRUCTORS GRID ==================== -->
  <section class="all-instructors py-5 bg-light">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" data-aos="fade-down">
        <h2 class="fw-bold mb-3 mb-md-0">All Instructors</h2>
        <!-- Filter Buttons -->
        <div class="filter-buttons">
          <button class="btn btn-sm btn-primary active filter-btn" data-filter="all">All</button>
          <button class="btn btn-sm btn-outline-primary filter-btn" data-filter="web">Web Development</button>
          <button class="btn btn-sm btn-outline-primary filter-btn" data-filter="data">Data Science</button>
          <button class="btn btn-sm btn-outline-primary filter-btn" data-filter="design">UI/UX Design</button>
          <button class="btn btn-sm btn-outline-primary filter-btn" data-filter="mobile">Mobile Apps</button>
        </div>
      </div>
      <div class="row g-4" id="instructorsGrid">
        <!-- Instructor Card 1 - Web Development -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="web" data-aos="fade-up" data-aos-delay="50">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Alex Thompson</h6>
            <small class="text-muted">React Specialist</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.8
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 2 - Data Science -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="data" data-aos="fade-up" data-aos-delay="100">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Lisa Park</h6>
            <small class="text-muted">Python Expert</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.7
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 3 - UI/UX Design -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="design" data-aos="fade-up" data-aos-delay="150">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">David Kim</h6>
            <small class="text-muted">Figma Expert</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.9
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 4 - Mobile Apps -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="mobile" data-aos="fade-up" data-aos-delay="200">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/women/55.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Maria Garcia</h6>
            <small class="text-muted">Flutter Developer</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.6
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 5 - Web Development -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="web" data-aos="fade-up" data-aos-delay="250">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Ryan Cooper</h6>
            <small class="text-muted">Node.js Expert</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.8
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 6 - Data Science -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="data" data-aos="fade-up" data-aos-delay="300">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/women/77.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Nina Patel</h6>
            <small class="text-muted">SQL Specialist</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.5
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 7 - UI/UX Design -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="design" data-aos="fade-up" data-aos-delay="350">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/men/66.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Tom Baker</h6>
            <small class="text-muted">Adobe XD Pro</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.7
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>

        <!-- Instructor Card 8 - Mobile Apps -->
        <div class="col-lg-3 col-md-4 col-6 instructor-item" data-category="mobile" data-aos="fade-up" data-aos-delay="400">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="https://randomuser.me/api/portraits/women/88.jpg" alt="Instructor" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">Sophie Taylor</h6>
            <small class="text-muted">iOS Developer</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> 4.8
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Load More Button -->
      <div class="text-center mt-5" data-aos="fade-up">
        <button class="btn btn-primary btn-lg px-5" id="loadMoreBtn">
          <i class="fas fa-sync-alt me-2"></i>Load More Instructors
        </button>
      </div>
    </div>
  </section>

  <!-- ==================== BECOME INSTRUCTOR SECTION ==================== -->
  <section class="become-instructor py-5">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="https://img.freepik.com/free-vector/teaching-concept-illustration_114360-2251.jpg" 
               alt="Become an Instructor" 
               class="img-fluid rounded-4 shadow-lg">
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <span class="badge bg-secondary bg-opacity-10 text-secondary mb-3 px-3 py-2 rounded-pill">Join Our Team</span>
          <h2 class="fw-bold mb-3">Become An Instructor</h2>
          <p class="text-muted mb-3">
            Share your knowledge, inspire millions of learners, and earn money doing what you love. 
            Join our community of 860+ expert instructors from around the world.
          </p>
          <ul class="list-unstyled mb-4">
            <li class="mb-2">
              <i class="fas fa-check-circle text-primary me-2"></i>
              <span>Teach at your own pace and schedule</span>
            </li>
            <li class="mb-2">
              <i class="fas fa-check-circle text-primary me-2"></i>
              <span>Reach students in 150+ countries</span>
            </li>
            <li class="mb-2">
              <i class="fas fa-check-circle text-primary me-2"></i>
              <span>Earn competitive revenue share</span>
            </li>
            <li class="mb-2">
              <i class="fas fa-check-circle text-primary me-2"></i>
              <span>Access to instructor resources and support</span>
            </li>
          </ul>
          <a href="#" class="btn btn-primary btn-lg">Start Teaching Today</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== TESTIMONIALS ABOUT INSTRUCTORS ==================== -->
  <section class="instructor-testimonials py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-down">
        <h2 class="fw-bold">What Students Say About Our Instructors</h2>
        <p class="text-muted">Real feedback from real learners</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm">
            <div class="text-warning mb-2">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-muted small">"Dr. Robert Chen explains complex concepts in such a simple way. His web development course changed my career completely!"</p>
            <div class="d-flex align-items-center mt-3">
              <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Student" class="rounded-circle me-2" width="40">
              <div>
                <h6 class="fw-bold mb-0 small">Jessica L.</h6>
                <small class="text-muted">Web Developer at Shopify</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm">
            <div class="text-warning mb-2">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-muted small">"Sarah Mitchell's AI course is the best investment I've ever made. Her teaching style is engaging and practical."</p>
            <div class="d-flex align-items-center mt-3">
              <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Student" class="rounded-circle me-2" width="40">
              <div>
                <h6 class="fw-bold mb-0 small">Mark D.</h6>
                <small class="text-muted">ML Engineer at Google</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm">
            <div class="text-warning mb-2">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-muted small">"Emily Rodriguez taught me UI/UX design from scratch. Her project-based approach helped me build an amazing portfolio."</p>
            <div class="d-flex align-items-center mt-3">
              <img src="https://randomuser.me/api/portraits/women/54.jpg" alt="Student" class="rounded-circle me-2" width="40">
              <div>
                <h6 class="fw-bold mb-0 small">Aisha K.</h6>
                <small class="text-muted">Product Designer at Airbnb</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== CTA SECTION ==================== -->
  <section class="instructor-cta py-5 bg-primary text-white text-center">
    <div class="container" data-aos="zoom-in">
      <h2 class="fw-bold mb-3">Learn From The Best Instructors</h2>
      <p class="lead mb-4">Join thousands of students already learning from our expert instructors</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="index.php#courses" class="btn btn-light btn-lg px-4">Browse All Courses</a>
        <a href="signup.php" class="btn btn-outline-light btn-lg px-4">Get Started Free</a>
      </div>
    </div>
  </section>
<?php
include('footer.php');
?>