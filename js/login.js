document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const loginButton = document.getElementById('login-button');

    // Email validation function
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Show error message
    function showError(input, errorElement) {
        input.style.borderColor = '#e74c3c';
        errorElement.style.display = 'block';
    }

    // Hide error message
    function hideError(input, errorElement) {
        input.style.borderColor = '#ddd';
        errorElement.style.display = 'none';
    }

    // Validate inputs and enable/disable button
    function validateForm() {
        const emailValid = isValidEmail(emailInput.value);
        const passwordValid = passwordInput.value.length >= 8;

        if (emailValid) {
            hideError(emailInput, emailError);
        } else {
            showError(emailInput, emailError);
        }

        if (passwordValid) {
            hideError(passwordInput, passwordError);
        } else {
            showError(passwordInput, passwordError);
        }

        // Enable the button only if all fields are valid
        loginButton.disabled = !(emailValid && passwordValid);
    }

    // Event listeners for input validation
    emailInput.addEventListener('input', validateForm);
    passwordInput.addEventListener('input', validateForm);

    // Form submission
    form.addEventListener('submit', function(e) {
        if (loginButton.disabled) {
            e.preventDefault(); // Prevent submission if validation fails
        } else {
            e.preventDefault();
            alert('Login successful! Redirecting to homepage...');
            window.location.href = '../index.html';
        }
    });
});
