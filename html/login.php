<?php
session_start();
include("../data/config.php");
if (isset($_POST["login"])) {
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "SELECT id, password, first_name, last_name, email, created_at FROM users WHERE email = '$email'";



    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Always start session at top

    if ($row) {
        if (password_verify($password, $row["password"])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $created_at = $row['created_at'];
            $date = date("d M Y", strtotime($created_at));
            $_SESSION['date'] = $date;

            echo $_SESSION['date'];
            echo $_SESSION['user_id'];
            echo $_SESSION['first_name'];
            header("Location: index.php");
            exit; // 🔴 Important: stop script after redirect
        } else {
            $_SESSION['log-error'] = "Password does not match";
            header("Location: login.php"); // 🔁 Send back to login
            exit;
        }
    } else {
        $_SESSION['log-error'] = "User not found or incorrect credentials";
        header("Location: login.php"); // 🔁 Send back to login
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../style/output.css">
</head>

<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="login-container relative w-full max-w-md">
        <!-- Animated background shapes -->
        <div
            class="absolute -top-20 -left-20 w-40 h-40 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-40 h-40 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-0 right-20 w-40 h-40 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
        </div>
        <?php
        if (isset($_SESSION['log-error'])) {
            echo "<div style='color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px 15px; margin-bottom: 10px; border-radius: 5px; font-family: Arial, sans-serif;'>
            {$_SESSION['log-error']}
          </div>";
            unset($_SESSION['log-error']);

        }
        ?>

        <!-- Login card -->
        <div class="relative bg-white rounded-2xl shadow-2xl overflow-hidden animate__animated animate__fadeInUp">
            <div class="px-10 py-12">
                <div class="flex justify-center mb-8">
                    <div
                        class="w-20 h-20 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                        </svg>
                    </div>
                </div>

                <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-8">Welcome back</h2>

                <form action="#" id="loginForm" class="space-y-6" method="POST">
                    <div class="relative group">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 peer"
                            placeholder=" ">
                        <label for="email" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-blue-500 
                            -top-2 text-sm bg-white px-1 text-blue-500">Email address</label>
                    </div>

                    <div class="relative group">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 peer"
                            placeholder=" ">
                        <label for="password" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-blue-500 
                            -top-2 text-sm bg-white px-1 text-blue-500">Password</label>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="forget_password.php" class="font-medium text-blue-600 hover:text-blue-500">Forgot
                                password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" id="loginButton" name="login"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-[1.02]">
                            Log in
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div>
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-200 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0110 4.844c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.933.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C17.14 18.163 20 14.418 20 10c0-5.523-4.477-10-10-10z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        <div>
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-200 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10 5.523 0 10-4.477 10-10 0-5.523-4.477-10-10-10zm6.563 15.625c-.796 0-1.441-.645-1.441-1.441s.645-1.441 1.441-1.441 1.441.645 1.441 1.441-.645 1.441-1.441 1.441zm-3.281-6.25c0 .345-.28.625-.625.625h-5.469a.625.625 0 010-1.25h5.469c.345 0 .625.28.625.625zm0-2.5c0 .345-.28.625-.625.625h-5.469a.625.625 0 010-1.25h5.469c.345 0 .625.28.625.625zm0-2.5c0 .345-.28.625-.625.625h-5.469a.625.625 0 010-1.25h5.469c.345 0 .625.28.625.625z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        <div>
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-200 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10 5.523 0 10-4.477 10-10 0-5.523-4.477-10-10-10zm3.75 15.625h-7.5a.625.625 0 01-.625-.625v-7.5c0-.345.28-.625.625-.625h7.5c.345 0 .625.28.625.625v7.5c0 .345-.28.625-.625.625zm-3.75-5.625a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-10 py-4 bg-gray-50 border-t border-gray-200 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <script src="../script/data.js"></script>
</body>

</html>