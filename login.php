<?php
$page_title = 'Login Page'; // Set the title for the page
include 'includes/header.php'; // Include the header
?>

<body>

    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">User Login</h2>

        <?php include 'includes/validate.php';
        display_error($error); ?>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <a href="forgot_password.php" class="btn btn-link">Forgot Password?</a>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>