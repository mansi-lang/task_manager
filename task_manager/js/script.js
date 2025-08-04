// script.js

document.addEventListener("DOMContentLoaded", () => {

    // -------- 1. FORM VALIDATION FOR REGISTER --------

    const registerForm = document.querySelector("form#registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function (e) {
            const name = this.name.value.trim();
            const email = this.email.value.trim();
            const password = this.password.value.trim();
            const cpassword = this.cpassword.value.trim();


            // Empty field check
            if (!name || !email || !password || !cpassword) {
                alert("All fields are required!");
                e.preventDefault();
                return;
            }


            // Email format check
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Invalid email format!");
                e.preventDefault();
                return;
            }

            
            // Password match check
            if (password !== cpassword) {
                alert("Passwords do not match!");
                e.preventDefault();
                return;
            }
        });
    }

    // -------- 2. FORM VALIDATION FOR LOGIN --------
    const loginForm = document.querySelector("form#loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            const email = this.email.value.trim();
            const password = this.password.value.trim();

            if (!email || !password) {
                alert("Please enter both email and password!");
                e.preventDefault();
            }
        });
    }

    // -------- 3. FORM VALIDATION FOR TASKS (ADD TASK) --------
    const taskForm = document.querySelector("form#taskForm");
    if (taskForm) {
        taskForm.addEventListener("submit", function (e) {
            const title = this.title.value.trim();
            const description = this.description.value.trim();

            if (!title || !description) {
                alert("Title and description are required!");
                e.preventDefault();
            }
        });
    }

    // -------- 4. CONFIRM DELETE TASK --------
    const deleteButtons = document.querySelectorAll(".delete-btn");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to delete this task?")) {
                e.preventDefault();
            }
        });
    });
});
