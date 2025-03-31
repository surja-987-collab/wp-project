document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("eventForm").addEventListener("submit", function (event) {
        let isValid = true;

        // Get form values
        let name = document.querySelector("[name='name']").value.trim();
        let phone = document.querySelector("[name='phone']").value.trim();
        let eventType = document.querySelector("[name='event_type']").value;
        let budget = document.querySelector("[name='budget']").value;
        let message = document.querySelector("[name='message']").value.trim();

        // Reset error messages
        document.getElementById("nameError").innerText = "";
        document.getElementById("phoneError").innerText = "";
        document.getElementById("eventTypeError").innerText = "";
        document.getElementById("budgetError").innerText = "";
        document.getElementById("messageError").innerText = "";

        // Validate Full Name
        if (name === "") {
            document.getElementById("nameError").innerText = "Full name is required";
            isValid = false;
        }

        // Validate Phone Number (10 digits)
        if (!/^\d{10}$/.test(phone)) {
            document.getElementById("phoneError").innerText = "Valid 10-digit phone number required";
            isValid = false;
        }

        // Validate Event Type Selection
        if (eventType === "") {
            document.getElementById("eventTypeError").innerText = "Please select an event type";
            isValid = false;
        }

        // Validate Budget Selection
        if (budget === "") {
            document.getElementById("budgetError").innerText = "Please select a budget";
            isValid = false;
        }

        // Validate Message
        if (message === "") {
            document.getElementById("messageError").innerText = "Message cannot be empty";
            isValid = false;
        }

        // Prevent form submission if not valid
        if (!isValid) {
            event.preventDefault();
        }
    });
});
