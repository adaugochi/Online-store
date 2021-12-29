require('jquery-validation');

(function ($) {
    let authForm = $('#authForm'),
        contactForm = $('#contactForm'),
        billingForm = $('#billingForm'),
        profileForm = $('#profileForm');

    $.validator.addMethod("isEmailValid",
        function(value, element) {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)
        }, 'Please enter a valid email address.'
    );

    $.validator.addMethod("fullname",
        function(value, element) {
            return /^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/.test(value)
        }, 'Please enter your full name.'
    );

    $.validator.addMethod("intlTelNumber", function(value, element) {
        return this.optional(element) || $(element).intlTelInput("isValidNumber");
    }, "Please enter a valid International Phone Number");

    authForm.validate({
        rules: {
            email: {
                required :true,
                isEmailValid: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            full_name: {
                required: true,
                fullname: true
            },
            phone_number: {
                required: true,
                intlTelNumber: true
            },
            verification_code: {
                required: true,
                digits: true
            },
        },
        messages: {
            password_confirmation: {
                equalTo: "Password do not match"
            }
        }
    });

    contactForm.validate({
        rules: {
            email: {
                required :true,
                isEmailValid: true
            },
            name: {
                required: true,
                fullname: true
            },
            phone_number: {
                required: true,
                intlTelNumber: true
            },
            quantity: "required",
            item_name: "required",
        }
    })

    billingForm.validate({
        rules: {
            phone_number: {
                required: true,
                intlTelNumber: true
            },
            email: {
                required :true,
                isEmailValid: true
            },
            first_name: "required",
            last_name: "required",
            state: "required",
            country: "required",
            address: "required",
            city: "required",
            payment_method: "required",
            total_amount: "required"
        }
    })

    profileForm.validate({
        rules: {
            phone_number: {
                required: true,
                intlTelNumber: true
            },
            email: {
                required :true,
                isEmailValid: true
            },
            first_name: "required",
            last_name: "required",
            state: "required",
            country: "required",
            street_address: "required",
            city: "required"
        }
    })

})(jQuery)
