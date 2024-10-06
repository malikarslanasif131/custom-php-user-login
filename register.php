<?php
$page_title = 'Register Page'; // Set the title for the page
include 'includes/header.php'; // Include the header
?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">User Registration</h2>

        <?php include 'includes/validate.php';
        display_error($error); ?>

        <form method="POST" action="register.php">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="security_question" class="form-label">Security Question</label>
                <select class="form-select" id="security_question" name="security_question" required>
                    <option value="">Select your security question</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="security_answer" class="form-label">Security Answer</label>
                <input type="text" class="form-control" id="security_answer" name="security_answer" required>
            </div>

            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- Add JavaScript to fetch security questions -->
    <script>
        // Function to fetch security questions and populate the select dropdown
        function loadSecurityQuestions() {
            const selectElement = document.getElementById('security_question');

            // Clear existing options
            selectElement.innerHTML = '<option value="">Select your security question</option>';

            // Fetch the questions from the server
            fetch('includes/get_questions.php')
                .then(response => response.json())
                .then(data => {
                    // Populate the dropdown with the fetched questions
                    data.forEach(question => {
                        const option = document.createElement('option');
                        option.value = question.id;
                        option.textContent = question.question;
                        selectElement.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching questions:', error));
        }

        // Load the questions on page load
        window.onload = loadSecurityQuestions;
    </script>
</body>

</html>