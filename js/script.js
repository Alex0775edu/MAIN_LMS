(() => {
  'use strict';

  const onReady = (callback) => {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', callback);
    } else {
      callback();
    }
  };

  const initAos = () => {
    if (window.AOS) {
      window.AOS.init({
        duration: 800,
        once: true,
        mirror: false,
      });
    }
  };

  const animateNumber = (element, target, options = {}) => {
    if (!element || element.dataset.animated === 'true') {
      return;
    }

    element.dataset.animated = 'true';
    const suffix = options.suffix || element.dataset.suffix || '';
    const duration = options.duration || 1400;
    const steps = options.steps || 60;
    const decimals = String(target).includes('.') ? String(target).split('.')[1].length : 0;
    let currentStep = 0;

    const timer = window.setInterval(() => {
      currentStep += 1;
      const progress = Math.min(currentStep / steps, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = target * eased;

      element.textContent = `${decimals ? value.toFixed(decimals) : Math.round(value).toLocaleString()}${suffix}`;

      if (progress >= 1) {
        window.clearInterval(timer);
        element.textContent = `${decimals ? target.toFixed(decimals) : target.toLocaleString()}${suffix}`;
      }
    }, duration / steps);
  };

  const observeOnce = (elements, callback, options = {}) => {
    const targets = Array.from(elements).filter(Boolean);
    if (!targets.length) {
      return;
    }

    if (!('IntersectionObserver' in window)) {
      targets.forEach(callback);
      return;
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          callback(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, options);

    targets.forEach((target) => observer.observe(target));
  };

  const addRipple = (button, duration = 650) => {
    button.addEventListener('click', (event) => {
      const ripple = document.createElement('span');
      const rect = button.getBoundingClientRect();
      ripple.className = 'ripple-effect';
      ripple.style.left = `${event.clientX - rect.left}px`;
      ripple.style.top = `${event.clientY - rect.top}px`;
      button.appendChild(ripple);
      window.setTimeout(() => ripple.remove(), duration);
    });
  };

  const showFloatingNotice = (message, type = 'warning') => {
    const notice = document.createElement('div');
    const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';

    notice.className = `custom-alert custom-alert--${type}`;
    notice.setAttribute('role', 'status');
    notice.setAttribute('aria-live', 'polite');

    const content = document.createElement('div');
    content.className = 'custom-alert__content';

    const icon = document.createElement('i');
    icon.className = `fas ${iconClass}`;
    icon.setAttribute('aria-hidden', 'true');

    const text = document.createElement('p');
    text.className = 'custom-alert__message';
    text.textContent = message;

    const closeButton = document.createElement('button');
    closeButton.className = 'custom-alert__close';
    closeButton.type = 'button';
    closeButton.setAttribute('aria-label', 'Dismiss notification');
    closeButton.textContent = 'x';

    content.append(icon, text);
    notice.append(content, closeButton);

    closeButton.addEventListener('click', () => notice.remove());
    document.body.appendChild(notice);

    window.setTimeout(() => {
      if (notice.parentElement) {
        notice.classList.add('is-hiding');
        window.setTimeout(() => notice.remove(), 350);
      }
    }, 5000);

    return notice;
  };

  const initScrollUi = () => {
    const navbar = document.getElementById('mainNavbar');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    const syncScrollState = () => {
      const isScrolled = window.scrollY > 50;
      navbar?.classList.toggle('shadow', isScrolled);
      navbar?.classList.toggle('scrolled', window.scrollY > 20);

      if (scrollTopBtn) {
        scrollTopBtn.style.display = window.scrollY > 320 ? 'block' : 'none';
      }
    };

    window.addEventListener('scroll', syncScrollState, { passive: true });
    syncScrollState();

    scrollTopBtn?.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  };

  const initNavigation = () => {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.navbar-lms .nav-link[data-nav-link], .mobile-link');
    const currentPath = window.location.pathname.split('/').pop() || 'auth/register.php';

    navLinks.forEach((link) => {
      const href = link.getAttribute('href') || '';
      const targetPath = href.split('/').pop();
      const isHomeLink = href === 'index.php' || href === '/' || href === '#';
      const isActive = (isHomeLink && currentPath === 'index.php') || (!isHomeLink && targetPath && currentPath === targetPath);
      link.classList.toggle('active', Boolean(isActive));
    });

    window.addEventListener('scroll', () => {
      sections.forEach((section) => {
        const sectionTop = section.offsetTop - 100;
        const sectionBottom = sectionTop + section.offsetHeight;
        const sectionId = section.getAttribute('id');
        const link = document.querySelector(`.navbar-nav a[href="#${sectionId}"]`);

        if (link && window.pageYOffset > sectionTop && window.pageYOffset <= sectionBottom) {
          document.querySelectorAll('.navbar-nav .nav-link').forEach((item) => item.classList.remove('active'));
          link.classList.add('active');
        }
      });
    }, { passive: true });

    document.querySelectorAll('.navbar-nav .nav-link').forEach((link) => {
      link.addEventListener('click', () => {
        const navbarCollapse = document.getElementById('navbarContent');
        if (navbarCollapse?.classList.contains('show') && window.bootstrap?.Collapse) {
          window.bootstrap.Collapse.getOrCreateInstance(navbarCollapse).hide();
        }
      });
    });
  };

  const initSmoothScroll = () => {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
      link.addEventListener('click', (event) => {
        const targetId = link.getAttribute('href');
        if (!targetId || targetId === '#') {
          return;
        }

        const target = document.querySelector(targetId);
        if (target) {
          event.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  };

  const initHero = () => {
    const typingText = document.querySelector('.typing-text');
    const heroSearchForm = document.getElementById('heroSearchForm');
    const heroSearchButton = heroSearchForm?.querySelector('.btn-search');
    const newsletterForm = document.getElementById('newsletterForm');

    if (typingText?.dataset.typingText) {
      const words = typingText.dataset.typingText.split(',').map((word) => word.trim()).filter(Boolean);
      let wordIndex = 0;
      let charIndex = 0;
      let isDeleting = false;

      const typeLoop = () => {
        const currentWord = words[wordIndex] || '';
        typingText.textContent = currentWord.slice(0, charIndex);

        if (!isDeleting && charIndex < currentWord.length) {
          charIndex += 1;
          window.setTimeout(typeLoop, 100);
        } else if (isDeleting && charIndex > 0) {
          charIndex -= 1;
          window.setTimeout(typeLoop, 60);
        } else {
          isDeleting = !isDeleting;
          if (!isDeleting) {
            wordIndex = (wordIndex + 1) % words.length;
          }
          window.setTimeout(typeLoop, 1200);
        }
      };

      if (words.length) {
        typeLoop();
      }
    }

    heroSearchButton?.addEventListener('click', () => {
      const keywordInput = heroSearchForm?.querySelector('[name="search_courses"]');
      const categorySelect = heroSearchForm?.querySelector('[name="select_category"]');
      const query = keywordInput?.value.trim() || '';
      const category = categorySelect?.value || '';

      if (!query) {
        keywordInput?.classList.add('is-invalid');
        keywordInput?.focus();
        return;
      }

      keywordInput?.classList.remove('is-invalid');
      const params = new URLSearchParams();
      params.set('search', query);
      if (category && category !== 'All Categories') {
        params.set('category', category);
      }
      window.location.href = `courses.php?${params.toString()}`;
    });

    newsletterForm?.addEventListener('submit', (event) => {
      event.preventDefault();

      const emailInput = newsletterForm.querySelector('input[type="email"]');
      const email = emailInput?.value.trim() || '';

      if (!email) {
        emailInput?.classList.add('is-invalid');
        emailInput?.focus();
        return;
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        emailInput?.classList.add('is-invalid');
        emailInput?.focus();
        showFloatingNotice('Please enter a valid email address.', 'warning');
        return;
      }

      emailInput?.classList.remove('is-invalid');
      newsletterForm.reset();
      showFloatingNotice('Thanks for subscribing. You are now on the newsletter list.', 'success');
    });

    document.querySelectorAll('.btn-hero-primary, .btn-hero-secondary, .btn-search, .btn-enroll, .btn-preview, .btn-view-all, .page-btn, .btn-ripple')
      .forEach((button) => addRipple(button));
  };

  const initCounters = () => {
    observeOnce(document.querySelectorAll('.counter[data-target]'), (counter) => {
      animateNumber(counter, Number(counter.dataset.target || 0), { duration: 4000, steps: 200 });
    }, { threshold: 0.5 });

    observeOnce(document.querySelectorAll('.stat-card[data-counter]'), (card) => {
      const valueElement = card.querySelector('.counter-value') || card;
      animateNumber(valueElement, Number(card.dataset.counter || 0), { suffix: card.dataset.suffix || '' });
    }, { threshold: 0.7 });

    observeOnce(document.querySelectorAll('.stat-box .counter-value[data-counter], .stat-value[data-counter]'), (element) => {
      animateNumber(element, Number(element.dataset.counter || 0));
    }, { threshold: 0.8 });
  };

  const initCategoryFilters = () => {
    const categoryCards = document.querySelectorAll('.category-card');
    const generalTabs = Array.from(document.querySelectorAll('.filter-tab')).filter((tab) => !tab.closest('.course-filter-tabs'));

    generalTabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        generalTabs.forEach((item) => item.classList.remove('active'));
        tab.classList.add('active');

        const filterValue = tab.dataset.filter || 'all';
        categoryCards.forEach((card) => {
          const cardCategory = card.dataset.category || '';
          card.style.display = filterValue === 'all' || cardCategory === filterValue ? 'flex' : 'none';
        });
      });
    });

    document.querySelectorAll('.category-btn').forEach((button) => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        document.querySelector('.course-categories-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  };

  const initFeaturedCourses = () => {
    const courseCards = document.querySelectorAll('.course-card');
    const courseFilterTabs = document.querySelectorAll('.course-filter-tabs .filter-tab');

    courseFilterTabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        courseFilterTabs.forEach((item) => item.classList.remove('active'));
        tab.classList.add('active');

        const filterValue = tab.dataset.filter || 'all';
        courseCards.forEach((card) => {
          const categories = (card.dataset.category || '').toLowerCase();
          card.style.display = filterValue === 'all' || categories.includes(filterValue) ? 'flex' : 'none';
        });
      });
    });

    document.querySelectorAll('.course-wishlist, .wishlist-toggle').forEach((button) => {
      button.addEventListener('click', () => {
        button.classList.toggle('active');
        const icon = button.querySelector('i');
        if (icon) {
          icon.className = button.classList.contains('active') ? 'fas fa-heart' : 'far fa-heart';
        }
      });
    });

    document.querySelectorAll('.btn-preview').forEach((button) => {
      button.addEventListener('click', () => {
        const card = button.closest('.course-card');
        const title = card?.querySelector('h3, h6')?.textContent || 'Featured Course';
        const modalTitle = document.querySelector('#courseModalLabel, #courseModal .modal-title');
        if (modalTitle) {
          modalTitle.textContent = title;
        }
      });
    });
  };

  const initAdvancedSearch = () => {
    const searchForm = document.getElementById('advancedSearchForm');
    const resultsCount = document.getElementById('resultsCount');
    const popularCourseCards = document.querySelectorAll('.popular-course-card');
    const resetButton = document.getElementById('resetSearchFilters');

    const filterCourses = () => {
      if (!searchForm || !resultsCount) {
        return;
      }

      const formData = new FormData(searchForm);
      const keyword = (formData.get('search_keyword') || '').toString().trim().toLowerCase();
      const category = (formData.get('category') || '').toString().toLowerCase();
      const level = (formData.get('skill_level') || '').toString().toLowerCase();
      const duration = (formData.get('duration') || '').toString().toLowerCase();
      const language = (formData.get('language') || '').toString().toLowerCase();
      const price = (formData.get('price') || '').toString().toLowerCase();
      const rating = Number(formData.get('rating') || 0);
      let visibleCount = 0;

      popularCourseCards.forEach((card) => {
        const title = card.querySelector('h3')?.textContent?.toLowerCase() || '';
        const description = card.querySelector('p')?.textContent?.toLowerCase() || '';
        const isVisible = (!keyword || title.includes(keyword) || description.includes(keyword))
          && (!category || card.dataset.courseCategory === category)
          && (!level || card.dataset.courseLevel === level)
          && (!duration || card.dataset.courseDuration === duration)
          && (!language || card.dataset.courseLanguage === language)
          && (!price || card.dataset.coursePrice === price)
          && (!rating || Number(card.dataset.courseRating || 0) >= rating);

        card.style.display = isVisible ? 'flex' : 'none';
        if (isVisible) {
          visibleCount += 1;
        }
      });

      resultsCount.textContent = `Showing ${visibleCount} result${visibleCount === 1 ? '' : 's'}`;
    };

    searchForm?.addEventListener('submit', (event) => {
      event.preventDefault();
      filterCourses();
      searchForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
    searchForm?.addEventListener('change', filterCourses);
    searchForm?.addEventListener('input', filterCourses);

    resetButton?.addEventListener('click', () => {
      searchForm?.reset();
      filterCourses();
      searchForm?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    document.querySelectorAll('.tag-chip').forEach((button) => {
      button.addEventListener('click', () => {
        const input = document.getElementById('searchKeyword');
        if (input) {
          input.value = button.dataset.tag || '';
          filterCourses();
        }
      });
    });
  };

  const initCoursePreviewModal = () => {
    const previewModalImage = document.getElementById('previewModalImage');
    const previewModalTitle = document.getElementById('coursePreviewModalLabel');
    const previewModalOverview = document.getElementById('previewModalOverview');
    const previewModalOutcomes = document.getElementById('previewModalOutcomes');
    const previewModalFeatures = document.getElementById('previewModalFeatures');
    const previewModalInstructor = document.getElementById('previewModalInstructor');
    const previewModalRequirements = document.getElementById('previewModalRequirements');
    const previewModalPrice = document.getElementById('previewModalPrice');

    document.querySelectorAll('.btn-preview-card').forEach((button) => {
      button.addEventListener('click', () => {
        if (!previewModalImage || !previewModalTitle || !previewModalOverview) {
          return;
        }

        previewModalImage.src = button.dataset.image || previewModalImage.src;
        previewModalImage.alt = `${button.dataset.title || 'Course'} preview`;
        previewModalTitle.textContent = button.dataset.title || 'Course Preview';
        previewModalOverview.textContent = button.dataset.overview || 'Explore this course to get a complete learning overview.';

        const outcomes = (button.dataset.outcomes || '').split(',').map((item) => item.trim()).filter(Boolean);
        const features = (button.dataset.features || '').split(',').map((item) => item.trim()).filter(Boolean);
        if (previewModalOutcomes) {
          previewModalOutcomes.innerHTML = outcomes.map((item) => `<li>${item}</li>`).join('');
        }
        if (previewModalFeatures) {
          previewModalFeatures.innerHTML = features.map((item) => `<li>${item}</li>`).join('');
        }
        if (previewModalInstructor) {
          previewModalInstructor.textContent = button.dataset.instructor || 'Expert Instructor';
        }
        if (previewModalRequirements) {
          previewModalRequirements.textContent = button.dataset.requirements || 'No prior experience required';
        }
        if (previewModalPrice) {
          previewModalPrice.textContent = button.dataset.price || 'Price coming soon';
        }
      });
    });
  };

  const initRoadmaps = () => {
    const roadmapTimeline = document.getElementById('roadmapTimeline');
    const roadmapModalTitle = document.getElementById('roadmapModalLabel');

    document.querySelectorAll('.learning-path-card .btn-outline-primary').forEach((button) => {
      button.addEventListener('click', () => {
        if (!roadmapTimeline || !roadmapModalTitle) {
          return;
        }

        const steps = (button.dataset.steps || '').split(';').map((step) => step.trim()).filter(Boolean);
        roadmapModalTitle.textContent = button.dataset.title || 'Learning Roadmap';
        roadmapTimeline.innerHTML = steps.map((step, index) => `
          <div class="roadmap-step">
            <div class="trend-icon"><i class="fas fa-check"></i></div>
            <div>
              <strong>Step ${index + 1}</strong>
              <span>${step}</span>
            </div>
          </div>
        `).join('');
      });
    });
  };

  const initTrustSection = () => {
    const progressFillElements = document.querySelectorAll('.progress-fill[data-progress]');
    const circularProgressElements = document.querySelectorAll('.circular-progress[data-progress]');
    const scrollRevealTargets = document.querySelectorAll('.why-card, .success-panel, .achievement-card, .partner-card, .timeline-item');

    progressFillElements.forEach((bar) => {
      bar.style.width = `${Number(bar.dataset.progress || 0)}%`;
    });

    circularProgressElements.forEach((circle) => {
      const progress = Number(circle.dataset.progress || 0);
      const valueLabel = circle.querySelector('.circular-value');
      const degrees = (progress / 100) * 360;
      circle.style.background = `conic-gradient(var(--primary-color) ${degrees}deg, rgba(226, 232, 240, 0.9) ${degrees}deg)`;

      if (valueLabel) {
        animateNumber(valueLabel, progress, { suffix: '%', duration: 1400 });
      }
    });

    observeOnce(scrollRevealTargets, (target) => {
      target.classList.add('is-visible');
    }, { threshold: 0.2 });
  };

  const initContactPage = () => {
    const contactForm = document.getElementById('contactForm');
    const phoneInput = document.getElementById('contactPhone');

    const isValidEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    contactForm?.addEventListener('submit', (event) => {
      event.preventDefault();

      const name = document.getElementById('contactName')?.value.trim() || '';
      const email = document.getElementById('contactEmail')?.value.trim() || '';
      const subject = document.getElementById('contactSubject')?.value || '';
      const message = document.getElementById('contactMessage')?.value.trim() || '';
      const agreeTerms = document.getElementById('agreeContact')?.checked || false;

      if (!name) {
        showFloatingNotice('Please enter your full name.');
      } else if (name.length < 2) {
        showFloatingNotice('Name must be at least 2 characters long.');
      } else if (!email) {
        showFloatingNotice('Please enter your email address.');
      } else if (!isValidEmail(email)) {
        showFloatingNotice('Please enter a valid email address.');
      } else if (!subject) {
        showFloatingNotice('Please select a subject.');
      } else if (!message) {
        showFloatingNotice('Please enter your message.');
      } else if (message.length < 10) {
        showFloatingNotice('Message must be at least 10 characters long.');
      } else if (!agreeTerms) {
        showFloatingNotice('Please agree to our Privacy Policy.');
      } else {
        showFloatingNotice(`Thank you, ${name}! Your message has been sent successfully. We will get back to you within 24 hours.`, 'success');
        contactForm.reset();
        document.querySelector('.contact-form-wrapper')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });

    document.querySelector('.info-card .btn-outline-primary')?.addEventListener('click', () => {
      showFloatingNotice('Live chat feature coming soon! Please use the contact form or email us at support@edunexus.com');
    });

    phoneInput?.addEventListener('input', (event) => {
      let value = event.target.value.replace(/\D/g, '');
      if (value.length && value.length <= 10) {
        value = value.replace(/(\d{0,3})(\d{0,3})(\d{0,4})/, (match, first, second, third) => {
          let result = '';
          if (first) result += `(${first}`;
          if (second) result += `) ${second}`;
          if (third) result += `-${third}`;
          return result;
        });
      }
      event.target.value = value;
    });
  };

  onReady(() => {
    initAos();
    initScrollUi();
    initNavigation();
    initSmoothScroll();
    initHero();
    initCounters();
    initCategoryFilters();
    initFeaturedCourses();
    initAdvancedSearch();
    initCoursePreviewModal();
    initRoadmaps();
    initTrustSection();
    initContactPage();
  });
})();
