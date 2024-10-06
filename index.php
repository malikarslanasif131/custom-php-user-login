<?php
$page_title = 'Home Page'; // Set the title for the page
include 'includes/header.php'; // Include the header
?>

<body>
    <!-- Navbar is included from navbar.php -->

    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to My Custom Project</h1>
        <p class="lead text-center">
            This is a simple user management system with features like user registration, login, password recovery, and
            a user dashboard. Explore our platform by logging in or creating a new account!
        </p>

        <div class="text-center mt-4">
            <a href="register.php" class="btn btn-primary">Create an Account</a>
            <a href="login.php" class="btn btn-secondary">Login</a>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>