const toastContainer = document.getElementById('toastContainer');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const passwordToggles = document.querySelectorAll('.password-toggle');

const showToast = (message, type = 'success') => {
  if (!toastContainer) {
    return;
  }

  const toast = document.createElement('div');
  toast.className = `toast-message ${type}`;
  toast.setAttribute('role', 'status');
  toast.setAttribute('aria-live', 'polite');
  toast.innerHTML = `<strong>${type === 'success' ? 'Success' : 'Error'}</strong><p>${message}</p>`;
  toastContainer.appendChild(toast);
  setTimeout(() => {
    toast.classList.add('toast-hide');
    toast.addEventListener('transitionend', () => toast.remove());
  }, 3600);
};

const getStrength = (password) => {
  const checks = [
    /.{8,}/,
    /[A-Z]/,
    /[a-z]/,
    /[0-9]/,
    /[^A-Za-z0-9]/,
  ];
  return checks.reduce((score, regex) => score + (regex.test(password) ? 1 : 0), 0);
};

const updatePasswordMeter = () => {
  const passwordInput = document.getElementById('registerPassword');
  const strengthLabel = document.getElementById('passwordStrength');
  const track = document.querySelector('.password-meter__track');
  if (!passwordInput || !strengthLabel || !track) {
    return;
  }

  const score = getStrength(passwordInput.value);
  const percentage = (score / 5) * 100;
  track.style.setProperty('--password-meter', `${percentage}%`);
  track.style.setProperty('--password-bg', score < 3 ? '#ff6b6b' : score < 4 ? '#ffb703' : '#28c76f');

  const strengthText = ['Very weak', 'Weak', 'Fair', 'Strong', 'Very strong'];
  strengthLabel.textContent = strengthText[score === 0 ? 0 : score - 1];
  track.style.setProperty('--password-fill', `${percentage}%`);

  const criteria = [
    { id: 'criteriaLength', regex: /.{8,}/ },
    { id: 'criteriaUpper', regex: /[A-Z]/ },
    { id: 'criteriaLower', regex: /[a-z]/ },
    { id: 'criteriaNumber', regex: /[0-9]/ },
    { id: 'criteriaSpecial', regex: /[^A-Za-z0-9]/ },
  ];
  criteria.forEach((item) => {
    const element = document.getElementById(item.id);
    if (!element) return;
    element.classList.toggle('valid', item.regex.test(passwordInput.value));
  });
};

const validateEmail = (value) => /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(value);
const validatePhone = (value) => /^\+?\d{8,15}$/.test(value);
const validateUsername = (value) => /^[a-zA-Z0-9._-]{3,20}$/.test(value);

const setFieldState = (input, message = '', type = 'error') => {
  if (!input) {
    return;
  }

  const feedback = document.getElementById(`${input.id}Error`);
  input.classList.remove('is-invalid', 'is-valid');
  if (message) {
    input.classList.add(type === 'error' ? 'is-invalid' : 'is-valid');
  }
  if (feedback) {
    feedback.textContent = message;
  }
};

const validateLoginForm = () => {
  const emailInput = document.getElementById('loginEmail');
  const passwordInput = document.getElementById('loginPassword');
  let valid = true;

  if (!emailInput.value.trim()) {
    setFieldState(emailInput, 'Please enter your email address.');
    valid = false;
  } else if (!validateEmail(emailInput.value)) {
    setFieldState(emailInput, 'Enter a valid email address.');
    valid = false;
  } else {
    setFieldState(emailInput, '', 'success');
  }

  if (!passwordInput.value.trim()) {
    setFieldState(passwordInput, 'Please enter your password.');
    valid = false;
  } else {
    setFieldState(passwordInput, '', 'success');
  }

  return valid;
};

