// ==================== OTP VERIFICATION PAGE INTERACTIONS ====================

AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

const otpForm = document.getElementById('otpForm');
const otpInputs = Array.from(document.querySelectorAll('.otp-input'));
const verifyButton = document.getElementById('verifyButton');
const buttonLabel = verifyButton?.querySelector('.btn-label');
const spinner = verifyButton?.querySelector('.spinner-border');
const countdownEl = document.getElementById('countdown');
const resendOtpButton = document.getElementById('resendOtpButton');
const toast = document.getElementById('toast');

let timeLeft = 59;

const showToast = (message) => {
    if (!toast) return;
    toast.textContent = message;
    toast.classList.add('show');
    clearTimeout(showToast.timeout);
    showToast.timeout = setTimeout(() => toast.classList.remove('show'), 2400);
};

const startCountdown = () => {
    const timer = setInterval(() => {
        timeLeft -= 1;
        if (countdownEl) {
            countdownEl.textContent = `00:${String(timeLeft).padStart(2, '0')}`;
        }
        if (timeLeft <= 0) {
            clearInterval(timer);
            if (resendOtpButton) resendOtpButton.disabled = false;
            if (countdownEl) countdownEl.textContent = '00:00';
        }
    }, 1000);
};

otpInputs.forEach((input, index) => {
    input.addEventListener('input', (event) => {
        const value = event.target.value.replace(/\D/g, '').slice(0, 1);
        event.target.value = value;
        if (value && index < otpInputs.length - 1) {
            otpInputs[index + 1].focus();
        }
    });

    input.addEventListener('keydown', (event) => {
        if (event.key === 'Backspace' && !input.value && index > 0) {
            otpInputs[index - 1].focus();
            otpInputs[index - 1].value = '';
        }
    });
});

otpForm?.addEventListener('paste', (event) => {
    event.preventDefault();
    const paste = (event.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '').slice(0, 6);
    paste.split('').forEach((digit, index) => {
        if (otpInputs[index]) otpInputs[index].value = digit;
    });
    const nextIndex = Math.min(paste.length, otpInputs.length - 1);
    otpInputs[nextIndex].focus();
});

resendOtpButton?.addEventListener('click', () => {
    timeLeft = 59;
    startCountdown();
    resendOtpButton.disabled = true;
    showToast('A new OTP has been sent.');
});

otpForm?.addEventListener('submit', (event) => {
    event.preventDefault();
    const otpValue = otpInputs.map((input) => input.value).join('');
    if (otpValue.length < 6) {
        showToast('Please enter the complete 6-digit OTP.');
        return;
    }

    verifyButton.disabled = true;
    buttonLabel.classList.add('d-none');
    spinner.classList.remove('d-none');

    setTimeout(() => {
        verifyButton.disabled = false;
        buttonLabel.classList.remove('d-none');
        spinner.classList.add('d-none');
        showToast('OTP verified successfully.');
        otpForm.reset();
    }, 1400);
});

startCountdown();
