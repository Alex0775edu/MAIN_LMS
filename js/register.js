// ==================== REGISTER PAGE INTERACTIONS ====================

const registerForm = document.getElementById('registerForm');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm_password');
const strengthBar = document.getElementById('strengthBar');
const requirementItems = Array.from(document.querySelectorAll('#passwordChecklist li'));
const toastContainer = document.getElementById('toast');

const showToast = (message, type = 'success') => {
  if (!toastContainer) return;
  toastContainer.textContent = message;
  toastContainer.className = `toast-notification ${type}`;
  toastContainer.classList.add('show');
  window.clearTimeout(showToast.timeout);
  showToast.timeout = window.setTimeout(() => toastContainer.classList.remove('show'), 3200);
};

const setError = (field, message) => {
  if (!field) return;
  field.classList.add('is-invalid');
  field.classList.remove('is-valid');
};

const clearError = (field) => {
  if (!field) return;
  field.classList.remove('is-invalid');
  field.classList.add('is-valid');
};

const updatePasswordStrength = () => {
  const value = passwordInput?.value || '';
  const checks = [
    { test: value.length >= 8, item: requirementItems.find((item) => item.getAttribute('data-pass') === 'length') },
    { test: /[A-Z]/.test(value), item: requirementItems.find((item) => item.getAttribute('data-pass') === 'uppercase') },
    { test: /[a-z]/.test(value), item: requirementItems.find((item) => item.getAttribute('data-pass') === 'lowercase') },
    { test: /[0-9]/.test(value), item: requirementItems.find((item) => item.getAttribute('data-pass') === 'number') },
    { test: /[^A-Za-z0-9]/.test(value), item: requirementItems.find((item) => item.getAttribute('data-pass') === 'special') }
  ];

  checks.forEach(({ test, item }) => {
    if (item) {
      item.classList.toggle('valid', test);
    }
  });

  const score = checks.filter(({ test }) => test).length;
  const percent = (score / checks.length) * 100;
  if (strengthBar) {
    strengthBar.style.width = `${percent}%`;
    strengthBar.style.background = percent < 60 ? 'linear-gradient(135deg, #ff6b6b, #ffb703)' : 'linear-gradient(135deg, #28c76f, #6c63ff)';
  }
  return score === checks.length;
};

document.querySelectorAll('.password-toggle').forEach((button) => {
  button.addEventListener('click', () => {
    const targetId = button.getAttribute('data-toggle-for');
    const targetInput = document.getElementById(targetId);
    if (!targetInput) return;
    const isPassword = targetInput.type === 'password';
    targetInput.type = isPassword ? 'text' : 'password';
    const icon = button.querySelector('i');
    if (icon) icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
  });
});

const validateField = (field, message) => {
  if (!field) return true;
  if (!field.value.trim()) {
    setError(field, message);
    return false;
  }
  clearError(field);
  return true;
};

const validateEmail = () => {
  const field = document.getElementById('email');
  if (!field) return true;
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!field.value.trim()) {
    setError(field, 'Email address is required.');
    return false;
  }
  if (!pattern.test(field.value.trim())) {
    setError(field, 'Please enter a valid email address.');
    return false;
  }
  clearError(field);
  return true;
};

const validatePassword = () => {
  const strong = updatePasswordStrength();
  if (!passwordInput?.value.trim()) {
    setError(passwordInput, 'Password is required.');
    return false;
  }
  if (!strong) {
    setError(passwordInput, 'Please meet all password requirements.');
    return false;
  }
  clearError(passwordInput);
  return true;
};

const validateConfirmPassword = () => {
  if (!confirmPasswordInput?.value.trim()) {
    setError(confirmPasswordInput, 'Please confirm your password.');
    return false;
  }
  if (confirmPasswordInput.value !== passwordInput?.value) {
    setError(confirmPasswordInput, 'Passwords do not match.');
    return false;
  }
  clearError(confirmPasswordInput);
  return true;
};

const validateTerms = () => {
  const termsField = document.getElementById('terms');
  if (!termsField?.checked) {
    setError(termsField, 'Please accept the terms to continue.');
    return false;
  }
  termsField.classList.remove('is-invalid');
  return true;
};

['fullname', 'username', 'email', 'phone', 'country', 'password', 'confirm_password'].forEach((fieldId) => {
  const field = document.getElementById(fieldId);
  field?.addEventListener('input', () => {
    if (fieldId === 'password') {
      validatePassword();
    } else if (fieldId === 'confirm_password') {
      validateConfirmPassword();
    } else if (fieldId === 'email') {
      validateEmail();
    } else {
      validateField(field, 'This field is required.');
    }
  });
});

passwordInput?.addEventListener('input', updatePasswordStrength);

registerForm?.addEventListener('submit', (event) => {
  const isFullNameValid = validateField(document.getElementById('fullname'), 'Full name is required.');
  const isUsernameValid = validateField(document.getElementById('username'), 'Username is required.');
  const isEmailValid = validateEmail();
  const isPhoneValid = validateField(document.getElementById('phone'), 'Phone number is required.');
  const isCountryValid = validateField(document.getElementById('country'), 'Please select your country.');
  const isPasswordValid = validatePassword();
  const isConfirmPasswordValid = validateConfirmPassword();
  const isTermsValid = validateTerms();

  if (!isFullNameValid || !isUsernameValid || !isEmailValid || !isPhoneValid || !isCountryValid || !isPasswordValid || !isConfirmPasswordValid || !isTermsValid) {
    event.preventDefault();
    showToast('Please correct the highlighted fields.', 'error');
  }
});
