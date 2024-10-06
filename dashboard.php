<?php
include 'includes/validate.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
$page_title = 'Dashboard'; // Set the title for the page
include 'includes/header.php'; // Include the header
?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">Welcome to Your Dashboard</h2>
        <div class=" text-center ">
            <a href="logout.php?logout=true" class="btn btn-danger mt-5">Logout</a>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>