<?php
include("../data/config.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $token = bin2hex(random_bytes(50));
    $expire = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "UPDATE users SET reset_token='$token', token_expire='$expire' WHERE email='$email'");

        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
        $subject = "Password Reset";
        $message = "Click here to reset your password: $resetLink";
        $headers = "From: no-reply@yourdomain.com";

        mail($email, $subject, $message, $headers);
        echo "Check your email for the reset link.";
    } else {
        echo "Email not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/output.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md ">
        <div class="mb-4">
            <input type="email" name="email" placeholder="Enter your email" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>
        <button type="submit" name="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Send Reset Link
        </button>
    </form>
</body>

</html>