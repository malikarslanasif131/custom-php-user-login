<?php
include 'includes/db.php';
session_start();

// Validation function for sanitizing inputs
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

$error = "";

// Register a New User
if (isset($_POST['register'])) {
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $confirm_password = sanitize_input($_POST['confirm_password']);
    $security_question = sanitize_input($_POST['security_question']);
    $security_answer = sanitize_input($_POST['security_answer']);

    // Validate form fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($security_answer)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if the user already exists
        $user_check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($user_check) > 0) {
            $error = "User already exists with this email.";
        } else {
            // Hash the password and security answer
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $hashed_answer = password_hash($security_answer, PASSWORD_BCRYPT);

            // Insert new user into the database
            $sql = "INSERT INTO users (username, email, password, security_question_id, security_answer)
                    VALUES ('$username', '$email', '$hashed_password', '$security_question', '$hashed_answer')";

            if (mysqli_query($conn, $sql)) {
                header('Location: login.php');
                exit();
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }
}

// Login a User
if (isset($_POST['login'])) {
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: dashboard.php');
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with this email.";
        }
    }
}
// Forgotten Password Logic
if (isset($_POST['forgot_password'])) {
    $email = sanitize_input($_POST['email']);
    $security_question = sanitize_input($_POST['security_question']);
    $security_answer = sanitize_input($_POST['security_answer']);

    if (empty($email) || empty($security_question) || empty($security_answer)) {
        $error = "All fields are required.";
    } else {
        // Check if user exists with the given email
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND security_question_id='$security_question'");
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Verify the security answer
            if (password_verify($security_answer, $user['security_answer'])) {
                $_SESSION['reset_email'] = $email;
                header('Location: reset_password.php');
                exit();
            } else {
                $error = "Incorrect security answer.";
            }
        } else {
            $error = "No account found with this email or security question.";
        }
    }
}


// Reset Password Logic
if (isset($_POST['reset_password'])) {
    $new_password = sanitize_input($_POST['new_password']);
    $confirm_password = sanitize_input($_POST['confirm_password']);

    if (empty($new_password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($new_password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $email = $_SESSION['reset_email'];

        // Update the user's password in the database
        $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            // Clear session and redirect to login
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}


// Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}

// Display error messages
function display_error($error)
{
    if (!empty($error)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ' . $error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>