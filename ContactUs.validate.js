$(document).ready(function () {
    $("#contactUsForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            complaintType: {
                required: true,
            },
            email: {
                email: true
            },
            bookingId: {
                number: true
            },
            cabNumber: {
                required: true,
                number: true
            },
            driverName: {
                minlength: 3,
                maxlength: 50,
                pattern: /^[a-zA-Z\s]*$/
            },
            description: {
                required: true,
                minlength: 10,
                maxlength: 200,
                pattern: /^[a-zA-Z\s]*$/
            },
            terms: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 3 characters"
            },
            complaintType: {
                required: "Please select a complaint type"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email"
            },
            bookingId: {
                number: "Please enter a valid booking ID"
            },
            cabNumber: {
                required: "Please enter your cab number",
                number: "Please enter a valid cab number"
            },
            driverName: {
                minlength: "Driver name must be at least 3 characters long",
                maxlength: "Driver name must be less than 50 characters long",
                pattern: "Please enter a valid driver name"
            },
            description: {
                required: "Please enter your description",
                minlength: "Your description must consist of at least 10 characters",
                maxlength: "Your description must consist of at most 200 characters",
                pattern: "Please enter a valid description"
            },
            terms: {
                required: "You must accept the terms and conditions"
            }
        },

        errorElement: 'div',    
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent('label'));
            } else {
                error.insertAfter(element);
            }
        },

        highlight: function (element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },

        unhighlight: function (element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },

        submitHandler: function (form, event) {
            event.preventDefault();

            form.reset();

            $(form).find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');
        }
    });
})
