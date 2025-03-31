$(document).ready(function() {
    $("#forgetPass").validate({
        rules: {
            OTP: {
                required: true,
                length: 6,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 20,
                pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/
            }
        },
        messages: {
            email: {
                required: "Please enter your OTP",
                length:"otp size should be 6",
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must consist of at least 8 characters",
                maxlength: "Your password must consist of at most 20 characters",
                pattern: "Password must contain at least one number, one uppercase and one lowercase letter"
            }
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function(form,event) {
            event.preventDefault();
            form.reset();
            $(form).find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');

        }
    });
})