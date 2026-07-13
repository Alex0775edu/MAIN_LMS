// ==================== BLOG PAGE JAVASCRIPT ====================

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

// ==================== SEARCH FUNCTIONALITY ====================
const searchInput = document.querySelector('.sidebar-widget .form-control');
const searchButton = document.querySelector('.sidebar-widget .btn-primary');

function performSearch() {
  const searchTerm = searchInput.value.trim().toLowerCase();
  
  if (searchTerm === '') {
    alert('Please enter a search term.');
    return;
  }
  
  // Get all blog post titles
  const blogTitles = document.querySelectorAll('.blog-card-body h3 a');
  let found = false;
  
  // Search through blog posts
  blogTitles.forEach(title => {
    const blogCard = title.closest('.blog-card');
    const titleText = title.textContent.toLowerCase();
    
    if (titleText.includes(searchTerm)) {
      // Highlight the matching blog post
      blogCard.style.border = '2px solid var(--primary)';
      blogCard.style.boxShadow = '0 0 20px rgba(37, 99, 235, 0.3)';
      blogCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
      
      // Remove highlight after 3 seconds
      setTimeout(() => {
        blogCard.style.border = '1px solid rgba(0, 0, 0, 0.04)';
        blogCard.style.boxShadow = '0 4px 12px rgba(0,0,0,0.05)';
      }, 3000);
      
      found = true;
    }
  });
  
  if (!found) {
    alert('No blog posts found matching: "' + searchTerm + '"');
  }
}

// Search on button click
if (searchButton) {
  searchButton.addEventListener('click', performSearch);
}

// Search on Enter key
if (searchInput) {
  searchInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      performSearch();
    }
  });
}

// ==================== HEART/LIKE FUNCTIONALITY ====================
const heartIcons = document.querySelectorAll('.blog-stats .fa-heart');

heartIcons.forEach(heart => {
  heart.addEventListener('click', function() {
    // Toggle between regular and solid heart
    if (this.classList.contains('far')) {
      this.classList.remove('far');
      this.classList.add('fas');
      this.style.color = '#ef4444';
      
      // Increment the count (simulated)
      const countSpan = this.parentElement;
      const currentCount = parseInt(countSpan.textContent.trim());
      countSpan.innerHTML = `<i class="fas fa-heart me-1"></i> ${currentCount + 1}`;
      
      // Re-attach event listener (since innerHTML was replaced)
      attachHeartListener(countSpan.querySelector('.fa-heart'));
    } else {
      this.classList.remove('fas');
      this.classList.add('far');
      this.style.color = '';
      
      // Decrement the count (simulated)
      const countSpan = this.parentElement;
      const currentCount = parseInt(countSpan.textContent.trim());
      countSpan.innerHTML = `<i class="far fa-heart me-1"></i> ${currentCount - 1}`;
      
      // Re-attach event listener
      attachHeartListener(countSpan.querySelector('.fa-heart'));
    }
  });
});

// Helper function to re-attach heart click listener
function attachHeartListener(heartElement) {
  if (heartElement) {
    heartElement.addEventListener('click', function() {
      // Trigger the parent heart click logic
      heartIcons.forEach(h => {
        if (h === heartElement || h.parentElement === heartElement.parentElement) {
          h.click();
        }
      });
    });
  }
}

// ==================== NEWSLETTER SUBSCRIPTION ====================
const newsletterBtn = document.querySelector('.sidebar-widget.bg-primary .btn-light');
const newsletterInput = document.querySelector('.sidebar-widget.bg-primary .form-control');

if (newsletterBtn && newsletterInput) {
  newsletterBtn.addEventListener('click', function() {
    const email = newsletterInput.value.trim();
    
    if (!email) {
      alert('Please enter your email address.');
      return;
    }
    
    if (!isValidEmail(email)) {
      alert('Please enter a valid email address.');
      return;
    }
    
    alert('Thank you for subscribing! You will receive our latest blog updates.');
    newsletterInput.value = '';
  });
}

// Email validation helper
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// ==================== "READ MORE" BUTTONS ====================
const readMoreButtons = document.querySelectorAll('.blog-card-body .btn-primary');

readMoreButtons.forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    const blogTitle = this.closest('.blog-card-body').querySelector('h3 a').textContent;
    alert('Full article coming soon!\n\n"' + blogTitle + '"\n\nThis is a demo blog page. In a real application, this would open the full article.');
  });
});

// ==================== CATEGORY LINKS ====================
const categoryLinks = document.querySelectorAll('.category-list li a');

categoryLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const categoryName = this.childNodes[0].textContent.trim();
    alert('Showing all posts in category: ' + categoryName + '\n\n(Filtering feature for demo purposes)');
  });
});

// ==================== TAG CLICKS ====================
const tagLinks = document.querySelectorAll('.tag-cloud .tag');

tagLinks.forEach(tag => {
  tag.addEventListener('click', function(e) {
    e.preventDefault();
    const tagName = this.textContent.trim();
    alert('Showing all posts tagged with: ' + tagName + '\n\n(Filtering feature for demo purposes)');
  });
});

// ==================== RECENT POSTS CLICKS ====================
const recentPostLinks = document.querySelectorAll('.recent-post h6 a');

recentPostLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    alert('Full article coming soon!\n\n"' + this.textContent + '"\n\nThis is a demo blog page.');
  });
});

console.log('EduNexus Blog Page Ready!');