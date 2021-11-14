require('jquery-validation');

(function ($) {
    let authForm = $('#authForm');

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
        }
    })

})(jQuery)
