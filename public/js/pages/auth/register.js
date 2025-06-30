$(document).ready(function() {
    // Clear individual error messages on input
    $("#username").on("input", function() {
        $("#usernameError").text("");
    });

    $("#email").on("input", function() {
        $("#emailError").text("");
    });

    $("#password").on("input", function() {
        $("#passwordError").text("");
    });

    $("#confirmPassword").on("input", function() {
        $("#confirmPasswordError").text("");
    });

    $("#firstName").on("input", function() {
        $("#firstNameError").text("");
    });

    $("#lastName").on("input", function() {
        $("#lastNameError").text("");
    });

    $("#street").on("input", function() {
        $("#streetError").text("");
    });

    $("#postalCode").on("input", function() {
        $("#postalCodeError").text("");
    });

    $("#city").on("input", function() {
        $("#cityError").text("");
    });

    $("#country").on("input", function() {
        $("#countryError").text("");
    });

    $("#phone").on("input", function() {
        $("#phoneError").text("");
    });

    $("#birthdate").on("change input", function() {
        $("#birthdateError").text("");
    });

    $('#register-form').submit(function(e) {
        e.preventDefault();

        let isValid = checkValidation();

        if (isValid) {
            $.ajax({
                url: "do_register",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response?.status == "success") {
                        window.location.href = window.location.origin + '/auth/login';
                    } else {
                        toastr.error(response.message);
                    }
                }
            });   
        }
    });

    function checkValidation() {
        // Clear previous errors
        $(".error").text("");

        let result = true;

        const username = $("#username").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();
        const confirmPassword = $("#confirmPassword").val().trim();
        const firstName = $("#firstName").val().trim();
        const lastName = $("#lastName").val().trim();
        const street = $("#street").val().trim();
        const postalCode = $("#postalCode").val().trim();
        const city = $("#city").val().trim();
        const country = $("#country").val().trim();
        const phone = $("#phone").val().trim();
        const birthdate = $("#birthdate").val().trim();

        if (username === "") {
            $("#usernameError").text("Username is required.");
            result = false;
        }

        if (email === "") {
            $("#emailError").text("Email is required.");
            result = false;
        } else if (!validateEmail(email)) {
            $("#emailError").text("Invalid email format.");
            result = false;
        }

        // Password validation
        if (password === "") {
            $("#passwordError").text("Password is required.");
            result = false;
        } else if (!validatePassword(password)) {
            $("#passwordError").text("Password must be at least 8 characters long and include uppercase, lowercase, number, and symbol.");
            result = false;
        }

        // Confirm Password validation
        if (confirmPassword === "") {
            $("#confirmPasswordError").text("Please confirm your password.");
            result = false;
        } else if (password !== confirmPassword) {
            $("#confirmPasswordError").text("Passwords do not match.");
            result = false;
        }

        // Validation Rules
        if (firstName === "") {
            $("#firstNameError").text("First name is required.");
            result = false;
        }

        if (lastName === "") {
            $("#lastNameError").text("Last name is required.");
            result = false;
        }

        if (street === "") {
            $("#streetError").text("Street is required.");
            result = false;
        }

        if (postalCode === "" || !/^\d{4,10}$/.test(postalCode)) {
            $("#postalCodeError").text("Enter a valid postal code (4-10 digits).");
            result = false;
        }

        if (city === "") {
            $("#cityError").text("City is required.");
            result = false;
        }

        if (country === "") {
            $("#countryError").text("Country is required.");
            result = false;
        }

        if (phone === "" || !/^\+?\d{7,15}$/.test(phone)) {
            $("#phoneError").text("Enter a valid phone number (7-15 digits, optional +).");
            result = false;
        }

        if (birthdate === "") {
            $("#birthdateError").text("Birthdate is required.");
            result = false;
        } else if (!isValidDate(birthdate)) {
            $("#birthdateError").text("Enter a valid date in the format YYYY-MM-DD.");
            result = false;
        }

        return result;
    }

    // Email validation function
    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Password validation function
    function validatePassword(password) {
        // // Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number, and one special character
        // const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
        // return regex.test(password);
        return password.length >= 6;
    }

    // Date validation function
    function isValidDate(dateString) {
        const date = new Date(dateString);
        return date instanceof Date && !isNaN(date);
    }
});