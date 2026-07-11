document.addEventListener('DOMContentLoaded', () => {
  const faqCards = document.querySelectorAll('.faq-card');
  faqCards.forEach((card) => {
    const button = card.querySelector('.faq-question');
    button?.addEventListener('click', () => {
      faqCards.forEach((item) => {
        if (item !== card) item.classList.remove('open');
      });
      card.classList.toggle('open');
    });
  });

  const scrollTopBtn = document.querySelector('.scroll-top-btn');
  window.addEventListener('scroll', () => {
    if (scrollTopBtn) scrollTopBtn.style.display = window.scrollY > 320 ? 'grid' : 'none';
  });
  scrollTopBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  const themeToggle = document.querySelector('[data-theme-toggle]');
  themeToggle?.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    themeToggle.innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
  });

  const sidebar = document.querySelector('.dashboard-sidebar');
  document.querySelector('.mobile-toggle')?.addEventListener('click', () => sidebar?.classList.toggle('show'));

  if (window.AOS) AOS.init({ duration: 700, once: true, offset: 80 });
});
