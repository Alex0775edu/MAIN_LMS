document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.sidebar');
  const toggleSidebar = () => sidebar?.classList.toggle('show');
  document.querySelector('.mobile-toggle')?.addEventListener('click', toggleSidebar);
  document.querySelector('[data-theme-toggle]')?.addEventListener('click', () => document.body.classList.toggle('dark-mode'));

  document.querySelectorAll('[data-toast]').forEach((button) => {
    button.addEventListener('click', () => {
      const container = document.querySelector('.toast-container') || document.body;
      const toast = document.createElement('div');
      toast.className = 'toast';
      toast.textContent = button.getAttribute('data-toast') || 'Action completed';
      container.appendChild(toast);
      setTimeout(() => toast.remove(), 2200);
    });
  });

  const scrollTopBtn = document.querySelector('.scroll-top');
  const toggleScrollBtn = () => {
    if (scrollTopBtn) {
      scrollTopBtn.style.display = window.scrollY > 330 ? 'grid' : 'none';
    }
  };
  window.addEventListener('scroll', toggleScrollBtn);
  toggleScrollBtn();
  scrollTopBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  document.querySelectorAll('[data-search]').forEach((input) => {
    input.addEventListener('input', (event) => {
      const query = event.target.value.toLowerCase();
      document.querySelectorAll('[data-search-item]').forEach((item) => {
        item.style.display = item.textContent.toLowerCase().includes(query) ? '' : 'none';
      });
    });
  });

  if (window.AOS) AOS.init({ duration: 700, once: true, offset: 80 });

  if (window.Chart) {
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
      new Chart(revenueCtx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
          datasets: [{
            label: 'Revenue',
            data: [22000, 25500, 24800, 29400, 31800, 37200],
            borderColor: '#2563eb',
            backgroundColor: 'rgba(37,99,235,0.16)',
            fill: true,
            tension: 0.3
          }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
      });
    }

    const growthCtx = document.getElementById('growthChart');
    if (growthCtx) {
      new Chart(growthCtx, {
        type: 'bar',
        data: {
          labels: ['Students', 'Instructors', 'Courses', 'Enrollments'],
          datasets: [{
            label: 'Growth',
            data: [82, 67, 74, 91],
            backgroundColor: ['#2563eb', '#7c3aed', '#0ea5e9', '#16a34a']
          }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true, max: 100 } } }
      });
    }
  }

  if (window.FullCalendar) {
    const cal = document.getElementById('adminCalendar');
    if (cal) {
      new FullCalendar.Calendar(cal, {
        initialView: 'dayGridMonth',
        headerToolbar: { left: 'prev,next today', center: 'title', right: 'dayGridMonth,listWeek' },
        events: [
          { title: 'Audit Review', date: '2026-07-10' },
          { title: 'Backup Window', date: '2026-07-12' },
          { title: 'Policy Update', date: '2026-07-15' }
        ]
      }).render();
    }
  }
});
