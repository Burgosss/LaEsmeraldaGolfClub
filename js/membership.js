document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('membership-form');
    const usernameInput = document.getElementById('username');
    const firstNameInput = document.getElementById('firstName');
    const lastNameInput = document.getElementById('lastName');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');
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
    const cardNumberError = document.getElementById('cardNumber-error');
    const expiryDateError = document.getElementById('expiryDate-error');
    const cvvError = document.getElementById('cvv-error');

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhone(phone) {
        const phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phone.replace(/\D/g, ''));
    }

    function isValidCardNumber(cardNumber) {
        return /^\d{16}$/.test(cardNumber.replace(/\s/g, ''));
    }

    function isValidExpiryDate(expiryDate) {
        const regex = /^(0[1-9]|1[0-2])\/([0-9]{2})$/;
        if (!regex.test(expiryDate)) return false;

        const [month, year] = expiryDate.split('/');
        const now = new Date();
        const currentYear = now.getFullYear() % 100;
        const currentMonth = now.getMonth() + 1;

        const expYear = parseInt(year, 10);
        const expMonth = parseInt(month, 10);

        return expYear > currentYear || (expYear === currentYear && expMonth >= currentMonth);
    }

    function isValidCVV(cvv) {
        return /^\d{3,4}$/.test(cvv);
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
            } else {
                showError(input, errorElement);
            }
        } else {
            if (input.value.trim() !== '') {
                hideError(input, errorElement);
            } else {
                showError(input, errorElement);
            }
        }
        checkFormValidity();
    }

    function checkFormValidity() {
        if (
            usernameInput.value.trim() !== '' &&
            firstNameInput.value.trim() !== '' &&
            lastNameInput.value.trim() !== '' &&
            isValidEmail(emailInput.value) &&
            isValidPhone(phoneInput.value) &&
            addressInput.value.trim() !== '' &&
            isValidCardNumber(cardNumberInput.value) &&
            isValidExpiryDate(expiryDateInput.value) &&
            isValidCVV(cvvInput.value)
        ) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    usernameInput.addEventListener('input', () => validateField(usernameInput, usernameError));
    firstNameInput.addEventListener('input', () => validateField(firstNameInput, firstNameError));
    lastNameInput.addEventListener('input', () => validateField(lastNameInput, lastNameError));
    emailInput.addEventListener('input', () => validateField(emailInput, emailError, isValidEmail));
    phoneInput.addEventListener('input', () => validateField(phoneInput, phoneError, isValidPhone));
    addressInput.addEventListener('input', () => validateField(addressInput, addressError));

    cardNumberInput.addEventListener('input', function () {
        let val = cardNumberInput.value.replace(/\D/g, '');
        let formattedVal = val.replace(/(\d{4})/g, '$1 ').trim();
        cardNumberInput.value = formattedVal.substring(0, 19);
        validateField(cardNumberInput, cardNumberError, isValidCardNumber);
    });

    expiryDateInput.addEventListener('input', function () {
        let val = expiryDateInput.value.replace(/\D/g, '');
        expiryDateInput.value = val.length > 2 ? `${val.substring(0, 2)}/${val.substring(2, 4)}` : val;
        validateField(expiryDateInput, expiryDateError, isValidExpiryDate);
    });

    cvvInput.addEventListener('input', function () {
        cvvInput.value = cvvInput.value.replace(/\D/g, '').substring(0, 4);
        validateField(cvvInput, cvvError, isValidCVV);
    });

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
            
            fetch('../Usuario/register_member.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Membership registration successful! Redirecting to homepage...');
                    window.location.href = '../index.html';
                } else {
                    alert('Registration error: ' + data.message);
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