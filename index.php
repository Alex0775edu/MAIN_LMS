
<?php
include('header.php');
?>
    <!-- ==================== HERO SECTION ==================== -->
    <header id="home" class="hero-section bg-white">
        <div class="hero-bg"></div>
        <div class="container hero-container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-xl-6" data-aos="fade-right">
                    <div class="hero-content">
                        <span class="hero-badge">#1 Learning Platform</span>
                        <h1 class="hero-title">
                            Learn <span class="typing-text" data-typing-text="Skills, Coding, Design, AI"></span>
                        </h1>
                        <p class="hero-description">
                            Build real-world expertise with premium courses, live mentorship, and career-ready projects
                            designed for modern learners.
                        </p>

                        <form class="hero-search" role="search" id="heroSearchForm" method="get" action="courses.php">
                            <div class="search-input-wrap">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" placeholder="What do you want to learn?"
                                    aria-label="Search courses" name="search_courses">
                            </div>
                            <select class="form-select" aria-label="Select category" name="select_category" bg-black>
                                <option selected class="text-black">All Categories</option>
                                <option class="text-black">Web Development</option>
                                <option class="text-black">Programming</option>
                                <option class="text-black">AI</option>
                                <option class="text-black">Data Science</option>
                            </select>
                            <button type="button" class="btn btn-search">Search</button>
                        </form>

                        <div class="hero-actions">
                            <a href="courses.php" class="btn btn-hero-primary">Explore Courses</a>
                            <a href="https://www.youtube.com/@techsima" target="_blank"
                                class="btn btn-hero-secondary">Watch Demo</a>
                        </div>

                        <div class="hero-rating-row">
                            <div class="rating-pill">
                                <i class="fas fa-star"></i>
                                <span>4.9/5 Rated by 50k learners</span>
                            </div>
                            <div class="rating-pill muted-pill">
                                <i class="fas fa-play-circle"></i>
                                <span>Live classes every week</span>
                            </div>
                        </div>

                        <div class="stats-grid ">
                            <div class="stat-card bg-white" data-counter="50000" data-suffix="+">
                                <strong class="counter-value">0</strong>
                                <span>Students</span>
                            </div>
                            <div class="stat-card bg-white" data-counter="1200" data-suffix="+">
                                <strong class="counter-value">0</strong>
                                <span>Courses</span>
                            </div>
                            <div class="stat-card bg-white" data-counter="250" data-suffix="+">
                                <strong class="counter-value">0</strong>
                                <span>Instructors</span>
                            </div>
                            <div class="stat-card bg-white" data-counter="98" data-suffix="%">
                                <strong class="counter-value">0</strong>
                                <span>Completion</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-6" data-aos="fade-left">
                    <div class="hero-visual" aria-label="Learning illustration preview">
                        <div class="hero-glow"></div>
                        <div class="hero-card hero-card-main">
                            <img src="assets/images/courses/project img/main.png" alt="Student learning illustration"
                                class="hero-main-image">
                        </div>
                        <div class="floating-badge badge-course">
                            <i class="fas fa-laptop-code"></i>
                            <span>Web Development</span>
                        </div>
                        <div class="floating-badge badge-ai">
                            <i class="fas fa-robot"></i>
                            <span>AI & ML</span>
                        </div>
                        <div class="floating-badge badge-python">
                            <i class="fas fa-code"></i>
                            <span>Python</span>
                        </div>
                        <div class="floating-badge badge-live">
                            <i class="fas fa-video"></i>
                            <span>Live Session</span>
                        </div>
                        <div class="floating-badge badge-certificate">
                            <i class="fas fa-certificate"></i>
                            <span>Certificate</span>
                        </div>
                        <div class="hero-mentor-card">
                            <img src="assets/images/student.svg" alt="Mentor profile illustration">
                            <div>
                                <strong>Mentor Support</strong>
                                <small>24/7 guidance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-trust-bar">
            <div class="container">
                <p>Trusted by 500+ Educational Institutions</p>
                <div class="trust-logos" aria-label="Trusted institutions logos">
                    <span>Coursera</span>
                    <span>Udemy</span>
                    <span>LinkedIn</span>
                    <span>Google</span>
                    <span>Microsoft</span>
                </div>
            </div>
        </div>
    </header>
    <!-- ==================== COURSE CATEGORIES SECTION ==================== -->
    <section id="categories" class="course-categories-section">
        <div class="container">
            <div class="section-heading" data-aos="fade-up">
                <span class="section-badge">Explore by Category</span>
                <div class="section-heading-row">
                    <div>
                        <h2>Choose the right learning path</h2>
                        <p>Browse professional, skill-focused categories curated for modern learners and career growth.
                        </p>
                    </div>
                    <a href="categories.php" class="btn btn-view-all">View All Categories</a>
                </div>
            </div>
            <section class="section-block">
                <div class="container">
                    <div class="grid-cards">
                        <article class="course-card course-card1 bg-white" data-category="programming free" data-aos="fade-up-right"
                            data-aos-delay="100">
                            <div class="course-body">
                                <h3>C Programming Fundamentals</h3>
                                <p>Learn core coding logic and memory concepts with beginner-friendly C exercises.</p>

                            </div>
                        </article>
                        <article class="course-card course-card1 bg-white" data-category="programming free" data-aos="flip-left"
                            data-aos-delay="200">
                            <div class="course-body">
                                <h3>Web Development</h3>
                                <p>Learn the fundamentals of web development including HTML, CSS, and JavaScript.</p>


                            </div>
                        </article>
                        <article class="course-card course-card1 bg-white" data-category="programming free" data-aos="fade-down-left"
                            data-aos-delay="300">
                            <div class="course-body">
                                <h3>App Development</h3>
                                <p>Learn to build cross-platform mobile applications using modern frameworks and tools.
                                </p>


                            </div>
                        </article>
                    </div>
            </section>
        </div>

        <!-- ==================== FEATURED COURSES ==================== -->
        <section id="courses" class="featured-courses-section">
            <div class="container">
                <div class="section-heading" data-aos="fade-up">
                    <span class="section-badge">Featured Learning</span>
                    <div class="section-heading-row">
                        <div>
                            <h2>Featured Courses</h2>
                            <p>Choose from high-impact courses curated for modern careers and practical skill growth.
                            </p>
                        </div>
                        <a href="courses.php" class="btn btn-view-all">View All Courses</a>
                    </div>
                </div>

                <div class="filter-tabs course-filter-tabs" data-aos="fade-up" aria-label="Course filter tabs">
                    <button class="filter-tab active" type="button" data-filter="all">All</button>
                    <button class="filter-tab" type="button" data-filter="trending">Trending</button>
                    <button class="filter-tab" type="button" data-filter="bestseller">Bestseller</button>
                    <button class="filter-tab" type="button" data-filter="new">New</button>
                    <button class="filter-tab" type="button" data-filter="programming">Programming</button>
                    <button class="filter-tab" type="button" data-filter="development">Development</button>
                    <button class="filter-tab" type="button" data-filter="ai">AI</button>
                    <button class="filter-tab" type="button" data-filter="design">Design</button>
                    <button class="filter-tab" type="button" data-filter="business">Business</button>
                    <button class="filter-tab" type="button" data-filter="free">Free</button>
                    <button class="filter-tab" type="button" data-filter="premium">Premium</button>
                        
                </div>

                <div class="course-grid">

                    <article class="course-card bg-white" data-category="programming free" data-aos="fade-up"
                        data-aos-delay="350">
                        <div class="course-media">
                            <img src="assets/images/courses/project img/C2.jpg"
                                alt="C programming fundamentals course preview">
                            <div class="course-badges">
                                <span class="badge badge-primary">Programming</span>
                                <span class="badge badge-dark">Free</span>
                            </div>
                            <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                    class="far fa-heart"></i></button>
                            <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                    class="fas fa-share-alt"></i></button>
                        </div>
                        <div class="course-body">
                            <h3>C Programming Fundamentals</h3>
                            <p>Learn core coding logic and memory concepts with beginner-friendly C exercises.</p>
                            <div class="course-instructor">
                                <img src="assets/images/instructors/instructor-01.svg" alt="Instructor avatar">
                                <div>
                                    <strong>Vikram Sethi</strong>
                                    <small>Systems Mentor</small>
                                </div>
                            </div>
                            <div class="course-stats">
                                <span><i class="fas fa-star"></i> 4.6 (610)</span>
                                <span><i class="fas fa-users"></i> 6.5k</span>
                            </div>
                            <div class="course-meta">
                                <span><i class="far fa-clock"></i> 7h</span>
                                <span><i class="fas fa-book-open"></i> 30 lessons</span>
                                <span><i class="fas fa-globe"></i> English</span>
                            </div>
                            <div class="course-footer">
                                <div>
                                    <span class="price">Free</span>
                                    <span class="old-price"></span>
                                </div>
                                <div class="course-actions">
                                    <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                        data-bs-target="#courseModal">Preview</button>
                                    <a class="btn btn-enroll" href="index.php">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </article>


                    <article class="course-card bg-white" data-category="development premium trending" data-aos="fade-up"
                        data-aos-delay="50">
                        <div class="course-media">
                            <img src="assets/images/courses/project img/javascript.jpg"
                                alt="JavaScript from beginner to advanced course preview">
                            <div class="course-badges">
                                <span class="badge badge-primary">Programming</span>
                                <span class="badge badge-dark">Intermediate</span>
                            </div>
                            <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                    class="far fa-heart"></i></button>
                            <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                    class="fas fa-share-alt"></i></button>
                        </div>
                        <div class="course-body">
                            <h3>JavaScript From Beginner to Advanced</h3>
                            <p>Master modern JavaScript with DOM, async programming, APIs, and practical projects.</p>
                            <div class="course-instructor">
                                <img src="assets/images/instructors/instructor-02.svg" alt="Instructor avatar">
                                <div>
                                    <strong>Neha Kapoor</strong>
                                    <small>Frontend Developer</small>
                                </div>
                            </div>
                            <div class="course-stats">
                                <span><i class="fas fa-star"></i> 4.8 (1.8k)</span>
                                <span><i class="fas fa-users"></i> 15.2k</span>
                            </div>
                            <div class="course-meta">
                                <span><i class="far fa-clock"></i> 15h</span>
                                <span><i class="fas fa-book-open"></i> 62 lessons</span>
                                <span><i class="fas fa-globe"></i> English</span>
                            </div>
                            <div class="course-footer">
                                <div>
                                    <span class="price">₹3,999</span>
                                    <span class="old-price">₹6,499</span>
                                </div>
                                <div class="course-actions">
                                    <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                        data-bs-target="#courseModal">Preview</button>
                                    <a class="btn btn-enroll" href="index.php">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="course-card bg-white" data-category="development premium new" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="course-media">
                            <img src="assets/images/courses/project img/bootstrap1.jpg"
                                alt="Bootstrap 5 Masterclass course preview">
                            <div class="course-badges">
                                <span class="badge badge-primary">Frontend</span>
                                <span class="badge badge-dark">New</span>
                            </div>
                            <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                    class="far fa-heart"></i></button>
                            <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                    class="fas fa-share-alt"></i></button>
                        </div>
                        <div class="course-body">
                            <h3>Bootstrap 5 Masterclass</h3>
                            <p>Create polished interfaces quickly using Bootstrap components, utilities, and themes.</p>
                            <div class="course-instructor">
                                <img src="assets/images/instructors/instructor-01.svg" alt="Instructor avatar">
                                <div>
                                    <strong>Aditya Rajak</strong>
                                    <small>Design Systems Mentor</small>
                                </div>
                            </div>
                            <div class="course-stats">
                                <span><i class="fas fa-star"></i> 4.7 (1.2k)</span>
                                <span><i class="fas fa-users"></i> 11.8k</span>
                            </div>
                            <div class="course-meta">
                                <span><i class="far fa-clock"></i> 8h</span>
                                <span><i class="fas fa-book-open"></i> 36 lessons</span>
                                <span><i class="fas fa-globe"></i> Hindi</span>
                            </div>
                            <div class="course-footer">
                                <div>
                                    <span class="price">₹2,499</span>
                                    <span class="old-price">₹4,999</span>
                                </div>
                                <div class="course-actions">
                                    <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                        data-bs-target="#courseModal">Preview</button>
                                    <a class="btn btn-enroll" href="index.php">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="course-card bg-white" data-category="development premium trending" data-aos="fade-up"
                        data-aos-delay="150">
                        <div class="course-media">
                            <img src="assets/images/courses/project img/python.jpg"
                                alt="Python programming masterclass course preview">
                            <div class="course-badges">
                                <span class="badge badge-primary">Programming</span>
                                <span class="badge badge-dark">Beginner</span>
                            </div>
                            <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                    class="far fa-heart"></i></button>
                            <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                    class="fas fa-share-alt"></i></button>
                        </div>
                        <div class="course-body">
                            <h3>Python Programming Masterclass</h3>
                            <p>Learn Python from fundamentals to practical automation and backend projects.</p>
                            <div class="course-instructor">
                                <img src="assets/images/instructors/instructor-02.svg" alt="Instructor avatar">
                                <div>
                                    <strong>Priya Mehta</strong>
                                    <small>Python Specialist</small>
                                </div>
                            </div>
                            <div class="course-stats">
                                <span><i class="fas fa-star"></i> 4.9 (3.0k)</span>
                                <span><i class="fas fa-users"></i> 22.4k</span>
                            </div>
                            <div class="course-meta">
                                <span><i class="far fa-clock"></i> 18h</span>
                                <span><i class="fas fa-book-open"></i> 72 lessons</span>
                                <span><i class="fas fa-globe"></i> English</span>
                            </div>
                            <div class="course-footer">
                                <div>
                                    <span class="price">₹5,499</span>
                                    <span class="old-price">₹8,999</span>
                                </div>
                                <div class="course-actions">
                                    <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                        data-bs-target="#courseModal">Preview</button>
                                    <a class="btn btn-enroll" href="index.php">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>


            </div>
        </section>

        <!-- ==================== WHY CHOOSE US / TRUST / ACHIEVEMENTS ==================== -->
        <section class="trust-build-section" id="trust-build" aria-labelledby="trustBuildHeading">
            <div class="container">
                <div class="section-heading trust-heading" data-aos="fade-up">
                    <span class="section-badge">Trusted by Modern Learners</span>
                    <div class="section-heading-row">
                        <div>
                            <h2 id="trustBuildHeading">Why Choose Us</h2>
                            <p>Premium learning experiences designed to build confidence, deliver practical skills, and
                                support career growth at every stage.</p>
                        </div>
                    </div>
                </div>

                <div class="why-choose-grid">
                    <article class="why-card" data-aos="fade-up">
                        <div class="why-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        <h3>Expert Mentors</h3>
                        <p>Learn from practitioners with real-world experience in high-growth industries.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="50">
                        <div class="why-icon"><i class="fas fa-layer-group"></i></div>
                        <h3>Industry-Ready Curriculum</h3>
                        <p>Every module is structured around practical skills that employers and teams value.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-icon"><i class="fas fa-video"></i></div>
                        <h3>Live Interactive Classes</h3>
                        <p>Join focused live sessions, ask questions, and strengthen concepts in real time.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="why-icon"><i class="fas fa-project-diagram"></i></div>
                        <h3>Hands-on Projects</h3>
                        <p>Build portfolio-ready work that turns learning into confidence and results.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="why-icon"><i class="fas fa-infinity"></i></div>
                        <h3>Lifetime Course Access</h3>
                        <p>Keep learning at your own pace with content that remains available whenever you need it.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="why-icon"><i class="fas fa-certificate"></i></div>
                        <h3>Certificates of Completion</h3>
                        <p>Earn professional recognition that supports your growth and portfolio.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="why-icon"><i class="fas fa-user-tie"></i></div>
                        <h3>Career Guidance &amp; Mentorship</h3>
                        <p>Get support that helps you turn your skills into meaningful opportunities.</p>

                    </article>
                    <article class="why-card" data-aos="fade-up" data-aos-delay="350">
                        <div class="why-icon"><i class="fas fa-headset"></i></div>
                        <h3>24×7 Student Support</h3>
                        <p>Receive dependable guidance and prompt answers whenever you need help.</p>

                    </article>
                </div>
            </div>
        </section>

        <section class="platform-stats-section" id="platform-stats" aria-labelledby="platformStatsHeading">
            <div class="container">
                <div class="section-heading trust-heading" data-aos="fade-up">
                    <span class="section-badge">Platform Statistics</span>
                    <div class="section-heading-row">
                        <div>
                            <h2 id="platformStatsHeading">Our growing learning community</h2>
                            <p>Real momentum, measurable outcomes, and a platform designed for steady progress.</p>
                        </div>
                    </div>
                </div>

                <div class="platform-stats-grid">
                    <article class="stat-card" data-aos="fade-up">
                        <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                        <h3 class="stat-value" data-counter="50000" data-suffix="+">0</h3>
                        <p>Students</p>
                        <span>Active learners across beginner and advanced tracks</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="50">
                        <div class="stat-icon"><i class="fas fa-book-open"></i></div>
                        <h3 class="stat-value" data-counter="1500" data-suffix="+">0</h3>
                        <p>Courses</p>
                        <span>Fresh, structured content for modern skill building</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-icon"><i class="fas fa-users-cog"></i></div>
                        <h3 class="stat-value" data-counter="350" data-suffix="+">0</h3>
                        <p>Expert Instructors</p>
                        <span>Mentors guiding every learner step by step</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                        <h3 class="stat-value" data-counter="98" data-suffix="%">0</h3>
                        <p>Course Completion Rate</p>
                        <span>Motivating structure and practical outcomes</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-icon"><i class="fas fa-route"></i></div>
                        <h3 class="stat-value" data-counter="120" data-suffix="+">0</h3>
                        <p>Learning Paths</p>
                        <span>Career-driven roadmaps for every skill level</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="stat-icon"><i class="fas fa-globe"></i></div>
                        <h3 class="stat-value" data-counter="25" data-suffix="+">0</h3>
                        <p>Countries Reached</p>
                        <span>A truly global learning community</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-icon"><i class="fas fa-star"></i></div>
                        <h3 class="stat-value" data-counter="4.9" data-suffix="">0</h3>
                        <p>Average Rating</p>
                        <span>Trusted by students for quality and support</span>
                    </article>
                    <article class="stat-card" data-aos="fade-up" data-aos-delay="350">
                        <div class="stat-icon"><i class="fas fa-award"></i></div>
                        <h3 class="stat-value" data-counter="12000" data-suffix="+">0</h3>
                        <p>Certificates Issued</p>
                        <span>Verified achievements earned by learners</span>
                    </article>
                </div>
            </div>
        </section>

        <section class="student-success-section" id="student-success" aria-labelledby="studentSuccessHeading">
            <div class="container">
                <div class="section-heading trust-heading" data-aos="fade-up">
                    <span class="section-badge">Student Success Metrics</span>
                    <div class="section-heading-row">
                        <div>
                            <h2 id="studentSuccessHeading">A learning experience that delivers measurable outcomes</h2>
                            <p>From course completion to career readiness, every metric reflects learner momentum.</p>
                        </div>
                    </div>
                </div>

                <div class="success-dashboard">
                    <div class="success-panel" data-aos="fade-up">
                        <div class="success-panel-header">
                            <h3>Performance Snapshot</h3>
                            <span>Live progress</span>
                        </div>
                        <div class="metric-item">
                            <div class="metric-row">
                                <span>Course Completion Rate</span>
                                <strong>92%</strong>
                            </div>
                            <div class="progress-track" aria-label="Course completion progress">
                                <div class="progress-fill" data-progress="92"></div>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-row">
                                <span>Student Satisfaction</span>
                                <strong>96%</strong>
                            </div>
                            <div class="progress-track" aria-label="Student satisfaction progress">
                                <div class="progress-fill" data-progress="96"></div>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-row">
                                <span>Job Placement Support</span>
                                <strong>88%</strong>
                            </div>
                            <div class="progress-track" aria-label="Job placement support progress">
                                <div class="progress-fill" data-progress="88"></div>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-row">
                                <span>Average Learning Hours</span>
                                <strong>14 hrs/week</strong>
                            </div>
                            <div class="progress-track" aria-label="Average learning hours progress">
                                <div class="progress-fill" data-progress="84"></div>
                            </div>
                        </div>
                    </div>

                    <div class="success-panel" data-aos="fade-up" data-aos-delay="100">
                        <div class="success-panel-header">
                            <h3>Learning Health</h3>
                            <span>Weekly momentum</span>
                        </div>
                        <div class="circle-metrics">
                            <div class="circle-card">
                                <div class="circular-progress" data-progress="94">
                                    <span class="circular-value" data-progress="94">0%</span>
                                </div>
                                <p>Active Learners Today</p>
                            </div>
                            <div class="circle-card">
                                <div class="circular-progress" data-progress="87">
                                    <span class="circular-value" data-progress="87">0%</span>
                                </div>
                                <p>Community Engagement</p>
                            </div>
                            <div class="circle-card">
                                <div class="circular-progress" data-progress="91">
                                    <span class="circular-value" data-progress="91">0%</span>
                                </div>
                                <p>Practice Completion</p>
                            </div>
                        </div>
                        <div class="mini-chart" aria-label="Mini chart illustration">
                            <span style="height: 40%"></span>
                            <span style="height: 72%"></span>
                            <span style="height: 58%"></span>
                            <span style="height: 85%"></span>
                            <span style="height: 92%"></span>
                            <span style="height: 78%"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="achievements-section" id="achievements" aria-labelledby="achievementsHeading">
            <div class="container">
                <div class="section-heading trust-heading" data-aos="fade-up">
                    <span class="section-badge">Achievements</span>
                    <div class="section-heading-row">
                        <div>
                            <h2 id="achievementsHeading">Recognition that reflects our quality</h2>
                            <p>Consistent excellence, student-first learning, and innovation that keeps growing.</p>
                        </div>
                    </div>
                </div>

                <div class="achievement-grid">
                    <article class="achievement-card" data-aos="fade-up">
                        <div class="achievement-icon"><i class="fas fa-medal"></i></div>
                        <h3>Best Online Learning Platform</h3>
                        <span class="achievement-year">2024</span>
                        <p>Recognized for outstanding learner experience and course quality.</p>
                    </article>
                    <article class="achievement-card" data-aos="fade-up" data-aos-delay="50">
                        <div class="achievement-icon"><i class="fas fa-graduation-cap"></i></div>
                        <h3>Excellence in Digital Education</h3>
                        <span class="achievement-year">2023</span>
                        <p>Celebrated for empowering modern learners with scalable education tools.</p>
                    </article>
                    <article class="achievement-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="achievement-icon"><i class="fas fa-lightbulb"></i></div>
                        <h3>Innovation in E-Learning</h3>
                        <span class="achievement-year">2022</span>
                        <p>Honored for blending technology, accessibility, and practical content.</p>
                    </article>
                    <article class="achievement-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="achievement-icon"><i class="fas fa-heart"></i></div>
                        <h3>Student Choice Award</h3>
                        <span class="achievement-year">2021</span>
                        <p>Selected by students for support, flexibility, and excellent instruction.</p>
                    </article>
                    <article class="achievement-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="achievement-icon"><i class="fas fa-shield-alt"></i></div>
                        <h3>Quality Training Excellence</h3>
                        <span class="achievement-year">2020</span>
                        <p>Praised for consistent quality standards and learner-centered delivery.</p>
                    </article>
                    <article class="achievement-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="achievement-icon"><i class="fas fa-globe-asia"></i></div>
                        <h3>Global Learning Community</h3>
                        <span class="achievement-year">2019</span>
                        <p>Built a welcoming platform for learners across continents and career stages.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="partners-section" id="partners" aria-labelledby="partnersHeading">
            <div class="container">
                <div class="section-heading trust-heading" data-aos="fade-up">
                    <span class="section-badge">Trusted Partners</span>
                    <div class="section-heading-row">
                        <div>
                            <h2 id="partnersHeading">Working with partners who value growth</h2>
                            <p>Our ecosystem is strengthened by collaborators across technology, training, and
                                education.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="partner-grid">
                    <article class="partner-card" data-aos="fade-up">
                        <div class="partner-logo"><span>Tech</span> Hub</div>
                        <p>Technology Partner</p>
                    </article>
                    <article class="partner-card" data-aos="fade-up" data-aos-delay="50">
                        <div class="partner-logo"><span>Edu</span> Lab</div>
                        <p>Academic Partner</p>
                    </article>
                    <article class="partner-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="partner-logo"><span>Skill</span> Forge</div>
                        <p>Training Partner</p>
                    </article>
                    <article class="partner-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="partner-logo"><span>Cert</span> Bridge</div>
                        <p>Certification Partner</p>
                    </article>
                    <article class="partner-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="partner-logo"><span>Hire</span> Link</div>
                        <p>Hiring Partner</p>
                    </article>
                    <article class="partner-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="partner-logo"><span>Comm</span> Circle</div>
                        <p>Community Partner</p>
                    </article>
                </div>
            </div>
        </section>
        <!-- ==================== CTA SECTION ==================== -->
        <section class="py-5 text-center my-5 bg-light" data-aos="fade-up">
            <h2 class="fw-bold">Start Learning Today</h2>
            <div class="mt-3"><a href="join.php" class="btn btn-primary btn-lg me-2">Join Free</a>
                <a href="#courses" class="btn btn-outline-primary btn-lg">Browse Courses</a>
            </div>
        </section>


        <?php
include('footer.php');
?>