// ==================== FORGOT PASSWORD PAGE INTERACTIONS ====================

AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

const forgotForm = document.getElementById('forgotPasswordForm');
const emailInput = document.getElementById('email');
const sendOtpButton = document.getElementById('sendOtpButton');
const buttonLabel = sendOtpButton?.querySelector('.btn-label');
const spinner = sendOtpButton?.querySelector('.spinner-border');
const toast = document.getElementById('toast');
const emailError = document.getElementById('emailError');

const showToast = (message) => {
    if (!toast) return;
    toast.textContent = message;
    toast.classList.add('show');
    clearTimeout(showToast.timeout);
    showToast.timeout = setTimeout(() => toast.classList.remove('show'), 2400);
};

const validateEmail = () => {
    const value = emailInput.value.trim();
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!value) {
        emailError.textContent = 'Email address is required.';
        emailInput.classList.add('is-invalid');
        return false;
    }
    if (!pattern.test(value)) {
        emailError.textContent = 'Please enter a valid email address.';
        emailInput.classList.add('is-invalid');
        return false;
    }
    emailError.textContent = '';
    emailInput.classList.remove('is-invalid');
    emailInput.classList.add('is-valid');
    return true;
};

emailInput?.addEventListener('input', validateEmail);

forgotForm?.addEventListener('submit', (event) => {
    event.preventDefault();
    if (!validateEmail()) {
        showToast('Please enter a valid email address.');
        return;
    }

    sendOtpButton.disabled = true;
    buttonLabel.classList.add('d-none');
    spinner.classList.remove('d-none');

    setTimeout(() => {
        sendOtpButton.disabled = false;
        buttonLabel.classList.remove('d-none');
        spinner.classList.add('d-none');
        showToast('OTP sent successfully. Check your inbox.');
        forgotForm.reset();
        emailInput.classList.remove('is-valid');
    }, 1400);
});
