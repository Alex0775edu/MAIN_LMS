// ==================== RESET PASSWORD PAGE INTERACTIONS ====================

AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

const form = document.getElementById('resetPasswordForm');
const newPassword = document.getElementById('new_password');
const confirmPassword = document.getElementById('confirm_password');
const strengthBar = document.getElementById('strengthBar');
const requirementItems = Array.from(document.querySelectorAll('#passwordChecklist li'));
const resetButton = document.getElementById('resetButton');
const buttonLabel = resetButton?.querySelector('.btn-label');
const spinner = resetButton?.querySelector('.spinner-border');
const toast = document.getElementById('toast');

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

const updatePasswordStrength = () => {
    const value = newPassword.value;
    const checks = {
        length: value.length >= 8,
        uppercase: /[A-Z]/.test(value),
        lowercase: /[a-z]/.test(value),
        number: /\d/.test(value),
        special: /[^A-Za-z0-9]/.test(value)
    };

    Object.entries(checks).forEach(([key, passed]) => {
        const item = requirementItems.find((entry) => entry.dataset.pass === key);
        if (item) item.classList.toggle('valid', passed);
    });

    const passedCount = Object.values(checks).filter(Boolean).length;
    const percent = (passedCount / 5) * 100;
    strengthBar.style.width = `${percent}%`;
    if (percent < 40) {
        strengthBar.style.background = 'linear-gradient(135deg, #ef4444, #fb923c)';
    } else if (percent < 80) {
        strengthBar.style.background = 'linear-gradient(135deg, #f59e0b, #facc15)';
    } else {
        strengthBar.style.background = 'linear-gradient(135deg, #10b981, #34d399)';
    }

    return passedCount === 5;
};

const validatePassword = () => {
    if (!newPassword.value.trim()) {
        setError(newPassword, 'Please enter a new password.');
        return false;
    }
    if (!updatePasswordStrength()) {
        setError(newPassword, 'Please meet all password requirements.');
        return false;
    }
    clearError(newPassword);
    return true;
};

const validateConfirmPassword = () => {
    if (!confirmPassword.value.trim()) {
        setError(confirmPassword, 'Please confirm your password.');
        return false;
    }
    if (confirmPassword.value !== newPassword.value) {
        setError(confirmPassword, 'Passwords do not match.');
        return false;
    }
    clearError(confirmPassword);
    return true;
};

document.querySelectorAll('.password-toggle').forEach((button) => {
    button.addEventListener('click', () => {
        const targetInput = document.getElementById(button.dataset.toggleFor);
        if (!targetInput) return;
        const isPassword = targetInput.type === 'password';
        targetInput.type = isPassword ? 'text' : 'password';
        const icon = button.querySelector('i');
        icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
    });
});

newPassword?.addEventListener('input', () => {
    validatePassword();
    if (confirmPassword.value) validateConfirmPassword();
});
confirmPassword?.addEventListener('input', validateConfirmPassword);

form?.addEventListener('submit', (event) => {
    event.preventDefault();
    const isPasswordValid = validatePassword();
    const isConfirmValid = validateConfirmPassword();

    if (!isPasswordValid || !isConfirmValid) {
        showToast('Please correct the password fields.');
        return;
    }

    resetButton.disabled = true;
    buttonLabel.classList.add('d-none');
    spinner.classList.remove('d-none');

    setTimeout(() => {
        resetButton.disabled = false;
        buttonLabel.classList.remove('d-none');
        spinner.classList.add('d-none');
        showToast('Password reset successfully.');
        form.reset();
        requirementItems.forEach((item) => item.classList.remove('valid'));
        strengthBar.style.width = '0%';
    }, 1400);
});
