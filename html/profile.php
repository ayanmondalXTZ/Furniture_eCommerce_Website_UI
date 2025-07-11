<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signup.php"); // force login
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile - EC Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Container -->
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">

        <!-- Profile Header -->
        <div class="flex items-center space-x-6 border-b pb-6">
            <img src="https://i.pravatar.cc/150?img=32" alt="Profile" class="w-20 h-20 rounded-full shadow" />
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    <?php echo htmlspecialchars($_SESSION['first_name']); ?>
                    <?php echo htmlspecialchars($_SESSION['last_name']); ?>
                </h2>
                <p class="text-gray-500 text-sm">
                    <?php echo htmlspecialchars($_SESSION['email']); ?>
                </p>
                <p class="text-gray-400 text-xs">Member since
                    <?php echo htmlspecialchars($_SESSION['date']); ?>
                </p>
            </div>
            <div class="ml-auto">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                    Edit Profile
                </button>
                <a href="logout.php"
                    class="inline-block px-4 py-2 bg-red-600 text-white font-medium text-sm leading-tight rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                    Logout
                </a>
            </div>
        </div>

        <!-- Shipping Info -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Shipping Address</h3>
            <p class="text-gray-700">123 Park Street, Kolkata, India</p>
            <p class="text-gray-500 text-sm">Phone: +91 90916 80693</p>
        </div>

        <!-- Order History -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>
            <div class="space-y-4">

                <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="font-medium">Order #123456</p>
                        <p class="text-sm text-gray-500">Placed on: June 28, 2025</p>
                    </div>
                    <div class="text-right">
                        <p class="text-green-600 font-semibold">Delivered</p>
                        <p class="text-sm text-gray-400">Total: ₹3,499</p>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="font-medium">Order #123457</p>
                        <p class="text-sm text-gray-500">Placed on: July 2, 2025</p>
                    </div>
                    <div class="text-right">
                        <p class="text-yellow-500 font-semibold">In Transit</p>
                        <p class="text-sm text-gray-400">Total: ₹1,299</p>
                    </div>
                </div>

            </div>
        </div>

    </div>


</body>

</html>