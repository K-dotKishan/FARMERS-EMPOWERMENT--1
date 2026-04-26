<?php
session_start();

// Redirect if cart is empty
if (empty($_SESSION['cart'])) {
    header('Location: online-marketplace.php');
    exit();
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'];
}

// Get cart count
$cart_count = count($_SESSION['cart']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Here you would typically:
    // 1. Validate the form data
    // 2. Process the payment
    // 3. Save the order to a database
    // 4. Clear the cart
    // 5. Redirect to a success page
    
    // For now, we'll just clear the cart and redirect
    $_SESSION['cart'] = array();
    header('Location: order-success.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - FarmEmpower</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="index.html" class="flex items-center space-x-3">
                    <div class="bg-white w-12 h-12 rounded-full flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-full opacity-20"></div>
                        <i class="fas fa-leaf text-2xl text-green-600 transform -rotate-12"></i>
                        <i class="fas fa-seedling text-xl text-green-500 absolute -bottom-1 -right-1"></i>
                    </div>
                    <div class="flex flex-col">
                        <div class="text-2xl font-bold tracking-wide">FarmEmpower</div>
                        <div class="text-xs text-green-200">Growing Together</div>
                    </div>
                </a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="index.html" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-home mr-2"></i>
                    <span id="nav-home">Home</span>
                </a>
                <a href="index.html#services" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-cogs mr-2"></i>
                    <span id="nav-services">Services</span>
                </a>
                <a href="index.html#about" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span id="nav-about">About</span>
                </a>
                <a href="index.html#contact" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-envelope mr-2"></i>
                    <span id="nav-contact">Contact</span>
                </a>
                <a href="cart.php" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    <span>Cart (<?php echo $cart_count; ?>)</span>
                </a>
                <div class="relative">
                    <button id="lang-selector" class="hover:text-green-200 transition duration-300 flex items-center">
                        <i class="fas fa-globe mr-2"></i>
                        <span id="current-lang">English</span>
                    </button>
                    <div id="lang-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 hidden">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-green-100" data-lang="en">English</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-green-100" data-lang="hi">हिंदी</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-green-100" data-lang="pa">ਪੰਜਾਬੀ</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-green-100" data-lang="ta">தமிழ்</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-green-100" data-lang="te">తెలుగు</a>
                    </div>
                </div>
            </div>
            <button class="md:hidden" id="menu-btn">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="bg-green-600 text-white py-4 hidden md:hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col space-y-4">
                <a href="index.html" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-home mr-2"></i>
                    <span id="mobile-nav-home">Home</span>
                </a>
                <a href="index.html#services" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-cogs mr-2"></i>
                    <span id="mobile-nav-services">Services</span>
                </a>
                <a href="index.html#about" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span id="mobile-nav-about">About</span>
                </a>
                <a href="index.html#contact" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-envelope mr-2"></i>
                    <span id="mobile-nav-contact">Contact</span>
                </a>
                <a href="cart.php" class="hover:text-green-200 transition duration-300 flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    <span>Cart (<?php echo $cart_count; ?>)</span>
                </a>
                <div class="pt-2 border-t border-green-500">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-globe mr-2"></i>
                        <span>Language</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <button class="lang-option bg-green-700 py-2 px-3 rounded hover:bg-green-800 transition duration-300" data-lang="en">English</button>
                        <button class="lang-option bg-green-700 py-2 px-3 rounded hover:bg-green-800 transition duration-300" data-lang="hi">हिंदी</button>
                        <button class="lang-option bg-green-700 py-2 px-3 rounded hover:bg-green-800 transition duration-300" data-lang="pa">ਪੰਜਾਬੀ</button>
                        <button class="lang-option bg-green-700 py-2 px-3 rounded hover:bg-green-800 transition duration-300" data-lang="ta">தமிழ்</button>
                        <button class="lang-option bg-green-700 py-2 px-3 rounded hover:bg-green-800 transition duration-300" data-lang="te">తెలుగు</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-8">Checkout</h1>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                        <div class="space-y-4">
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <div class="flex items-center space-x-4">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="w-16 h-16 object-cover rounded">
                                    <div class="flex-1">
                                        <h3 class="font-bold"><?php echo $item['name']; ?></h3>
                                        <p class="text-green-600">₹<?php echo number_format($item['price']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-bold">₹<?php echo number_format($total); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-bold">Free</span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold">Total</span>
                                <span class="text-lg font-bold text-green-600">₹<?php echo number_format($total); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout Form -->
                <div class="lg:col-span-1">
                    <form method="POST" class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-6">Shipping Information</h2>
                        
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 mb-2" for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 mb-2" for="email">Email</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 mb-2" for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 mb-2" for="address">Address</label>
                                <textarea id="address" name="address" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500" rows="3"></textarea>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 mb-2" for="city">City</label>
                                    <input type="text" id="city" name="city" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="state">State</label>
                                    <input type="text" id="state" name="state" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="pincode">PIN Code</label>
                                    <input type="text" id="pincode" name="pincode" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                            </div>
                        </div>

                        <h2 class="text-xl font-bold my-6">Payment Information</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2" for="card_number">Card Number</label>
                                <input type="text" id="card_number" name="card_number" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500" placeholder="1234 5678 9012 3456">
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 mb-2" for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" name="expiry" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500" placeholder="MM/YY">
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500" placeholder="123">
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="card_name">Name on Card</label>
                                    <input type="text" id="card_name" name="card_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transition duration-300 mt-8">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 FarmEmpower. <span id="footer-rights">All rights reserved.</span></p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html> 