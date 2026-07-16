<?php
include('header.php');
?>
  <!-- ==================== PAGE HEADER ==================== -->
  <section class="blog-header">
    <div class="container text-center" data-aos="fade-down">
      <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill">Our Blog</span>
      <h1 class="display-4 fw-bold">Learning Resources & Insights</h1>
      <p class="lead text-muted">Discover tips, tutorials, and industry insights to accelerate your learning journey</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ==================== BLOG CONTENT SECTION ==================== -->
  <section class="blog-content py-5">
    <div class="container">
      <div class="row g-4">
        <!-- ==================== MAIN BLOG POSTS (Left Side) ==================== -->
        <div class="col-lg-8">
          <!-- Blog Post 1 - Featured -->
          <article class="blog-card featured-post bg-white rounded-4 shadow-sm overflow-hidden mb-4" data-aos="fade-up">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="blog-image-wrapper">
                  <img src="https://img.freepik.com/free-vector/web-development-concept-illustration_114360-2581.jpg" 
                       alt="Web Development Trends" 
                       class="blog-image">
                  <span class="category-badge">Web Development</span>
                </div>
              </div>
              <div class="col-md-7">
                <div class="blog-card-body p-4">
                  <div class="blog-meta mb-2">
                    <span class="text-muted small me-3">
                      <i class="far fa-calendar me-1"></i> June 15, 2026
                    </span>
                    <span class="text-muted small me-3">
                      <i class="far fa-user me-1"></i> Dr. Robert Chen
                    </span>
                    <span class="text-muted small">
                      <i class="far fa-clock me-1"></i> 8 min read
                    </span>
                  </div>
                  <h3 class="fw-bold mb-2">
                    <a href="#" class="text-dark text-decoration-none">Top 10 Web Development Trends to Watch in 2026</a>
                  </h3>
                  <p class="text-muted mb-3">
                    Discover the latest web development trends including AI-powered development, 
                    WebAssembly, and the rise of edge computing...
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary btn-sm">Read More →</a>
                    <div class="blog-stats">
                      <span class="text-muted small me-3"><i class="far fa-eye me-1"></i> 2.3k</span>
                      <span class="text-muted small me-3"><i class="far fa-comment me-1"></i> 45</span>
                      <span class="text-muted small"><i class="far fa-heart me-1"></i> 128</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>

          <!-- Blog Post 2 -->
          <article class="blog-card bg-white rounded-4 shadow-sm overflow-hidden mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="blog-image-wrapper">
                  <img src="https://img.freepik.com/free-vector/data-science-concept-illustration_114360-4436.jpg" 
                       alt="Data Science Career" 
                       class="blog-image">
                  <span class="category-badge bg-secondary">Data Science</span>
                </div>
              </div>
              <div class="col-md-7">
                <div class="blog-card-body p-4">
                  <div class="blog-meta mb-2">
                    <span class="text-muted small me-3"><i class="far fa-calendar me-1"></i> June 10, 2026</span>
                    <span class="text-muted small me-3"><i class="far fa-user me-1"></i> Prof. James Wilson</span>
                    <span class="text-muted small"><i class="far fa-clock me-1"></i> 6 min read</span>
                  </div>
                  <h3 class="fw-bold mb-2">
                    <a href="#" class="text-dark text-decoration-none">How to Start a Career in Data Science: Complete Roadmap 2026</a>
                  </h3>
                  <p class="text-muted mb-3">
                    A step-by-step guide to becoming a data scientist, from learning Python 
                    to landing your first job in the field...
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary btn-sm">Read More →</a>
                    <div class="blog-stats">
                      <span class="text-muted small me-3"><i class="far fa-eye me-1"></i> 1.8k</span>
                      <span class="text-muted small me-3"><i class="far fa-comment me-1"></i> 32</span>
                      <span class="text-muted small"><i class="far fa-heart me-1"></i> 95</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>

          <!-- Blog Post 3 -->
          <article class="blog-card bg-white rounded-4 shadow-sm overflow-hidden mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="blog-image-wrapper">
                  <img src="https://img.freepik.com/free-vector/mobile-app-development-concept-illustration_114360-5590.jpg" 
                       alt="App Development" 
                       class="blog-image">
                  <span class="category-badge bg-accent">App Development</span>
                </div>
              </div>
              <div class="col-md-7">
                <div class="blog-card-body p-4">
                  <div class="blog-meta mb-2">
                    <span class="text-muted small me-3"><i class="far fa-calendar me-1"></i> June 5, 2026</span>
                    <span class="text-muted small me-3"><i class="far fa-user me-1"></i> Maria Garcia</span>
                    <span class="text-muted small"><i class="far fa-clock me-1"></i> 5 min read</span>
                  </div>
                  <h3 class="fw-bold mb-2">
                    <a href="#" class="text-dark text-decoration-none">Flutter vs React Native: Which Framework to Choose in 2026?</a>
                  </h3>
                  <p class="text-muted mb-3">
                    Compare the two most popular cross-platform mobile development frameworks 
                    and decide which one is right for your project...
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary btn-sm">Read More →</a>
                    <div class="blog-stats">
                      <span class="text-muted small me-3"><i class="far fa-eye me-1"></i> 1.5k</span>
                      <span class="text-muted small me-3"><i class="far fa-comment me-1"></i> 28</span>
                      <span class="text-muted small"><i class="far fa-heart me-1"></i> 76</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>

          <!-- Blog Post 4 -->
          <article class="blog-card bg-white rounded-4 shadow-sm overflow-hidden mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="blog-image-wrapper">
                  <img src="https://img.freepik.com/free-vector/artificial-intelligence-concept-illustration_114360-7000.jpg" 
                       alt="AI and ML" 
                       class="blog-image">
                  <span class="category-badge">AI & Machine Learning</span>
                </div>
              </div>
              <div class="col-md-7">
                <div class="blog-card-body p-4">
                  <div class="blog-meta mb-2">
                    <span class="text-muted small me-3"><i class="far fa-calendar me-1"></i> May 28, 2026</span>
                    <span class="text-muted small me-3"><i class="far fa-user me-1"></i> Sarah Mitchell</span>
                    <span class="text-muted small"><i class="far fa-clock me-1"></i> 10 min read</span>
                  </div>
                  <h3 class="fw-bold mb-2">
                    <a href="#" class="text-dark text-decoration-none">Understanding Machine Learning Algorithms: A Beginner's Guide</a>
                  </h3>
                  <p class="text-muted mb-3">
                    Learn the fundamentals of machine learning algorithms including supervised, 
                    unsupervised, and reinforcement learning...
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary btn-sm">Read More →</a>
                    <div class="blog-stats">
                      <span class="text-muted small me-3"><i class="far fa-eye me-1"></i> 3.1k</span>
                      <span class="text-muted small me-3"><i class="far fa-comment me-1"></i> 56</span>
                      <span class="text-muted small"><i class="far fa-heart me-1"></i> 210</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>

          <!-- Blog Post 5 -->
          <article class="blog-card bg-white rounded-4 shadow-sm overflow-hidden mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="blog-image-wrapper">
                  <img src="https://img.freepik.com/free-vector/cyber-security-concept-illustration_114360-1898.jpg" 
                       alt="Cyber Security" 
                       class="blog-image">
                  <span class="category-badge bg-danger">Cyber Security</span>
                </div>
              </div>
              <div class="col-md-7">
                <div class="blog-card-body p-4">
                  <div class="blog-meta mb-2">
                    <span class="text-muted small me-3"><i class="far fa-calendar me-1"></i> May 20, 2026</span>
                    <span class="text-muted small me-3"><i class="far fa-user me-1"></i> Alex Thompson</span>
                    <span class="text-muted small"><i class="far fa-clock me-1"></i> 7 min read</span>
                  </div>
                  <h3 class="fw-bold mb-2">
                    <a href="#" class="text-dark text-decoration-none">Essential Cyber Security Practices Every Developer Should Know</a>
                  </h3>
                  <p class="text-muted mb-3">
                    Protect your applications from common security threats with these 
                    essential practices for developers...
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary btn-sm">Read More →</a>
                    <div class="blog-stats">
                      <span class="text-muted small me-3"><i class="far fa-eye me-1"></i> 1.2k</span>
                      <span class="text-muted small me-3"><i class="far fa-comment me-1"></i> 19</span>
                      <span class="text-muted small"><i class="far fa-heart me-1"></i> 64</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>

          <!-- Pagination -->
          <nav aria-label="Blog pagination" data-aos="fade-up">
            <ul class="pagination justify-content-center mt-4">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>

        <!-- ==================== SIDEBAR (Right Side) ==================== -->
        <div class="col-lg-4">
          <!-- Search Widget -->
          <div class="sidebar-widget bg-white rounded-4 shadow-sm p-4 mb-4" data-aos="fade-left">
            <h5 class="fw-bold mb-3"><i class="fas fa-search me-2 text-primary"></i>Search Blog</h5>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search articles...">
              <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="sidebar-widget bg-white rounded-4 shadow-sm p-4 mb-4" data-aos="fade-left" data-aos-delay="100">
            <h5 class="fw-bold mb-3"><i class="fas fa-folder me-2 text-primary"></i>Categories</h5>
            <ul class="list-unstyled mb-0 category-list">
              <li><a href="#">Web Development <span class="badge bg-primary float-end">12</span></a></li>
              <li><a href="#">Data Science <span class="badge bg-secondary float-end">8</span></a></li>
              <li><a href="#">App Development <span class="badge bg-accent float-end">6</span></a></li>
              <li><a href="#">AI & Machine Learning <span class="badge bg-primary float-end">10</span></a></li>
              <li><a href="#">Cyber Security <span class="badge bg-danger float-end">5</span></a></li>
              <li><a href="#">UI/UX Design <span class="badge bg-secondary float-end">7</span></a></li>
              <li><a href="#">Digital Marketing <span class="badge bg-accent float-end">4</span></a></li>
              <li><a href="#">Career Advice <span class="badge bg-primary float-end">9</span></a></li>
            </ul>
          </div>

          <!-- Recent Posts Widget -->
          <div class="sidebar-widget bg-white rounded-4 shadow-sm p-4 mb-4" data-aos="fade-left" data-aos-delay="200">
            <h5 class="fw-bold mb-3"><i class="fas fa-clock me-2 text-primary"></i>Recent Posts</h5>
            <div class="recent-post">
              <div class="d-flex mb-3">
                <img src="https://img.freepik.com/free-vector/web-development-concept-illustration_114360-2581.jpg" 
                     alt="Post" class="rounded-3 me-3" width="80" height="60" style="object-fit: cover;">
                <div>
                  <h6 class="fw-bold mb-1 small"><a href="#" class="text-dark text-decoration-none">Web Dev Trends 2026</a></h6>
                  <small class="text-muted"><i class="far fa-calendar me-1"></i>June 15, 2026</small>
                </div>
              </div>
              <div class="d-flex mb-3">
                <img src="https://img.freepik.com/free-vector/data-science-concept-illustration_114360-4436.jpg" 
                     alt="Post" class="rounded-3 me-3" width="80" height="60" style="object-fit: cover;">
                <div>
                  <h6 class="fw-bold mb-1 small"><a href="#" class="text-dark text-decoration-none">Data Science Roadmap</a></h6>
                  <small class="text-muted"><i class="far fa-calendar me-1"></i>June 10, 2026</small>
                </div>
              </div>
              <div class="d-flex mb-3">
                <img src="https://img.freepik.com/free-vector/mobile-app-development-concept-illustration_114360-5590.jpg" 
                     alt="Post" class="rounded-3 me-3" width="80" height="60" style="object-fit: cover;">
                <div>
                  <h6 class="fw-bold mb-1 small"><a href="#" class="text-dark text-decoration-none">Flutter vs React Native</a></h6>
                  <small class="text-muted"><i class="far fa-calendar me-1"></i>June 5, 2026</small>
                </div>
              </div>
              <div class="d-flex">
                <img src="https://img.freepik.com/free-vector/artificial-intelligence-concept-illustration_114360-7000.jpg" 
                     alt="Post" class="rounded-3 me-3" width="80" height="60" style="object-fit: cover;">
                <div>
                  <h6 class="fw-bold mb-1 small"><a href="#" class="text-dark text-decoration-none">ML Algorithms Guide</a></h6>
                  <small class="text-muted"><i class="far fa-calendar me-1"></i>May 28, 2026</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Tags Widget -->
          <div class="sidebar-widget bg-white rounded-4 shadow-sm p-4 mb-4" data-aos="fade-left" data-aos-delay="300">
            <h5 class="fw-bold mb-3"><i class="fas fa-tags me-2 text-primary"></i>Popular Tags</h5>
            <div class="tag-cloud">
              <a href="#" class="tag">JavaScript</a>
              <a href="#" class="tag">Python</a>
              <a href="#" class="tag">React</a>
              <a href="#" class="tag">Machine Learning</a>
              <a href="#" class="tag">CSS</a>
              <a href="#" class="tag">Node.js</a>
              <a href="#" class="tag">Flutter</a>
              <a href="#" class="tag">SQL</a>
              <a href="#" class="tag">AI</a>
              <a href="#" class="tag">Docker</a>
            </div>
          </div>

          <!-- Newsletter Widget -->
          <div class="sidebar-widget bg-primary text-white rounded-4 shadow-sm p-4" data-aos="fade-left" data-aos-delay="400">
            <h5 class="fw-bold mb-2"><i class="fas fa-envelope me-2"></i>Newsletter</h5>
            <p class="small mb-3 text-white-50">Get the latest blog posts delivered to your inbox.</p>
            <input type="email" class="form-control mb-2" placeholder="Your email address">
            <button class="btn btn-light w-100 fw-medium">Subscribe Now</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== CTA SECTION ==================== -->
  <section class="blog-cta py-5 bg-light text-center">
    <div class="container" data-aos="zoom-in">
      <h2 class="fw-bold mb-3">Want to Write for Dhurandhar?</h2>
      <p class="text-muted mb-4">Share your knowledge with our community of 25,000+ learners</p>
      <a href="contact.php" class="btn btn-primary btn-lg px-5">Become a Contributor</a>
    </div>
  </section>
<?php
include('footer.php');
?>