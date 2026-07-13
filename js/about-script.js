// ==================== ABOUT PAGE JAVASCRIPT ====================

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
const statsSection = document.querySelector('.stats-section');
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

// Add active class to current page link
document.addEventListener('DOMContentLoaded', function() {
  const currentPage = window.location.pathname.split('/').pop();
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage) {
      link.classList.add('active');
    }
  });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href !== '#') {
      e.preventDefault();
      const target = document.querySelector(href);
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    }
  });
});

console.log('DhurandharFe About Page Ready!');