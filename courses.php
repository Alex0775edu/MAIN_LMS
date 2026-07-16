<?php
include('header.php');
?>
    <section id="courses" class="featured-courses-section">
        <div class="container">
            <div class="section-heading" data-aos="fade-up">
                <span class="section-badge">Featured Learning</span>
                <div class="section-heading-row">
                    <div>
                        <h2>Featured Courses</h2>
                        <p>Choose from high-impact courses curated for modern careers and practical skill growth.</p>
                    </div>
                    
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
                <article class="course-card" data-category="development premium trending bestseller" data-aos="fade-up">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/html & css.jpg"
                            alt="Complete HTML5 and CSS3 Bootcamp course preview">
                        <div class="course-badges">
                            <span class="badge badge-primary">Web Development</span>
                            <span class="badge badge-dark">Beginner</span>
                        </div>
                        <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                class="far fa-heart"></i></button>
                        <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                class="fas fa-share-alt"></i></button>
                    </div>
                    <div class="course-body">
                        <h3>Complete HTML5 &amp; CSS3 Bootcamp</h3>
                        <p>Build modern responsive websites with layout, animation, and best practices.</p>
                        <div class="course-instructor">
                            <img src="assets/images/instructors/boy.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Aarav Sharma</strong>
                                <small>UI Engineer</small>
                            </div>
                        </div>
                        <div class="course-stats">
                            <span><i class="fas fa-star"></i> 4.9 (2.3k)</span>
                            <span><i class="fas fa-users"></i> 18.5k</span>
                        </div>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 12h</span>
                            <span><i class="fas fa-book-open"></i> 48 lessons</span>
                            <span><i class="fas fa-globe"></i> English</span>
                        </div>
                        <div class="course-footer">
                            <div>
                                <span class="price">₹4,999</span>
                                <span class="old-price">₹7,999</span>
                            </div>
                            <div class="course-actions">
                                <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                    data-bs-target="#courseModal">Preview</button>
                                <a class="btn btn-enroll" href="index.php">Enroll</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="course-card" data-category="development premium trending" data-aos="fade-up"
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
                            <img src="assets/images/instructors/woman.jpg" alt="Instructor avatar">
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

                <article class="course-card" data-category="development premium new" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/bootstrap1.jpg" alt="Bootstrap 5 Masterclass course preview">
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
                            <img src="assets/images/instructors/boy1.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Rahul Verma</strong>
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

                <article class="course-card" data-category="development premium trending" data-aos="fade-up"
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
                            <img src="assets/images/instructors/woman1.jpg" alt="Instructor avatar">
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

                <article class="course-card" data-category="development premium" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/node.jpg"
                            alt="Node.js and Express essentials course preview">
                        <div class="course-badges">
                            <span class="badge badge-primary">Backend</span>
                            <span class="badge badge-dark">Intermediate</span>
                        </div>
                        <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                class="far fa-heart"></i></button>
                        <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                class="fas fa-share-alt"></i></button>
                    </div>
                    <div class="course-body">
                        <h3>Node.js &amp; Express Essentials</h3>
                        <p>Build scalable backend services with modern APIs and structured application design.</p>
                        <div class="course-instructor">
                            <img src="assets/images/instructors/woman2.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Riya Sinha</strong>
                                <small>Backend Engineer</small>
                            </div>
                        </div>
                        <div class="course-stats">
                            <span><i class="fas fa-star"></i> 4.8 (980)</span>
                            <span><i class="fas fa-users"></i> 9.1k</span>
                        </div>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 10h</span>
                            <span><i class="fas fa-book-open"></i> 42 lessons</span>
                            <span><i class="fas fa-globe"></i> English</span>
                        </div>
                        <div class="course-footer">
                            <div>
                                <span class="price">₹4,299</span>
                                <span class="old-price">₹6,999</span>
                            </div>
                            <div class="course-actions">
                                <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                    data-bs-target="#courseModal">Preview</button>
                                <a class="btn btn-enroll" href="index.php">Enroll</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="course-card" data-category="programming premium" data-aos="fade-up"
                    data-aos-delay="250">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/django.jpg" alt="Django web development course preview">
                        <div class="course-badges">
                            <span class="badge badge-primary">Backend</span>
                            <span class="badge badge-dark">Intermediate</span>
                        </div>
                        <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                class="far fa-heart"></i></button>
                        <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                class="fas fa-share-alt"></i></button>
                    </div>
                    <div class="course-body">
                        <h3>Django Web Development</h3>
                        <p>Learn rapid web development using Django, templates, authentication, and deployment.</p>
                        <div class="course-instructor">
                            <img src="assets/images/instructors/boy.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Aditya Rao</strong>
                                <small>Python Web Mentor</small>
                            </div>
                        </div>
                        <div class="course-stats">
                            <span><i class="fas fa-star"></i> 4.8 (840)</span>
                            <span><i class="fas fa-users"></i> 8.3k</span>
                        </div>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 11h</span>
                            <span><i class="fas fa-book-open"></i> 44 lessons</span>
                            <span><i class="fas fa-globe"></i> English</span>
                        </div>
                        <div class="course-footer">
                            <div>
                                <span class="price">₹3,799</span>
                                <span class="old-price">₹5,999</span>
                            </div>
                            <div class="course-actions">
                                <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                    data-bs-target="#courseModal">Preview</button>
                                <a class="btn btn-enroll" href="index.php">Enroll</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="course-card" data-category="programming premium" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/DSA1.jpg" alt="Java programming with DSA course preview">
                        <div class="course-badges">
                            <span class="badge badge-primary">Programming</span>
                            <span class="badge badge-dark">Advanced</span>
                        </div>
                        <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                class="far fa-heart"></i></button>
                        <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                class="fas fa-share-alt"></i></button>
                    </div>
                    <div class="course-body">
                        <h3>Java Programming with DSA</h3>
                        <p>Speed up your coding interviews and backend development skills with Java and DSA.</p>
                        <div class="course-instructor">
                            <img src="assets/images/instructors/woman.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Ananya Joshi</strong>
                                <small>DSA Coach</small>
                            </div>
                        </div>
                        <div class="course-stats">
                            <span><i class="fas fa-star"></i> 4.7 (730)</span>
                            <span><i class="fas fa-users"></i> 7.4k</span>
                        </div>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 14h</span>
                            <span><i class="fas fa-book-open"></i> 58 lessons</span>
                            <span><i class="fas fa-globe"></i> English</span>
                        </div>
                        <div class="course-footer">
                            <div>
                                <span class="price">₹3,599</span>
                                <span class="old-price">₹6,199</span>
                            </div>
                            <div class="course-actions">
                                <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                    data-bs-target="#courseModal">Preview</button>
                                <a class="btn btn-enroll" href="index.php">Enroll</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="course-card" data-category="programming free" data-aos="fade-up" data-aos-delay="350">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/C2.jpg" alt="C programming fundamentals course preview">
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
                            <img src="assets/images/instructors/boy1.jpg" alt="Instructor avatar">
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

                <article class="course-card" data-category="ai premium trending" data-aos="fade-up"
                    data-aos-delay="400">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/ai icon (3).jpeg"
                            alt="Artificial intelligence fundamentals course preview">
                        <div class="course-badges">
                            <span class="badge badge-primary">AI</span>
                            <span class="badge badge-dark">Beginner</span>
                        </div>
                        <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                class="far fa-heart"></i></button>
                        <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                class="fas fa-share-alt"></i></button>
                    </div>
                    <div class="course-body">
                        <h3>Artificial Intelligence Fundamentals</h3>
                        <p>Understand AI concepts, real-world applications, and responsible model usage.</p>
                        <div class="course-instructor">
                            <img src="assets/images/instructors/woman1.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Sonal Bhatia</strong>
                                <small>AI Researcher</small>
                            </div>
                        </div>
                        <div class="course-stats">
                            <span><i class="fas fa-star"></i> 4.8 (1.4k)</span>
                            <span><i class="fas fa-users"></i> 12.7k</span>
                        </div>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 13h</span>
                            <span><i class="fas fa-book-open"></i> 56 lessons</span>
                            <span><i class="fas fa-globe"></i> English</span>
                        </div>
                        <div class="course-footer">
                            <div>
                                <span class="price">₹4,799</span>
                                <span class="old-price">₹7,499</span>
                            </div>
                            <div class="course-actions">
                                <button class="btn btn-preview" type="button" data-bs-toggle="modal"
                                    data-bs-target="#courseModal">Preview</button>
                                <a class="btn btn-enroll" href="index.php">Enroll</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="course-card" data-category="security premium new" data-aos="fade-up"
                    data-aos-delay="450">
                    <div class="course-media">
                        <img src="assets/images/courses/project img/cyber icon.jpeg" alt="Cyber security professional course preview">
                        <div class="course-badges">
                            <span class="badge badge-primary">Cyber Security</span>
                            <span class="badge badge-dark">New</span>
                        </div>
                        <button class="icon-btn course-wishlist" type="button" aria-label="Add to wishlist"><i
                                class="far fa-heart"></i></button>
                        <button class="icon-btn course-share" type="button" aria-label="Share course"><i
                                class="fas fa-share-alt"></i></button>
                    </div>
                    <div class="course-body">
                        <h3>Cyber Security Professional</h3>
                        <p>Build practical skills in security fundamentals, incident response, and threat awareness.</p>
                        <div class="course-instructor">
                            <img src="assets/images/instructors/boy.jpg" alt="Instructor avatar">
                            <div>
                                <strong>Manav Das</strong>
                                <small>Security Analyst</small>
                            </div>
                        </div>
                        <div class="course-stats">
                            <span><i class="fas fa-star"></i> 4.8 (892)</span>
                            <span><i class="fas fa-users"></i> 8.8k</span>
                        </div>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 16h</span>
                            <span><i class="fas fa-book-open"></i> 60 lessons</span>
                            <span><i class="fas fa-globe"></i> English</span>
                        </div>
                        <div class="course-footer">
                            <div>
                                <span class="price">₹5,199</span>
                                <span class="old-price">₹7,999</span>
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

    <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content course-modal-content">
                <div class="modal-body p-0">
                    <img src="assets/images/courses/course-01.svg" alt="Featured course preview"
                        class="course-modal-image">
                    <div class="course-modal-body">
                        <h3 id="courseModalLabel">Learn with Expert Guidance</h3>
                        <p>Get practical training, project-based learning, and lifetime access to premium course
                            materials.</p>
                        <div class="course-modal-details">
                            <span><i class="fas fa-graduation-cap"></i> Instructor: Aarav Sharma</span>
                            <span><i class="far fa-clock"></i> 12 Hours</span>
                            <span><i class="fas fa-book-open"></i> 48 Lessons</span>
                            <span><i class="fas fa-signal"></i> Intermediate</span>
                            <span><i class="fas fa-globe"></i> English</span>
                            <span><i class="fas fa-star"></i> 4.9 Rating</span>
                        </div>
                        <ul class="course-outcomes">
                            <li>Hands-on projects and guided practice</li>
                            <li>Study materials and downloadable resources</li>
                            <li>Certificate of completion</li>
                        </ul>
                        <a class="btn btn-enroll w-100" href="index.php">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- ==================== LEARNING PATHS SECTION ==================== -->
        <section class="learning-paths-section" id="learning-paths" aria-labelledby="learningPathsHeading">
            <div class="container">
                <div class="section-heading" data-aos="fade-up">
                    <span class="section-badge">Learning Paths</span>
                    <div class="section-heading-row">
                        <div>
                            <h2 id="learningPathsHeading">Professional roadmap cards to guide your career</h2>
                            <p>Choose a structured path for frontend, backend, full stack, Python, AI, or cyber security
                                mastery.</p>
                        </div>
                       
                    </div>
                </div>

                <div class="learning-paths-grid">
                    <article class="learning-path-card featured-path" data-aos="fade-up">
                        <img src="assets/images/courses/project img/fullstake.png"
                            alt="Full Stack Development roadmap illustration">
                        <div class="path-card-body">
                            <div class="path-card-badges">
                                <span class="path-badge">Most Popular Career Path</span>
                                <span class="path-badge path-badge-soft">Premium</span>
                            </div>
                            <h3>Full Stack Developer</h3>
                            <p>Build complete web products with frontend, backend, databases, deployment, and testing.
                            </p>
                            <ul class="path-card-list">
                                <li><strong>Difficulty:</strong> Intermediate</li>
                                <li><strong>Estimated Duration:</strong> 6 Months</li>
                                <li><strong>Courses Included:</strong> 12</li>
                                <li><strong>Projects:</strong> 6 Portfolio Projects</li>
                                <li><strong>Certificate:</strong> Yes</li>
                                <li><strong>Career Opportunities:</strong> Web Developer, Product Engineer</li>
                                <li><strong>Average Salary:</strong> ₹8L - ₹16L</li>
                            </ul>
                            <div class="path-card-actions">
                                <button class="btn btn-outline-primary btn-ripple" type="button" data-bs-toggle="modal"
                                    data-bs-target="#roadmapModal" data-title="Full Stack Developer Roadmap"
                                    data-steps="Understand HTML, CSS, and JavaScript fundamentals; Build responsive interfaces; Learn backend APIs and databases; Deploy real applications; Launch portfolio-ready projects">View
                                    Roadmap</button>
                                <a class="btn btn-enroll btn-ripple" href="auth/register.php">Start Learning</a>
                            </div>
                        </div>
                    </article>

                    <article class="learning-path-card" data-aos="fade-up" data-aos-delay="50">
                        <img src="assets/images/courses/project img/frontend.jpg"
                            alt="Frontend Developer roadmap illustration">
                        <div class="path-card-body">
                            <h3>Frontend Developer</h3>
                            <p>Create polished interfaces and modern experiences with the latest frontend tools.</p>
                            <ul class="path-card-list">
                                <li><strong>Difficulty:</strong> Beginner</li>
                                <li><strong>Estimated Duration:</strong> 3 Months</li>
                                <li><strong>Courses Included:</strong> 8</li>
                                <li><strong>Projects:</strong> 4 UI Projects</li>
                                <li><strong>Certificate:</strong> Yes</li>
                                <li><strong>Career Opportunities:</strong> UI Engineer, Frontend Developer</li>
                                <li><strong>Average Salary:</strong> ₹5L - ₹12L</li>
                            </ul>
                            <div class="path-card-actions">
                                <button class="btn btn-outline-primary btn-ripple" type="button" data-bs-toggle="modal"
                                    data-bs-target="#roadmapModal" data-title="Frontend Developer Roadmap"
                                    data-steps="Learn modern HTML and CSS; Master responsive layouts; Add JavaScript interactivity; Practice component design; Build a complete frontend portfolio">View
                                    Roadmap</button>
                                <a class="btn btn-enroll btn-ripple" href="auth/register.php">Start Learning</a>
                            </div>
                        </div>
                    </article>

                    <article class="learning-path-card" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/images/courses/project img/backend.jpg"
                            alt="Backend Developer roadmap illustration">
                        <div class="path-card-body">
                            <h3>Backend Developer</h3>
                            <p>Master server-side logic, databases, APIs, and secure application architecture.</p>
                            <ul class="path-card-list">
                                <li><strong>Difficulty:</strong> Intermediate</li>
                                <li><strong>Estimated Duration:</strong> 4 Months</li>
                                <li><strong>Courses Included:</strong> 9</li>
                                <li><strong>Projects:</strong> 5 API Projects</li>
                                <li><strong>Certificate:</strong> Yes</li>
                                <li><strong>Career Opportunities:</strong> Backend Engineer, API Developer</li>
                                <li><strong>Average Salary:</strong> ₹6L - ₹14L</li>
                            </ul>
                            <div class="path-card-actions">
                                <button class="btn btn-outline-primary btn-ripple" type="button" data-bs-toggle="modal"
                                    data-bs-target="#roadmapModal" data-title="Backend Developer Roadmap"
                                    data-steps="Begin with programming fundamentals; Learn server-side frameworks; Connect databases and APIs; Build secure services; Deploy scalable solutions">View
                                    Roadmap</button>
                                <a class="btn btn-enroll btn-ripple" href="auth/register.php">Start Learning</a>
                            </div>
                        </div>
                    </article>

                    <article class="learning-path-card" data-aos="fade-up" data-aos-delay="150">
                        <img src="assets/images/courses/project img/python_dev.jpg"
                            alt="Python Developer roadmap illustration">
                        <div class="path-card-body">
                            <h3>Python Developer</h3>
                            <p>Advance your Python skills for automation, backend work, analysis, and AI projects.</p>
                            <ul class="path-card-list">
                                <li><strong>Difficulty:</strong> Beginner</li>
                                <li><strong>Estimated Duration:</strong> 4 Months</li>
                                <li><strong>Courses Included:</strong> 10</li>
                                <li><strong>Projects:</strong> 5 Python Projects</li>
                                <li><strong>Certificate:</strong> Yes</li>
                                <li><strong>Career Opportunities:</strong> Automation Engineer, Python Developer</li>
                                <li><strong>Average Salary:</strong> ₹4L - ₹10L</li>
                            </ul>
                            <div class="path-card-actions">
                                <button class="btn btn-outline-primary btn-ripple" type="button" data-bs-toggle="modal"
                                    data-bs-target="#roadmapModal" data-title="Python Developer Roadmap"
                                    data-steps="Start with syntax and logic; Learn core libraries; Build scripts and APIs; Explore data and automation; Create a portfolio project">View
                                    Roadmap</button>
                                <a class="btn btn-enroll btn-ripple" href="auth/register.php">Start Learning</a>
                            </div>
                        </div>
                    </article>

                    <article class="learning-path-card" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/images/courses/project img/ai_eng.jpg" alt="AI Engineer roadmap illustration">
                        <div class="path-card-body">
                            <h3>AI Engineer</h3>
                            <p>Explore machine learning, model design, deployment, and practical AI product building.
                            </p>
                            <ul class="path-card-list">
                                <li><strong>Difficulty:</strong> Advanced</li>
                                <li><strong>Estimated Duration:</strong> 8 Months</li>
                                <li><strong>Courses Included:</strong> 14</li>
                                <li><strong>Projects:</strong> 7 AI Projects</li>
                                <li><strong>Certificate:</strong> Yes</li>
                                <li><strong>Career Opportunities:</strong> AI Engineer, ML Engineer</li>
                                <li><strong>Average Salary:</strong> ₹10L - ₹25L</li>
                            </ul>
                            <div class="path-card-actions">
                                <button class="btn btn-outline-primary btn-ripple" type="button" data-bs-toggle="modal"
                                    data-bs-target="#roadmapModal" data-title="AI Engineer Roadmap"
                                    data-steps="Build math and Python skills; Learn machine learning foundations; Create models and pipelines; Deploy AI features; Ship a capstone solution">View
                                    Roadmap</button>
                                <a class="btn btn-enroll btn-ripple" href="auth/register.php">Start Learning</a>
                            </div>
                        </div>
                    </article>

                    <article class="learning-path-card" data-aos="fade-up" data-aos-delay="250">
                        <img src="assets/images/courses/project img/cyber_security.jpg"
                            alt="Cyber Security Specialist roadmap illustration">
                        <div class="path-card-body">
                            <h3>Cyber Security Specialist</h3>
                            <p>Protect systems, understand threats, and build a strong security-first mindset.</p>
                            <ul class="path-card-list">
                                <li><strong>Difficulty:</strong> Intermediate</li>
                                <li><strong>Estimated Duration:</strong> 5 Months</li>
                                <li><strong>Courses Included:</strong> 11</li>
                                <li><strong>Projects:</strong> 5 Security Labs</li>
                                <li><strong>Certificate:</strong> Yes</li>
                                <li><strong>Career Opportunities:</strong> Security Analyst, SOC Specialist</li>
                                <li><strong>Average Salary:</strong> ₹7L - ₹15L</li>
                            </ul>
                            <div class="path-card-actions">
                                <button class="btn btn-outline-primary btn-ripple" type="button" data-bs-toggle="modal"
                                    data-bs-target="#roadmapModal" data-title="Cyber Security Specialist Roadmap"
                                    data-steps="Learn networking and security fundamentals; Practice threat detection; Study incident response; Use defensive tools; Complete lab-based projects">View
                                    Roadmap</button>
                                <a class="btn btn-enroll btn-ripple" href="auth/register.php">Start Learning</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <div class="modal fade" id="coursePreviewModal" tabindex="-1" aria-labelledby="coursePreviewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content preview-modal-content">
                    <div class="modal-body p-0">
                        <img id="previewModalImage" src="assets/images/courses/course-01.svg" alt="Course preview"
                            class="preview-modal-image">
                        <div class="preview-modal-body">
                            <h3 id="coursePreviewModalLabel">Course Preview</h3>
                            <p id="previewModalOverview">Course overview will appear here.</p>
                            <div class="preview-modal-grid">
                                <div>
                                    <h4>Learning Outcomes</h4>
                                    <ul id="previewModalOutcomes"></ul>
                                </div>
                                <div>
                                    <h4>Course Features</h4>
                                    <ul id="previewModalFeatures"></ul>
                                </div>
                            </div>
                            <div class="preview-modal-footer">
                                <div>
                                    <p class="preview-modal-instructor"><strong>Instructor:</strong> <span
                                            id="previewModalInstructor">Instructor</span></p>
                                    <p class="preview-modal-requirements"><strong>Requirements:</strong> <span
                                            id="previewModalRequirements">Requirements</span></p>
                                </div>
                                <div class="preview-modal-price-wrap">
                                    <span id="previewModalPrice">₹0</span>
                                    <a class="btn btn-enroll btn-ripple" href="auth/register.php">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="roadmapModal" tabindex="-1" aria-labelledby="roadmapModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content roadmap-modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="roadmapModalLabel">Learning Roadmap</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="roadmap-timeline" id="roadmapTimeline"></div>
                    </div>
                </div>
            </div>
        </div>

  
 <?php
include('footer.php');
?>