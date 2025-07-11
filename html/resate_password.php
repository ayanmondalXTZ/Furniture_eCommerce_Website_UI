<?php
include 'config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $check = mysqli_query($conn, "SELECT * FROM users WHERE reset_token='$token' AND token_expire > NOW()");
    if (mysqli_num_rows($check) == 1) {
        if (isset($_POST['reset'])) {
            $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE users SET password='$newPassword', reset_token=NULL, token_expire=NULL WHERE reset_token='$token'");
            echo "Password updated successfully!";
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token provided.";
}
?>

<?php if (isset($_GET['token'])): ?>
    <form method="POST">
        <input type="password" name="password" placeholder="Enter new password" required />
        <button type="submit" name="reset">Reset Password</button>
    </form>
<?php endif; ?>