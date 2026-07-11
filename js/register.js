// ==================== REGISTER PAGE INTERACTIONS ====================

AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

const signupForm = document.getElementById('signupForm');
const signupButton = document.getElementById('signupButton');
const buttonLabel = signupButton?.querySelector('.btn-label') || null;
const spinner = signupButton?.querySelector('.spinner-border') || null;
const toast = document.getElementById('toast');

const fullName = document.getElementById('fullName');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const role = document.getElementById('role');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const terms = document.getElementById('terms');

const strengthBar = document.getElementById('strengthBar');
const lengthReq = document.getElementById('lengthReq');
const numberReq = document.getElementById('numberReq');
const symbolReq = document.getElementById('symbolReq');

const showToast = (message) => {
  if (!toast) return;
  toast.textContent = message;
  toast.classList.add('show');
  clearTimeout(showToast.timeout);
  showToast.timeout = setTimeout(() => toast.classList.remove('show'), 2400);
};

const setError = (field, message) => {
  field.classList.add('is-invalid');
  field.classList.remove('is-valid');
  const errorId = `${field.id}Error`;
  const errorEl = document.getElementById(errorId);
  if (errorEl) errorEl.textContent = message;
};

const clearError = (field) => {
  field.classList.remove('is-invalid');
  field.classList.add('is-valid');
  const errorId = `${field.id}Error`;
  const errorEl = document.getElementById(errorId);
  if (errorEl) errorEl.textContent = '';
};

const validateRequired = (field, message) => {
  if (!field || !field.value.trim()) {
    if (field) setError(field, message);
    return false;
  }
  if (field) clearError(field);
  return true;
};

const validateEmail = () => {
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.value.trim()) {
    setError(email, 'Email address is required.');
    return false;
  }
  if (!pattern.test(email.value.trim())) {
    setError(email, 'Please enter a valid email address.');
    return false;
  }
  clearError(email);
  return true;
};

const validatePhone = () => {
  const pattern = /^[0-9]{10}$/;
  if (!phone.value.trim()) {
    setError(phone, 'Phone number is required.');
    return false;
  }
  if (!pattern.test(phone.value.trim())) {
    setError(phone, 'Please enter a valid 10-digit phone number.');
    return false;
  }
  clearError(phone);
  return true;
};

const updatePasswordStrength = () => {
  const value = password.value;
  const lengthValid = value.length >= 8;
  const numberValid = /\d/.test(value);
  const symbolValid = /[^A-Za-z0-9]/.test(value);

  lengthReq.classList.toggle('valid', lengthValid);
  numberReq.classList.toggle('valid', numberValid);
  symbolReq.classList.toggle('valid', symbolValid);

  const score = [lengthValid, numberValid, symbolValid].filter(Boolean).length;
  const percent = (score / 3) * 100;
  if (strengthBar) {
    strengthBar.style.width = `${percent}%`;
    if (percent < 40) {
      strengthBar.style.background = 'linear-gradient(135deg, #ef4444, #fb923c)';
    } else if (percent < 80) {
      strengthBar.style.background = 'linear-gradient(135deg, #f59e0b, #facc15)';
    } else {
      strengthBar.style.background = 'linear-gradient(135deg, #10b981, #34d399)';
    }
  }

  return lengthValid && numberValid && symbolValid;
};

const validatePassword = () => {
  const isStrong = updatePasswordStrength();
  if (!password.value.trim()) {
    setError(password, 'Password is required.');
    return false;
  }
  if (!isStrong) {
    setError(password, 'Please meet all password requirements.');
    return false;
  }
  clearError(password);
  return true;
};

const validateConfirmPassword = () => {
  if (!confirmPassword.value.trim()) {
    setError(confirmPassword, 'Please confirm your password.');
    return false;
  }
  if (confirmPassword.value !== password.value) {
    setError(confirmPassword, 'Passwords do not match.');
    return false;
  }
  clearError(confirmPassword);
  return true;
};

const validateTerms = () => {
  if (!terms.checked) {
    const termsError = document.getElementById('termsError');
    if (termsError) termsError.textContent = 'You must accept the terms to continue.';
    return false;
  }
  const termsError = document.getElementById('termsError');
  if (termsError) termsError.textContent = '';
  return true;
};

document.querySelectorAll('.password-toggle').forEach((button) => {
  button.addEventListener('click', () => {
    const targetInput = document.getElementById(button.id === 'passwordToggle' ? 'password' : 'confirmPassword');
    if (!targetInput) return;
    const isPassword = targetInput.type === 'password';
    targetInput.type = isPassword ? 'text' : 'password';
    const icon = button.querySelector('i');
    if (icon) icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
  });
});

[fullName, email, phone, role, password, confirmPassword].forEach((field) => {
  field.addEventListener('input', () => {
    if (field === password) {
      validatePassword();
    } else if (field === confirmPassword) {
      validateConfirmPassword();
    } else if (field === email) {
      validateEmail();
    } else if (field === phone) {
      validatePhone();
    } else {
      validateRequired(field, `${field.previousElementSibling?.textContent || 'This field'} is required.`);
    }
  });
});

password.addEventListener('input', updatePasswordStrength);

signupForm?.addEventListener('submit', (event) => {
  event.preventDefault();

  const isFullNameValid = validateRequired(fullName, 'Full name is required.');
  const isEmailValid = validateEmail();
  const isPhoneValid = validatePhone();
  const isPasswordValid = validatePassword();
  const isConfirmPasswordValid = validateConfirmPassword();
  const isTermsValid = validateTerms();

  if (!isFullNameValid || !isEmailValid || !isPhoneValid || !isPasswordValid || !isConfirmPasswordValid || !isTermsValid) {
    showToast('Please correct the highlighted fields.');
    return;
  }

  if (signupButton) signupButton.disabled = true;
  if (buttonLabel) buttonLabel.classList.add('d-none');
  if (spinner) spinner.classList.remove('d-none');

  setTimeout(() => {
    if (signupButton) signupButton.disabled = false;
    if (buttonLabel) buttonLabel.classList.remove('d-none');
    if (spinner) spinner.classList.add('d-none');
    showToast('Account created successfully. Welcome aboard!');
    signupForm.reset();
    [lengthReq, numberReq, symbolReq].forEach((item) => item.classList.remove('valid'));
    if (strengthBar) strengthBar.style.width = '0%';
  }, 1400);
});
