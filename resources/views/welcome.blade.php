<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans leading-relaxed">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-blue-700">BlogApp</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-700">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-700">Features</a>

                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-32 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold mb-6 animate-fade-in">Welcome to BlogApp</h1>
                <p class="text-xl mb-12 text-blue-100 max-w-2xl mx-auto">Start writing and sharing your thoughts today. Join our community of passionate writers and storytellers.</p>
                <div class="space-x-6">
                    <a href="#login" class="bg-yellow-500 text-blue-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-yellow-400 transition duration-300 inline-flex items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Log In
                    </a>
                    <a href="#register" class="bg-transparent border-2 border-yellow-500 text-yellow-500 px-8 py-4 rounded-full font-semibold text-lg hover:bg-yellow-500 hover:text-blue-900 transition duration-300 inline-flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-16 text-gray-800">Why Choose BlogApp?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="text-center p-6 hover:shadow-xl transition duration-300 rounded-lg">
                    <div class="text-blue-700 text-4xl mb-4">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Easy to Use</h3>
                    <p class="text-gray-600">Start writing immediately with our intuitive editor and simple interface.</p>
                </div>
                <div class="text-center p-6 hover:shadow-xl transition duration-300 rounded-lg">
                    <div class="text-blue-700 text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Growing Community</h3>
                    <p class="text-gray-600">Connect with other writers and build your audience.</p>
                </div>
                <div class="text-center p-6 hover:shadow-xl transition duration-300 rounded-lg">
                    <div class="text-blue-700 text-4xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Analytics</h3>
                    <p class="text-gray-600">Track your posts' performance with detailed analytics.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-100 py-20 px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Ready to Start Your Writing Journey?</h2>
            <p class="text-xl text-gray-600 mb-12">Join thousands of writers who have already found their voice with BlogApp.</p>
            <a href="#register" class="bg-blue-700 text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-blue-800 transition duration-300 inline-flex items-center">
                <i class="fas fa-rocket mr-2"></i> Get Started for Free
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <h3 class="text-xl font-semibold mb-4">BlogApp</h3>
                    <p class="text-gray-400">Your platform for sharing stories that matter.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Product</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Features</a></li>

                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 BlogApp. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>