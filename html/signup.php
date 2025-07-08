<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Signup Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../style/signup_page.css">
</head>

<body class="bg-gradient-to-br from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center p-4">

    <div class="signup-container relative w-full max-w-md">
        <!-- Animated background shapes -->
        <div
            class="absolute -top-20 -left-20 w-40 h-40 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-40 h-40 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-0 right-20 w-40 h-40 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
        </div>
        <?php session_start(); ?>


        <!-- Signup card -->
        <div class="relative bg-white rounded-2xl shadow-2xl overflow-hidden animate__animated animate__fadeInUp">
            <div class="px-10 py-12">
                <div class="flex justify-center mb-8">
                    <div
                        class="w-20 h-20 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300 animate-float">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>

                <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-8">Create your account</h2>

                <form action="/Furniture_eCommerce_Website_UI/Furniture_eCommerce_Website_UI/data/signup_config.php"
                    id="signupForm" class="space-y-4" method="POST">
                    <div class="grid grid-cols-2 gap-4">
                        <?php
                        if (isset($_SESSION['error']) && is_array($_SESSION['error'])) {
                            foreach ($_SESSION['error'] as $err) {
                                echo "<div style='color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px 15px; margin-bottom: 10px; border-radius: 5px; font-family: Arial, sans-serif;'>
                $err
              </div>";
                            }
                            unset($_SESSION['error']); // clear after showing
                        }
                        ?>
                        <div class="relative group">
                            <input id="firstName" name="firstName" type="text" required
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 peer"
                                placeholder=" ">
                            <label for="firstName" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                                peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 
                                -top-2 text-sm bg-white px-1 text-indigo-500">First Name</label>
                        </div>

                        <div class="relative group">
                            <input id="lastName" name="lastName" type="text" required
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 peer"
                                placeholder=" ">
                            <label for="lastName" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                                peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 
                                -top-2 text-sm bg-white px-1 text-indigo-500">Last Name</label>
                        </div>
                    </div>

                    <div class="relative group">
                        <input id="email" name="email" type="email" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 peer"
                            placeholder=" ">
                        <label for="email" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 
                            -top-2 text-sm bg-white px-1 text-indigo-500">Email address</label>
                    </div>

                    <div class="relative group">
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 peer"
                            placeholder=" " minlength="8">
                        <label for="password" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 
                            -top-2 text-sm bg-white px-1 text-indigo-500">Password (min 8 chars)</label>
                        <div class="password-strength mt-1 h-1 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-gray-400 strength-0 transition-all duration-300"></div>
                        </div>
                    </div>

                    <div class="relative group">
                        <input id="confirmPassword" name="confirmPassword" type="password" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 peer"
                            placeholder=" ">
                        <label for="confirmPassword" class="absolute left-4 top-3 text-gray-500 pointer-events-none transition-all duration-200 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 
                            -top-2 text-sm bg-white px-1 text-indigo-500">Confirm Password</label>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Terms
                                and Conditions</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" id="signupButton" name="create-account"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-[1.02]">
                            Create Account
                        </button>


                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or sign up with</span>
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
                    Already have an account?
                    <a href="login.html" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
                </p>
            </div>
        </div>
    </div>

    <script src="../script/data.js"></script>
</body>

</html>