document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('membership-form');
    const usernameInput = document.getElementById('username');
    const firstNameInput = document.getElementById('firstName');
    const lastNameInput = document.getElementById('lastName');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');

    const membershipInput = document.getElementById('membership');
    const cardNumberInput = document.getElementById('cardNumber');
    const expiryDateInput = document.getElementById('expiryDate');
    const cvvInput = document.getElementById('cvv');
    const submitButton = document.getElementById('submit-btn');

    const usernameError = document.getElementById('username-error');
    const firstNameError = document.getElementById('firstName-error');
    const lastNameError = document.getElementById('lastName-error');
    const emailError = document.getElementById('email-error');
    const phoneError = document.getElementById('phone-error');
    const addressError = document.getElementById('address-error');
    const membershipError = document.getElementById('membership-error');

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhone(phone) {
        const phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phone.replace(/\D/g, ''));
    }

    function showError(input, errorElement) {
        input.style.borderColor = '#e74c3c';
        errorElement.style.display = 'block';
    }

    function hideError(input, errorElement) {
        input.style.borderColor = '#ddd';
        errorElement.style.display = 'none';
    }

    function validateField(input, errorElement, validationFunction = null) {
        if (validationFunction) {
            if (validationFunction(input.value)) {
                hideError(input, errorElement);
                return true;
            } else {
                showError(input, errorElement);
                return false;
            }
        } else {
            if (input.value.trim() !== '') {
                hideError(input, errorElement);
                return true;
            } else {
                showError(input, errorElement);
                return false;
            }
        }
    }

    function checkFormValidity() {
        const isUsernameValid = validateField(usernameInput, usernameError);
        const isFirstNameValid = validateField(firstNameInput, firstNameError);
        const isLastNameValid = validateField(lastNameInput, lastNameError);
        const isEmailValid = validateField(emailInput, emailError, isValidEmail);
        const isPhoneValid = validateField(phoneInput, phoneError, isValidPhone);
        const isAddressValid = validateField(addressInput, addressError);
        const isMembershipValid = validateField(membershipInput, membershipError, val => val !== '');

        submitButton.disabled = !(
            isUsernameValid && 
            isFirstNameValid && 
            isLastNameValid && 
            isEmailValid && 
            isPhoneValid && 
            isAddressValid && 
            isMembershipValid
        );
    }

    // Add event listeners for real-time validation
    usernameInput.addEventListener('input', checkFormValidity);
    firstNameInput.addEventListener('input', checkFormValidity);
    lastNameInput.addEventListener('input', checkFormValidity);
    emailInput.addEventListener('input', checkFormValidity);
    phoneInput.addEventListener('input', checkFormValidity);
    addressInput.addEventListener('input', checkFormValidity);
    membershipInput.addEventListener('change', checkFormValidity);

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (!submitButton.disabled) {
            const formData = new FormData();
            formData.append('username', usernameInput.value);
            formData.append('firstName', firstNameInput.value);
            formData.append('lastName', lastNameInput.value);
            formData.append('email', emailInput.value);
            formData.append('phone', phoneInput.value);
            formData.append('address', addressInput.value);
            formData.append('membership', membershipInput.value);
            
            fetch('../Usuario/register_member.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Membership registration successful!');
                    window.location.href = '../index.html';
                } else {
                    alert('Registration failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred during registration. Please try again.');
            });
        }
    });

    submitButton.disabled = true;
});