// ==================== INSTRUCTORS PAGE JAVASCRIPT ====================

// Initialize AOS animations
AOS.init({
  duration: 800,
  once: true,
  mirror: false
});

// Scroll to top button functionality
const scrollTopBtn = document.getElementById('scrollTopBtn');

window.addEventListener('scroll', function() {
  if (window.scrollY > 300) {
    scrollTopBtn.style.display = 'block';
  } else {
    scrollTopBtn.style.display = 'none';
  }
});

scrollTopBtn.addEventListener('click', function() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

// Counter animation for statistics
const counters = document.querySelectorAll('.counter');
const speed = 200;

function runCounter() {
  counters.forEach(counter => {
    const target = +counter.getAttribute('data-target');
    const updateCount = () => {
      const current = +counter.innerText;
      const increment = target / speed;
      
      if (current < target) {
        counter.innerText = Math.ceil(current + increment);
        setTimeout(updateCount, 20);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  });
}

// Trigger counter when statistics section is visible
const statsSection = document.querySelector('.instructor-stats');
if (statsSection) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        runCounter();
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });
  
  observer.observe(statsSection);
}

// ==================== FILTER FUNCTIONALITY ====================
const filterButtons = document.querySelectorAll('.filter-btn');
const instructorItems = document.querySelectorAll('.instructor-item');

filterButtons.forEach(button => {
  button.addEventListener('click', function() {
    // Remove active class from all buttons
    filterButtons.forEach(btn => btn.classList.remove('active'));
    // Add active class to clicked button
    this.classList.add('active');
    
    // Get filter category
    const filterValue = this.getAttribute('data-filter');
    
    // Filter instructor cards
    instructorItems.forEach(item => {
      if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
        item.style.display = 'block';
        item.style.animation = 'fadeInScale 0.5s ease forwards';
      } else {
        item.style.display = 'none';
      }
    });
  });
});

// ==================== LOAD MORE FUNCTIONALITY ====================
const loadMoreBtn = document.getElementById('loadMoreBtn');
let loadMoreCount = 0;
const maxLoads = 2; // Allow 2 more loads

// Additional instructor data (simulated)
const additionalInstructors = [
  // Load 1 (4 instructors)
  [
    {
      category: 'web',
      img: 'https://randomuser.me/api/portraits/men/55.jpg',
      name: 'Chris Johnson',
      role: 'Angular Expert',
      rating: '4.7'
    },
    {
      category: 'data',
      img: 'https://randomuser.me/api/portraits/women/99.jpg',
      name: 'Rachel Green',
      role: 'R Programming',
      rating: '4.8'
    },
    {
      category: 'design',
      img: 'https://randomuser.me/api/portraits/men/88.jpg',
      name: 'Kevin Wright',
      role: 'Sketch Pro',
      rating: '4.6'
    },
    {
      category: 'mobile',
      img: 'https://randomuser.me/api/portraits/women/11.jpg',
      name: 'Diana Ross',
      role: 'React Native',
      rating: '4.9'
    }
  ],
  // Load 2 (4 instructors)
  [
    {
      category: 'web',
      img: 'https://randomuser.me/api/portraits/men/77.jpg',
      name: 'Brian Adams',
      role: 'Vue.js Master',
      rating: '4.8'
    },
    {
      category: 'data',
      img: 'https://randomuser.me/api/portraits/women/44.jpg',
      name: 'Monica Hall',
      role: 'Tableau Expert',
      rating: '4.7'
    },
    {
      category: 'design',
      img: 'https://randomuser.me/api/portraits/men/22.jpg',
      name: 'Steve Clark',
      role: 'Illustrator Pro',
      rating: '4.5'
    },
    {
      category: 'mobile',
      img: 'https://randomuser.me/api/portraits/women/33.jpg',
      name: 'Anna White',
      role: 'Kotlin Expert',
      rating: '4.9'
    }
  ]
];

loadMoreBtn.addEventListener('click', function() {
  if (loadMoreCount < maxLoads) {
    // Get the grid container
    const grid = document.getElementById('instructorsGrid');
    
    // Get instructors for current load
    const newInstructors = additionalInstructors[loadMoreCount];
    
    // Add each new instructor to the grid
    newInstructors.forEach((instructor, index) => {
      const cardHTML = `
        <div class="col-lg-3 col-md-4 col-6 instructor-item" 
             data-category="${instructor.category}" 
             data-aos="fade-up" 
             data-aos-delay="${(loadMoreCount * 4 + index) * 50}">
          <div class="instructor-mini-card bg-white rounded-4 shadow-sm p-3 text-center h-100">
            <img src="${instructor.img}" alt="${instructor.name}" class="rounded-circle mb-2" width="80">
            <h6 class="fw-bold mb-1">${instructor.name}</h6>
            <small class="text-muted">${instructor.role}</small>
            <div class="text-warning small mt-1">
              <i class="fas fa-star"></i> ${instructor.rating}
            </div>
            <div class="mt-2">
              <a href="#" class="text-primary small text-decoration-none">View Profile →</a>
            </div>
          </div>
        </div>
      `;
      
      grid.insertAdjacentHTML('beforeend', cardHTML);
    });
    
    // Refresh AOS to animate new elements
    AOS.refresh();
    
    // Apply current filter to new cards
    const activeFilter = document.querySelector('.filter-btn.active');
    if (activeFilter) {
      const filterValue = activeFilter.getAttribute('data-filter');
      const newItems = grid.querySelectorAll('.instructor-item');
      newItems.forEach(item => {
        if (filterValue !== 'all' && item.getAttribute('data-category') !== filterValue) {
          item.style.display = 'none';
        }
      });
    }
    
    loadMoreCount++;
    
    // Disable button when max loads reached
    if (loadMoreCount >= maxLoads) {
      loadMoreBtn.innerHTML = '<i class="fas fa-check me-2"></i>All Instructors Loaded';
      loadMoreBtn.disabled = true;
      loadMoreBtn.classList.add('btn-success');
      loadMoreBtn.classList.remove('btn-primary');
    } else {
      loadMoreBtn.innerHTML = '<i class="fas fa-sync-alt me-2"></i>Load More Instructors';
    }
  }
});

// "View Profile" button click
document.addEventListener('click', function(e) {
  if (e.target.closest('.btn-outline-primary') && 
      (e.target.textContent.includes('View Profile') || 
       e.target.closest('.btn-outline-primary')?.textContent.includes('View Profile'))) {
    e.preventDefault();
    alert('Instructor profile page coming soon!');
  }
});

// "Become Instructor" button click
const becomeInstructorBtn = document.querySelector('.become-instructor .btn-primary');
if (becomeInstructorBtn) {
  becomeInstructorBtn.addEventListener('click', function(e) {
    e.preventDefault();
    alert('Thank you for your interest! Please contact us at instructors@edunexus.com to apply.');
  });
}

console.log('EduNexus Instructors Page Ready!');