document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('[data-toggle-for]').forEach(function (button) {
    button.addEventListener('click', function () {
      const targetId = this.getAttribute('data-toggle-for');
      const field = document.getElementById(targetId);
      if (!field) return;
      const isPassword = field.type === 'password';
      field.type = isPassword ? 'text' : 'password';
      const icon = this.querySelector('i');
      if (icon) {
        icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
      }
    });
  });
});
