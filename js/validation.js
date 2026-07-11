/* =========================================================
   VALIDATION.JS
   Purpose: Adds simple form validation for login and signup pages.
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  const forms = document.querySelectorAll('form[novalidate], form[data-form], form[data-validate]');

  const getFieldMessage = (field) => {
    const value = field.type === 'checkbox' ? field.checked : field.value.trim();

    if (field.required && !value) {
      return 'This field is required.';
    }

    if (field.type === 'email' && value) {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(value)) {
        return 'Please enter a valid email address.';
      }
    }

    if (field.type === 'password' && field.id.toLowerCase().includes('confirm')) {
      const passwordField = field.form?.querySelector('input[type="password"]:not([id*="confirm"]):not([name*="confirm"])');
      if (passwordField && value !== passwordField.value.trim()) {
        return 'Passwords do not match.';
      }
    }

    if (field.minLength > 0 && value.length < field.minLength) {
      return `Please enter at least ${field.minLength} characters.`;
    }

    return '';
  };

  const setFieldState = (field, message) => {
    const feedback = field.form?.querySelector(`#${field.id}Error`) || field.parentElement?.querySelector('.invalid-feedback');
    field.classList.toggle('is-invalid', Boolean(message));
    field.setAttribute('aria-invalid', message ? 'true' : 'false');

    if (feedback) {
      feedback.textContent = message;
      feedback.style.display = message ? 'block' : '';
    }
  };

  const validateForm = (form) => {
    const fields = form.querySelectorAll('input, select, textarea');
    let isValid = true;

    fields.forEach((field) => {
      const message = getFieldMessage(field);
      setFieldState(field, message);
      if (message) {
        isValid = false;
      }
    });

    return isValid;
  };

  forms.forEach((form) => {
    const fields = form.querySelectorAll('input, select, textarea');

    fields.forEach((field) => {
      field.addEventListener('input', () => setFieldState(field, ''));
      field.addEventListener('blur', () => {
        const message = getFieldMessage(field);
        setFieldState(field, message);
      });
    });

    form.addEventListener('submit', (event) => {
      if (!validateForm(form)) {
        event.preventDefault();
        const firstInvalid = form.querySelector('.is-invalid');
        firstInvalid?.focus();
      }
    });
  });
});
