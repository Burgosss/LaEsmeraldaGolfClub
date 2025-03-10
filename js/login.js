document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const loginButton = document.getElementById('login-button');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    // Validation functions
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPassword(password) {
        return password.length >= 8;
    }

    function showError(input, errorElement) {
        input.style.borderColor = '#e74c3c';
        errorElement.style.display = 'block';
    }

    function hideError(input, errorElement) {
        input.style.borderColor = '#ddd';
        errorElement.style.display = 'none';
    }

    function validateField(input, errorElement, validationFunction) {
        if (validationFunction(input.value)) {
            hideError(input, errorElement);
        } else {
            showError(input, errorElement);
        }
        checkFormValidity();
    }

    function checkFormValidity() {
        if (isValidEmail(emailInput.value) && isValidPassword(passwordInput.value)) {
            loginButton.disabled = false;
        } else {
            loginButton.disabled = true;
        }
    }

    emailInput.addEventListener('input', function() {
        validateField(emailInput, emailError, isValidEmail);
    });

    passwordInput.addEventListener('input', function() {
        validateField(passwordInput, passwordError, isValidPassword);
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        
        if (!loginButton.disabled) {
            // Create FormData object
            const formData = new FormData();
            formData.append('email', emailInput.value);
            formData.append('password', passwordInput.value);
            
            // Send data to server
            fetch('../login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect to member dashboard or home page on successful login
                    window.location.href = '../index.html';
                } else {
                    alert('Login failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Un error ha ocurrido. Inténte nuevamente');
            });
        }
    });

    // Initialize button state
    loginButton.disabled = true;
});