<?php
session_start();
include("./config.php");

if (isset($_POST['create-account'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    $errors = [];

    // Validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = "Email already exists.";
    }
    $stmt->close();

    // Show errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            // $_SESSION['error'] = $error;
            // header("Location: ../html/signup.php");
            echo $error;

        }
    } else {
        // Password hash
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        // Insert into DB securely
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $passHash);

        if ($stmt->execute()) {
            // Redirect to login or success page
            header("Location: ../html/login.php");
            exit();
        } else {
            echo "Something went wrong: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>