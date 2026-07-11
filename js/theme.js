/* =========================================================
   THEME.JS
   Purpose: Manages light/dark theme switching for the LMS.
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  const themeToggle = document.querySelector('[data-theme-toggle]');

  if (!themeToggle) return;

  const applyTheme = (theme) => {
    const nextTheme = theme === 'dark' ? 'dark' : 'light';
    document.body.classList.toggle('dark-mode', nextTheme === 'dark');
    document.body.classList.toggle('light-mode', nextTheme === 'light');
    themeToggle.setAttribute('aria-pressed', nextTheme === 'dark');
    themeToggle.setAttribute('aria-label', nextTheme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
    themeToggle.innerHTML = nextTheme === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
    window.localStorage.setItem('lms-theme', nextTheme);
  };

  const savedTheme = window.localStorage.getItem('lms-theme');
  const preferredTheme = savedTheme || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
  applyTheme(preferredTheme);

  themeToggle.addEventListener('click', () => {
    const nextTheme = document.body.classList.contains('dark-mode') ? 'light' : 'dark';
    applyTheme(nextTheme);
  });
});
