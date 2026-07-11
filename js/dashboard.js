document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('sidebar');
  const mobileToggle = document.getElementById('mobileToggle');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const themeToggle = document.getElementById('themeToggle');
  const scrollTopBtn = document.getElementById('scrollTopBtn');
  const navItems = document.querySelectorAll('.nav-item');
  const progressBars = document.querySelectorAll('.progress-bar');
  const miniProgressBars = document.querySelectorAll('.mini-progress [data-progress]');
  const circularBars = document.querySelectorAll('.circular-progress');
  const chartCanvas = document.getElementById('learningChart');
  const toastContainer = document.getElementById('dashboardToastContainer');
  const searchInput = document.querySelector('.search-pill input');
  const themeKey = 'lms-theme';

  const showToast = (message, type = 'info') => {
    if (!toastContainer) {
      return;
    }

    const toast = document.createElement('div');
    toast.className = `dashboard-toast dashboard-toast--${type}`;

    const text = document.createElement('p');
    text.className = 'dashboard-toast__message';
    text.textContent = message;

    const close = document.createElement('button');
    close.type = 'button';
    close.className = 'dashboard-toast__close';
    close.setAttribute('aria-label', 'Dismiss notification');
    close.textContent = 'x';

    toast.append(text, close);
    toastContainer.appendChild(toast);

    const removeToast = () => {
      if (!toast.isConnected) return;
      toast.classList.add('is-leaving');
      window.setTimeout(() => toast.remove(), 200);
    };

    close.addEventListener('click', removeToast);
    window.setTimeout(removeToast, 4000);
  };

  const openPage = (url) => {
    window.location.href = url;
  };

  const applyTheme = (theme) => {
    const nextTheme = theme === 'dark' ? 'dark' : 'light';
    document.body.classList.toggle('dark-mode', nextTheme === 'dark');
    document.body.classList.toggle('light-mode', nextTheme === 'light');
    if (themeToggle) {
      themeToggle.innerHTML = nextTheme === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
      themeToggle.setAttribute('aria-label', nextTheme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
      themeToggle.setAttribute('aria-pressed', nextTheme === 'dark');
    }
    window.localStorage.setItem(themeKey, nextTheme);
  };

  const applyProgressState = () => {
    progressBars.forEach((bar) => {
      const width = bar.dataset.progress ? `${bar.dataset.progress}%` : '0%';
      bar.style.width = width;
    });

    miniProgressBars.forEach((bar) => {
      bar.style.width = `${Number(bar.dataset.progress || 0)}%`;
    });

    circularBars.forEach((bar) => {
      const value = Number(bar.dataset.progress || 0);
      bar.style.background = `conic-gradient(var(--primary-color) ${value * 3.6}deg, #e2e8f0 0deg)`;
      const label = bar.querySelector('span');
      if (label) {
        label.textContent = `${value}%`;
      }
    });
  };

  const toggleSidebar = () => {
    if (window.innerWidth <= 991) {
      sidebar?.classList.toggle('show');
    } else {
      sidebar?.classList.toggle('collapsed');
    }
  };

  const toggleTheme = () => {
    const nextTheme = document.body.classList.contains('dark-mode') ? 'light' : 'dark';
    applyTheme(nextTheme);
  };

  const handleDashboardAction = (button) => {
    const action = button.dataset.dashboardAction;
    const sessionTitle = button.dataset.sessionTitle || 'Live session';
    const certificateTitle = button.dataset.certificateTitle || 'Certificate';

    switch (action) {
      case 'open-notifications':
        showToast('Opening notifications.', 'info');
        window.setTimeout(() => openPage('notifications.html'), 220);
        break;
      case 'open-messages':
        showToast('Opening messages.', 'info');
        window.setTimeout(() => openPage('messages.html'), 220);
        break;
      case 'join-live-session':
        showToast(`Opening ${sessionTitle} in the course room.`, 'success');
        window.setTimeout(() => openPage('course-player.html'), 220);
        break;
      case 'set-reminder':
        showToast(`Reminder saved for ${sessionTitle}.`, 'info');
        window.setTimeout(() => openPage('calendar.html'), 220);
        break;
      case 'download-certificate':
        showToast(`Preparing ${certificateTitle} for download.`, 'success');
        window.setTimeout(() => openPage('downloads.html'), 220);
        break;
      case 'share-certificate':
        if (navigator.share) {
          navigator.share({
            title: certificateTitle,
            text: `My ${certificateTitle} certificate from Dhurandhar LMS.`,
            url: window.location.href,
          }).then(() => {
            showToast('Certificate share sheet opened successfully.', 'success');
          }).catch(() => {});
        } else if (navigator.clipboard) {
          navigator.clipboard.writeText(`My ${certificateTitle} certificate from Dhurandhar LMS: ${window.location.href}`)
            .then(() => showToast('Certificate link copied to clipboard.', 'success'))
            .catch(() => showToast('Unable to copy the certificate link.', 'warning'));
        } else {
          showToast('Sharing is not supported in this browser.', 'warning');
        }
        break;
      default:
        showToast('Action is not connected yet.', 'warning');
        break;
    }
  };

  mobileToggle?.addEventListener('click', toggleSidebar);
  sidebarToggle?.addEventListener('click', toggleSidebar);

  navItems.forEach((item) => {
    item.addEventListener('click', () => {
      navItems.forEach((nav) => nav.classList.remove('active'));
      item.classList.add('active');
      if (window.innerWidth <= 991) {
        sidebar?.classList.remove('show');
      }
    });
  });

  themeToggle?.addEventListener('click', toggleTheme);

  document.querySelectorAll('[data-dashboard-action]').forEach((button) => {
    button.addEventListener('click', () => handleDashboardAction(button));
  });

  searchInput?.addEventListener('keydown', (event) => {
    if (event.key !== 'Enter') return;
    event.preventDefault();
    const query = searchInput.value.trim();
    if (!query) {
      showToast('Type a course or lesson name to search.', 'warning');
      return;
    }
    showToast(`Searching for "${query}".`, 'info');
    openPage(`courses.html?search=${encodeURIComponent(query)}`);
  });

  window.addEventListener('scroll', () => {
    if (scrollTopBtn) {
      scrollTopBtn.style.display = window.scrollY > 280 ? 'grid' : 'none';
    }
  });

  scrollTopBtn?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  document.querySelectorAll('.btn').forEach((button) => {
    button.addEventListener('click', () => {
      button.classList.add('is-pressed');
      window.setTimeout(() => button.classList.remove('is-pressed'), 140);
    });
  });

  if (window.AOS) {
    AOS.init({ duration: 700, once: true, offset: 80 });
  }

  if (chartCanvas && window.Chart) {
    new Chart(chartCanvas, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          label: 'Study Hours',
          data: [1.4, 2.1, 1.7, 2.6, 2.2, 1.9, 3.1],
          borderColor: '#2563eb',
          backgroundColor: 'rgba(37, 99, 235, 0.15)',
          borderWidth: 3,
          fill: true,
          tension: 0.35,
          pointRadius: 4,
          pointBackgroundColor: '#ffffff',
          pointBorderColor: '#2563eb'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          y: {
            beginAtZero: true,
            ticks: { precision: 0 }
          }
        }
      }
    });
  }

  applyProgressState();
  applyTheme(window.localStorage.getItem(themeKey) || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'));

  window.addEventListener('resize', () => {
    if (window.innerWidth > 991) {
      sidebar?.classList.remove('show');
    }
    applyProgressState();
  });
});
