
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-toast]').forEach((button) => {
    button.addEventListener('click', () => {
      const note = document.createElement('div');
      note.className = 'card-surface';
      note.style.position = 'fixed';
      note.style.right = '1rem';
      note.style.bottom = '1rem';
      note.style.zIndex = '2000';
      note.style.padding = '0.8rem 1rem';
      note.textContent = button.getAttribute('data-toast') || 'Saved';
      document.body.appendChild(note);
      setTimeout(() => note.remove(), 2200);
    });
  });
  document.querySelectorAll('[data-search]').forEach((input) => {
    input.addEventListener('input', (event) => {
      const query = event.target.value.toLowerCase();
      document.querySelectorAll('[data-search-item]').forEach((item) => {
        item.style.display = item.textContent.toLowerCase().includes(query) ? '' : 'none';
      });
    });
  });
});
