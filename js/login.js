// ==================== LOGIN PAGE INTERACTIONS ====================

const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('loginEmail');
const passwordInput = document.getElementById('loginPassword');
const passwordToggle = document.querySelector('.password-toggle');
const loginButton = document.querySelector('#loginForm button[type="submit"]');
const toastContainer = document.getElementById('toastContainer');

const showToast = (message, type = 'success') => {
  if (!toastContainer) return;
  const toast = document.createElement('div');
  toast.className = `toast-message ${type}`;
  toast.innerHTML = `<strong>${type === 'success' ? 'Success' : 'Error'}</strong><p>${message}</p>`;
  toastContainer.appendChild(toast);
  window.clearTimeout(showToast.timeout);
  showToast.timeout = window.setTimeout(() => {
    toast.classList.add('toast-hide');
    toast.addEventListener('transitionend', () => toast.remove(), { once: true });
  }, 3200);
};

const setError = (input, message) => {
  if (!input) return;
  input.classList.add('is-invalid');
  input.classList.remove('is-valid');
  const feedback = document.getElementById(`${input.id}Error`);
  if (feedback) feedback.textContent = message;
};

const clearError = (input) => {
  if (!input) return;
  input.classList.remove('is-invalid');
  input.classList.add('is-valid');
  const feedback = document.getElementById(`${input.id}Error`);
  if (feedback) feedback.textContent = '';
};

const validateField = (input) => {
  const value = input.value.trim();
  if (!value) {
    setError(input, input === emailInput ? 'Email address is required.' : 'Password is required.');
    return false;
  }
  if (input === emailInput) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(value)) {
      setError(input, 'Please enter a valid email address.');
      return false;
    }
  }
  clearError(input);
  return true;
};

emailInput?.addEventListener('input', () => validateField(emailInput));
passwordInput?.addEventListener('input', () => validateField(passwordInput));

passwordToggle?.addEventListener('click', () => {
  const input = document.getElementById('loginPassword');
  if (!input) return;
  const isPassword = input.type === 'password';
  input.type = isPassword ? 'text' : 'password';
  const icon = passwordToggle.querySelector('i');
  if (icon) icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
});

loginForm?.addEventListener('submit', (event) => {
  const isEmailValid = validateField(emailInput);
  const isPasswordValid = validateField(passwordInput);
  if (!isEmailValid || !isPasswordValid) {
    event.preventDefault();
    showToast('Please correct the highlighted fields.', 'error');
  }
});

if (loginButton) {
  loginButton.addEventListener('click', function () {
    this.disabled = true;
    window.setTimeout(() => {
      this.disabled = false;
    }, 1500);
  });
}