const validateRegisterForm = () => {
  const fullName = document.getElementById('fullName');
  const username = document.getElementById('username');
  const email = document.getElementById('registerEmail');
  const phone = document.getElementById('phone');
  const country = document.getElementById('country');
  const state = document.getElementById('state');
  const city = document.getElementById('city');
  const gender = document.getElementById('gender');
  const dob = document.getElementById('dob');
  const password = document.getElementById('registerPassword');
  const confirmPassword = document.getElementById('confirmPassword');
  const terms = document.getElementById('termsAgreement');
  let valid = true;

  if (!fullName.value.trim()) {
    setFieldState(fullName, 'Full name is required.');
    valid = false;
  } else {
    setFieldState(fullName, '', 'success');
  }

  if (!username.value.trim()) {
    setFieldState(username, 'Username is required.');
    valid = false;
  } else if (!validateUsername(username.value)) {
    setFieldState(username, 'Use 3-20 letters, numbers, . or _ .');
    valid = false;
  } else {
    setFieldState(username, '', 'success');
  }

  if (!email.value.trim()) {
    setFieldState(email, 'Email address is required.');
    valid = false;
  } else if (!validateEmail(email.value)) {
    setFieldState(email, 'Enter a valid email address.');
    valid = false;
  } else {
    setFieldState(email, '', 'success');
  }

  if (!phone.value.trim()) {
    setFieldState(phone, 'Phone number is required.');
    valid = false;
  } else if (!validatePhone(phone.value)) {
    setFieldState(phone, 'Enter a valid phone number with country code.');
    valid = false;
  } else {
    setFieldState(phone, '', 'success');
  }

  if (!country.value) {
    setFieldState(country, 'Please select a country.');
    valid = false;
  } else {
    setFieldState(country, '', 'success');
  }

  if (!state.value) {
    setFieldState(state, 'Please choose your state.');
    valid = false;
  } else {
    setFieldState(state, '', 'success');
  }

  if (!city.value.trim()) {
    setFieldState(city, 'Please enter your city.');
    valid = false;
  } else {
    setFieldState(city, '', 'success');
  }

  if (!gender.value) {
    setFieldState(gender, 'Please select gender.');
    valid = false;
  } else {
    setFieldState(gender, '', 'success');
  }

  if (!dob.value) {
    setFieldState(dob, 'Date of birth is required.');
    valid = false;
  } else {
    setFieldState(dob, '', 'success');
  }

  const passwordScore = getStrength(password.value);
  if (!password.value.trim()) {
    setFieldState(password, 'Password is required.');
    valid = false;
  } else if (passwordScore < 4) {
    setFieldState(password, 'Password must meet the security requirements.');
    valid = false;
  } else {
    setFieldState(password, '', 'success');
  }

  if (!confirmPassword.value.trim()) {
    setFieldState(confirmPassword, 'Confirm your password.');
    valid = false;
  } else if (password.value !== confirmPassword.value) {
    setFieldState(confirmPassword, 'Passwords do not match.');
    valid = false;
  } else {
    setFieldState(confirmPassword, '', 'success');
  }

  if (!terms.checked) {
    const termsError = document.getElementById('termsError');
    if (termsError) {
      termsError.textContent = 'Please accept the terms to continue.';
    }
    valid = false;
  } else {
    const termsError = document.getElementById('termsError');
    if (termsError) {
      termsError.textContent = '';
    }
  }

  return valid;
};

const resetButtonState = (button) => {
  button.disabled = false;
  button.textContent = button.getAttribute('data-original-text') || button.textContent;
};

const setLoadingState = (button) => {
  button.setAttribute('data-original-text', button.textContent);
  button.textContent = button.getAttribute('data-loading-text');
  button.disabled = true;
};

const handleFormSubmit = (event, formType) => {
  event.preventDefault();
  const button = event.submitter || event.target.querySelector('button[type="submit"]');

  if (button) {
    setLoadingState(button);
  }

  const validator = formType === 'login' ? validateLoginForm : validateRegisterForm;
  const valid = validator();

  setTimeout(() => {
    if (valid) {
      showToast(formType === 'login' ? 'Signed in successfully.' : 'Account created successfully.', 'success');
      event.target.reset();
      const inputs = event.target.querySelectorAll('input, select');
      inputs.forEach((input) => input.classList.remove('is-valid'));
    } else {
      showToast('Please fix the highlighted fields and try again.', 'error');
    }
    if (button) {
      resetButtonState(button);
    }
  }, 650);
};

passwordToggles.forEach((toggle) => {
  toggle.addEventListener('click', () => {
    const targetId = toggle.dataset.target;
    const input = document.getElementById(targetId);
    if (!input) return;
    const type = input.type === 'password' ? 'text' : 'password';
    input.type = type;
    toggle.innerHTML = `<i class="fas fa-${type === 'password' ? 'eye' : 'eye-slash'}"></i>`;
    toggle.setAttribute('aria-label', `${type === 'password' ? 'Show' : 'Hide'} password`);
  });
});

if (registerForm) {
  const passwordInput = document.getElementById('registerPassword');
  passwordInput?.addEventListener('input', updatePasswordMeter);
  registerForm.addEventListener('submit', (event) => handleFormSubmit(event, 'register'));
}

if (loginForm) {
  loginForm.addEventListener('submit', (event) => handleFormSubmit(event, 'login'));
}

const inputSelectors = 'input[required], select[required]';
const allInputs = document.querySelectorAll(inputSelectors);

allInputs.forEach((input) => {
  input.addEventListener('blur', () => {
    if (!input.value.trim()) {
      setFieldState(input, 'This field is required.');
    }
  });
  input.addEventListener('focus', () => {
    setFieldState(input, '');
  });
});

window.addEventListener('keydown', (event) => {
  if (event.key === 'Enter' && document.activeElement.tagName === 'BUTTON') {
    event.preventDefault();
  }
});
