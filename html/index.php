<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/output.css">
    <link rel="stylesheet" href="../style/main.css">
    <!-- ✅ Font Awesome Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .hero-image {
            background-image: url('../assets/image/scandinavian-interior-mockup-wall-decal-background\ 1.png');
            background-size: cover;
            background-position: center;
        }

        @layer utilities {
            .perspective {
                perspective: 1000px;
            }

            .flip-card-inner {
                transition: transform 0.6s;
                transform-style: preserve-3d;
            }

            .flip-card:hover .flip-card-inner {
                transform: rotateY(180deg);
            }

            .flip-card-front,
            .flip-card-back {
                backface-visibility: hidden;
            }

            .flip-card-back {
                transform: rotateY(180deg);
            }
        }
    </style>
</head>

<body>
    <!-- --------- nav_bar -------- -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <!-- Logo -->
                <div class="flex items-center py-4 px-2">
                    <a href="#" class="flex items-center gap-2">
                        <img src="../assets/image/Meubel House_Logos-05.png" alt="">
                        <span class="font-semibold text-gray-500 text-2xl">Furniro</span>
                    </a>
                </div>

                <!-- Primary Nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#"
                        class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Home</a>
                    <a href="#"
                        class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Products</a>
                    <a href="#"
                        class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Services</a>
                    <a href="#"
                        class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">About</a>
                    <a href="#"
                        class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Contact</a>
                </div>

                <!-- Right Icons -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="#" class="py-2 px-2 text-gray-500 hover:text-blue-500 transition duration-300">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="#" class="py-2 px-2 text-gray-500 hover:text-blue-500 transition duration-300">
                        <i class="far fa-heart"></i>
                    </a>
                    <a href="#" class="py-2 px-2 text-gray-500 hover:text-blue-500 transition duration-300 relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span
                            class="absolute top-0 right-0 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </a>
                    <div>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <!-- Logged In: Show username or profile link -->
                            <a href="profile.php" style="text-decoration: none;">
                                👤
                            </a>
                        <?php else: ?>
                            <!-- Not logged in: Redirect to login/signup -->
                            <a href="signup.php" style="text-decoration: none;">
                                👤
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-blue-500" x-show="!showMenu" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="hidden mobile-menu">
            <ul>
                <li class="active"><a href="#"
                        class="block text-sm px-2 py-4 text-white bg-blue-500 font-semibold">Home</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">Products</a>
                </li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">Services</a>
                </li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">About</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">Contact</a>
                </li>
            </ul>
            <div class="flex justify-around py-4 bg-gray-100">
                <a href="#" class="px-2 text-gray-500 hover:text-blue-500 transition duration-300">
                    <i class="fas fa-search"></i>
                </a>
                <a href="#" class="px-2 text-gray-500 hover:text-blue-500 transition duration-300">
                    <i class="far fa-heart"></i>
                </a>
                <a href="#" class="px-2 text-gray-500 hover:text-blue-500 transition duration-300 relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span
                        class="absolute top-0 right-0 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </a>
                <a href="#" class="px-2 text-gray-500 hover:text-blue-500 transition duration-300">
                    <i class="far fa-user"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- -----------Hero_section--------->
    <section class="hero-image min-h-[500px] md:min-h-[600px] flex items-center relative">
        <!-- Overlay -->
        <div class="absolute "></div>

        <!-- Content -->
        <div class="container flex items-end justify-end mx-auto px-10 relative z-10 text-white ">
            <div class="max-w-2xl hero-section py-8 px-8">
                <!-- New Arrival Badge -->
                <span class="inline-block  text-black px-4 py-2 text-sm font-semibold mb-4 tracking-widest">
                    NEW ARRIVAL
                </span>

                <!-- Headline -->
                <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold leading-tight mb-4 text-yellow-700">
                    Discover Our<br>
                    New Collection
                </h1>

                <!-- Description -->
                <p class="text-lg md:text-[15px] font-medium mb-8 leading-relaxed text-black">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                    elit<br> tellus, luctus nec ullamcorper mattis.
                </p>

                <!-- Button -->
                <a href="#"
                    class="inline-block bg-yellow-700 text-white font-bold py-3 px-8 hover:bg-gray-100 hover:text-black transition duration-300 by-now-btn">
                    BUY NOW
                </a>
            </div>
        </div>
    </section>
    <!-- ---------Browse_The_Range----------->
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Browse The Range</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Dining Card -->
            <div class="perspective group">
                <div class="flip-card h-full">
                    <div
                        class="flip-card-inner h-full rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flip-card-front h-full bg-white rounded-xl overflow-hidden flex flex-col">
                            <div
                                class="h-96 bg-gradient-to-r from-amber-100 to-amber-50 flex items-center justify-center">
                                <img src="../assets/image/Mask Group.png" alt="">
                            </div>

                        </div>
                        <div
                            class="flip-card-back absolute top-0 left-0 w-full h-full bg-amber-500 rounded-xl p-6 flex flex-col justify-center items-center text-white">
                            <h3 class="text-2xl font-bold mb-4">Dining Collections</h3>
                            <p class="text-center mb-6">Discover tables, chairs, and sets that bring people together.
                            </p>
                            <button
                                class="px-6 py-2 bg-white text-amber-600 rounded-full font-medium hover:bg-gray-100 transition">View
                                Collection</button>
                        </div>
                        <h1 class="text-center mt-3 font-semibold text-lg">Dining</h1>
                    </div>
                </div>
            </div>

            <!-- Living Card -->
            <div class="perspective group">
                <div class="flip-card h-full">
                    <div
                        class="flip-card-inner h-full rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flip-card-front h-full bg-white rounded-xl overflow-hidden flex flex-col">
                            <div
                                class="h-96 bg-gradient-to-r from-blue-100 to-blue-50 flex items-center justify-center">
                                <img src="../assets/image/Image-living room.png" alt="">
                            </div>
                        </div>
                        <div
                            class="flip-card-back absolute top-0 left-0 w-full h-full bg-blue-500 rounded-xl p-6 flex flex-col justify-center items-center text-white">
                            <h3 class="text-2xl font-bold mb-4">Living Room</h3>
                            <p class="text-center mb-6">Sofas, coffee tables, and entertainment units for your perfect
                                space.</p>
                            <button
                                class="px-6 py-2 bg-white text-blue-600 rounded-full font-medium hover:bg-gray-100 transition">View
                                Collection</button>
                        </div>
                        <h1 class="text-center mt-3 font-semibold text-lg">Living</h1>
                    </div>
                </div>
            </div>

            <!-- Bedroom Card -->
            <div class="perspective group">
                <div class="flip-card h-full">
                    <div
                        class="flip-card-inner h-full rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flip-card-front h-full bg-white rounded-xl overflow-hidden flex flex-col">
                            <div
                                class="h-96 bg-gradient-to-r from-purple-100 to-purple-50 flex items-center justify-center">
                                <img src="../assets/image 101.png" alt="">
                            </div>

                        </div>
                        <div
                            class="flip-card-back absolute top-0 left-0 w-full h-full bg-purple-500 rounded-xl p-6 flex flex-col justify-center items-center text-white">
                            <h3 class="text-2xl font-bold mb-4">Bedroom Sets</h3>
                            <p class="text-center mb-6">Beds, wardrobes, and nightstands for your personal retreat.</p>
                            <button
                                class="px-6 py-2 bg-white text-purple-600 rounded-full font-medium hover:bg-gray-100 transition">View
                                Collection</button>
                        </div>
                        <h1 class="text-center mt-3 font-semibold text-lg">Bedroom</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional animated button -->
        <div class="mt-20 text-center">
            <button class="relative px-8 py-3 bg-gray-900 text-white rounded-full font-medium overflow-hidden group">
                <span class="relative z-10">View All Collections</span>
                <span
                    class="absolute inset-0 bg-gradient-to-r from-amber-500 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </button>
        </div>
    </section>
    <script>
        let btn = document.querySelector(".by-now-btn");
        console.log(btn);

    </script>
</body>

</html>