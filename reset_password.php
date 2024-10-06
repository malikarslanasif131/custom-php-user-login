<?php
$page_title = 'Reset Password'; // Set the title for the page
include 'includes/header.php'; // Include the header
?>


<body>

    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">Reset Password</h2>

        <?php include 'includes/validate.php';
        display_error($error); ?>

        <form method="POST" action="reset_password.php">
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="reset_password">Reset Password</button>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>