<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    // Redirect the user to the home page or dashboard
    header('Location: /home.php');
    exit();
}
// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the login authentication
    if ($username === 'your_username' && $password === 'your_password') {
        // Set the user session
        $_SESSION['user'] = $username;

        // Redirect the user to the home page or dashboard
        header('Location: home.php');
        exit();
    } else {
        // Invalid login credentials, show an error message or redirect to the login page
        header('Location: login.php?error=invalid_credentials');
        exit();
    }
}
// Redirect the user to the login page if not logged in or no login form submitted
header('Location: view/login_form.php');
exit();
