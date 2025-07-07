<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 text-xl font-bold text-blue-600 border-b">Admin Panel</div>
            <nav class="p-4 space-y-2">
                <a href="./admin-panale.html"
                    class="block px-4 py-2 rounded hover:bg-blue-100 text-gray-700">Dashboard</a>
                <a href="./add_product.html" class="block px-4 py-2 rounded hover:bg-blue-100 text-gray-700">Add
                    product</a>
                <a href="./view_product" class="block px-4 py-2 rounded hover:bg-blue-100 text-gray-700">View
                    product</a>
                <a href="./update_product" class="block px-4 py-2 rounded hover:bg-blue-100 text-gray-700">update
                    product </a>
                <a href="./delete_product" class="block px-4 py-2 rounded hover:bg-blue-100 text-gray-700">Delete
                    product</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h1 class="text-2xl font-semibold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-blue-600"><i data-lucide="bell"></i></button>
                    <button class="text-gray-600 hover:text-blue-600"><i data-lucide="user"></i></button>
                </div>
            </header>

            <!-- Content Area -->
            <main class="p-6">
                <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Furniture Product</h2>

                    <form action="/Furniture_eCommerce_Website_UI/Furniture_eCommerce_Website_UI/data/add_food.php"
                        method="POST" enctype="multipart/form-data" class="space-y-5">

                        <!-- Product Name -->
                        <div>
                            <label class="block text-gray-700 mb-1 font-medium">Product Name</label>
                            <input type="text" name="product_name" placeholder="e.g. Wooden Dining Table"
                                class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                                required />
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-gray-700 mb-1 font-medium">Description</label>
                            <textarea name="description" rows="4" placeholder="Enter product details..."
                                class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                                required></textarea>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-gray-700 mb-1 font-medium">Price (₹)</label>
                            <input type="number" name="price" placeholder="e.g. 14999" step="0.01"
                                class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                                required />
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-gray-700 mb-1 font-medium">Category</label>
                            <select name="category"
                                class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="">Select Category</option>
                                <option value="sofa">Sofa</option>
                                <option value="bed">Bed</option>
                                <option value="chair">Chair</option>
                                <option value="table">Table</option>
                                <option value="wardrobe">Wardrobe</option>
                                <option value="storage">Storage</option>
                            </select>
                        </div>

                        <!-- Material -->
                        <div>
                            <label class="block text-gray-700 mb-1 font-medium">Material</label>
                            <input type="text" name="material" placeholder="e.g. Sheesham Wood, MDF"
                                class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                                required />
                        </div>

                        <!-- Dimensions -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-1 font-medium">Width (inches)</label>
                                <input type="number" name="width" class="w-full p-2 border border-gray-300 rounded"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1 font-medium">Height (inches)</label>
                                <input type="number" name="height" class="w-full p-2 border border-gray-300 rounded"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1 font-medium">Depth (inches)</label>
                                <input type="number" name="depth" class="w-full p-2 border border-gray-300 rounded"
                                    required>
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div>
                            <label class="block text-gray-700 mb-1 font-medium">Product Image</label>
                            <input type="file" name="product_image" accept="image/*"
                                class="w-full p-2 border border-gray-300 rounded bg-white" required />
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" name="add-food"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded">
                                Add Product
                            </button>
                        </div>

                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>