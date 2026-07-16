document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.sidebar');
  const mobileToggle = document.querySelector('.mobile-toggle');
  const themeToggle = document.querySelector('[data-theme-toggle]');
  const scrollTopBtn = document.querySelector('.scroll-top-btn');
  const searchInputs = document.querySelectorAll('[data-search]');
  const toastContainer = document.querySelector('.toast-container');

  const showToast = (message, type = 'info') => {
    if (!toastContainer) return;
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<strong>${message}</strong>`;
    toastContainer.appendChild(toast);
    setTimeout(() => toast.remove(), 2500);
  };

  document.querySelectorAll('[data-toast]').forEach((button) => {
    button.addEventListener('click', () => showToast(button.dataset.toast, button.dataset.toastType || 'info'));
  });

  mobileToggle?.addEventListener('click', () => sidebar?.classList.toggle('show'));
  themeToggle?.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    themeToggle.innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
  });

  searchInputs.forEach((input) => {
    input.addEventListener('input', (event) => {
      const value = event.target.value.toLowerCase();
      document.querySelectorAll('[data-search-item]').forEach((item) => {
        const text = item.textContent.toLowerCase();
        item.style.display = text.includes(value) ? '' : 'none';
      });
    });
  });

  document.querySelectorAll('.progress-bar').forEach((bar) => {
    const target = bar.dataset.progress || bar.style.width || '0%';
    bar.style.width = '0%';
    setTimeout(() => { bar.style.width = target; }, 250);
  });

  window.addEventListener('scroll', () => {
    if (scrollTopBtn) {
      scrollTopBtn.style.display = window.scrollY > 300 ? 'grid' : 'none';
    }
  });

  scrollTopBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  if (window.AOS) {
    AOS.init({ duration: 700, once: true, offset: 80 });
  }

  document.querySelectorAll('.nav-item').forEach((item) => {
    item.addEventListener('click', () => {
      document.querySelectorAll('.nav-item').forEach((nav) => nav.classList.remove('active'));
      item.classList.add('active');
      if (window.innerWidth <= 991) sidebar?.classList.remove('show');
    });
  });
});
