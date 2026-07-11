// ==================== LOGIN PAGE INTERACTIONS ====================

AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const passwordToggle = document.getElementById('passwordToggle');
const rememberCheckbox = document.getElementById('remember');
const rememberHint = document.getElementById('rememberHint');
const loginButton = document.getElementById('loginButton');
const buttonLabel = loginButton?.querySelector('.btn-label') || null;
const spinner = loginButton?.querySelector('.spinner-border') || null;
const toast = document.getElementById('toast');

const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');

const setError = (input, errorElement, message) => {
  input.classList.add('is-invalid');
  input.classList.remove('is-valid');
  if (errorElement) errorElement.textContent = message;
};

const clearError = (input, errorElement) => {
  input.classList.remove('is-invalid');
  input.classList.add('is-valid');
  if (errorElement) errorElement.textContent = '';
};

const showToast = (message) => {
  if (!toast) return;
  toast.textContent = message;
  toast.classList.add('show');
  clearTimeout(showToast.timeout);
  showToast.timeout = setTimeout(() => toast.classList.remove('show'), 2400);
};

passwordToggle?.addEventListener('click', () => {
  const isPassword = passwordInput.type === 'password';
  passwordInput.type = isPassword ? 'text' : 'password';
  const icon = passwordToggle.querySelector('i');
  if (icon) icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
  passwordToggle.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
});

rememberCheckbox?.addEventListener('change', () => {
  if (rememberCheckbox.checked && rememberHint) {
    rememberHint.textContent = 'You will stay signed in on this device.';
  } else if (rememberHint) {
    rememberHint.textContent = 'We will keep your session secure on this device.';
  }
});

const validateField = (input) => {
  const value = input.value.trim();

  if (!value) {
    if (input.id === 'email') {
      setError(input, emailError, 'Email address is required.');
    } else {
      setError(input, passwordError, 'Password is required.');
    }
    return false;
  }

  if (input.id === 'email') {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(value)) {
      setError(input, emailError, 'Please enter a valid email address.');
      return false;
    }
    clearError(input, emailError);
    return true;
  }

  if (value.length < 8) {
    setError(input, passwordError, 'Password must be at least 8 characters.');
    return false;
  }

  clearError(input, passwordError);
  return true;
};

emailInput?.addEventListener('input', () => validateField(emailInput));
passwordInput?.addEventListener('input', () => validateField(passwordInput));

loginForm?.addEventListener('submit', (event) => {
  event.preventDefault();

  const isEmailValid = validateField(emailInput);
  const isPasswordValid = validateField(passwordInput);

  if (!isEmailValid || !isPasswordValid) {
    showToast('Please correct the highlighted fields.');
    return;
  }

  if (loginButton) loginButton.disabled = true;
  if (buttonLabel) buttonLabel.classList.add('d-none');
  if (spinner) spinner.classList.remove('d-none');

  window.setTimeout(() => {
    if (loginButton) loginButton.disabled = false;
    if (buttonLabel) buttonLabel.classList.remove('d-none');
    if (spinner) spinner.classList.add('d-none');
    showToast('Login successful. Welcome back!');
    loginForm.reset();
    if (rememberHint) rememberHint.textContent = 'We will keep your session secure on this device.';
    [emailInput, passwordInput].forEach((input) => input.classList.remove('is-valid'));
  }, 1400);
});
