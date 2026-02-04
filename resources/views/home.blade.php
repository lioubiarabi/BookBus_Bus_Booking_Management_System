<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBus - Book Your Journey</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F172A',
                        secondary: '#FF6B35',
                        accent: '#00D9FF',
                    },
                    fontFamily: {
                        display: ['Darker Grotesque', 'sans-serif'],
                        body: ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Darker Grotesque', sans-serif;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animate-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-delay-2 {
            animation-delay: 0.2s;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50 transition-all" id="navbar">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="index.html" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-secondary to-orange-400 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-display font-black text-primary">BookBus</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="trips.html" class="text-gray-700 hover:text-secondary font-medium transition-colors">Trips</a>
                    <a href="auth/login.html" class="px-5 py-2.5 text-gray-700 font-semibold hover:text-secondary transition-colors">Login</a>
                    <a href="auth/register.html" class="px-6 py-2.5 bg-secondary text-white font-semibold rounded-lg hover:bg-orange-600 transform hover:-translate-y-0.5 transition-all shadow-lg shadow-secondary/30">
                        Sign Up
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-gray-100 bg-white">
            <div class="px-6 py-4 space-y-3">
                <a href="trips.html" class="block text-gray-700 font-medium">Trips</a>
                <a href="auth/login.html" class="block text-gray-700 font-medium">Login</a>
                <a href="auth/register.html" class="block px-6 py-2.5 bg-secondary text-white font-semibold rounded-lg text-center">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary via-slate-800 to-slate-700 text-white py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, white 39px, white 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, white 39px, white 40px);"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-6xl md:text-7xl font-black mb-6 leading-tight animate-fadeInUp">
                    Your Journey Starts Here
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-12 animate-fadeInUp animate-delay-1">
                    Book intercity bus tickets across Morocco with ease. Comfortable, reliable, and affordable travel.
                </p>

                <!-- Search Form -->
                <div class="bg-white/98 backdrop-blur-sm rounded-2xl p-8 shadow-2xl animate-fadeInUp animate-delay-2">
                    <form action="trips.html" method="GET">
                        <div class="grid md:grid-cols-3 gap-4 mb-6">
                            <div class="text-left">
                                <label class="block text-gray-700 font-semibold mb-2 text-sm">From</label>
                                <select name="from" required
                                        class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-lg focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition-all text-gray-900 appearance-none bg-white">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-left">
                                <label class="block text-gray-700 font-semibold mb-2 text-sm">To</label>
                                <select name="to" required
                                        class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-lg focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition-all text-gray-900 appearance-none bg-white">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-left">
                                <label class="block text-gray-700 font-semibold mb-2 text-sm">Date</label>
                                <input type="date" name="date" required
                                    class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-lg focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition-all text-gray-900">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-secondary text-white font-bold py-4 rounded-lg hover:bg-orange-600 transform hover:-translate-y-0.5 transition-all shadow-lg shadow-secondary/40 text-lg">
                            Search Trips
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-black text-center mb-16 text-primary">Why Choose BookBus?</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-secondary to-orange-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-primary">Wide Network</h3>
                    <p class="text-gray-600 leading-relaxed">Travel to major cities across Morocco with our extensive network of routes.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-accent to-cyan-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-primary">On-Time Departure</h3>
                    <p class="text-gray-600 leading-relaxed">Punctual service ensuring you reach your destination as planned.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-slate-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-primary">Comfort & Safety</h3>
                    <p class="text-gray-600 leading-relaxed">Modern buses with comfortable seating and professional drivers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Routes -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-black text-center mb-16 text-primary">Popular Routes</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Route 1 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <div class="text-xl font-bold text-primary">Casablanca</div>
                            <div class="text-sm text-gray-500">3h 30m</div>
                        </div>
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                        <div>
                            <div class="text-xl font-bold text-primary text-right">Marrakech</div>
                            <div class="text-sm text-gray-500 text-right">Direct</div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                        <span class="text-2xl font-black text-secondary">80 MAD</span>
                        <a href="trips.html" class="px-5 py-2 bg-secondary text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors text-sm">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Route 2 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <div class="text-xl font-bold text-primary">Rabat</div>
                            <div class="text-sm text-gray-500">4h 15m</div>
                        </div>
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                        <div>
                            <div class="text-xl font-bold text-primary text-right">Tangier</div>
                            <div class="text-sm text-gray-500 text-right">Direct</div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                        <span class="text-2xl font-black text-secondary">120 MAD</span>
                        <a href="trips.html" class="px-5 py-2 bg-secondary text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors text-sm">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Route 3 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <div class="text-xl font-bold text-primary">Fes</div>
                            <div class="text-sm text-gray-500">4h 00m</div>
                        </div>
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                        <div>
                            <div class="text-xl font-bold text-primary text-right">Casablanca</div>
                            <div class="text-sm text-gray-500 text-right">Direct</div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                        <span class="text-2xl font-black text-secondary">90 MAD</span>
                        <a href="trips.html" class="px-5 py-2 bg-secondary text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors text-sm">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Route 4 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <div class="text-xl font-bold text-primary">Agadir</div>
                            <div class="text-sm text-gray-500">3h 00m</div>
                        </div>
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                        <div>
                            <div class="text-xl font-bold text-primary text-right">Marrakech</div>
                            <div class="text-sm text-gray-500 text-right">Direct</div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                        <span class="text-2xl font-black text-secondary">70 MAD</span>
                        <a href="trips.html" class="px-5 py-2 bg-secondary text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors text-sm">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-secondary to-orange-400 text-white py-20">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-5xl font-black mb-4">Ready to Travel?</h2>
            <p class="text-xl mb-8 text-white/90">
                Join thousands of satisfied travelers booking with BookBus
            </p>
            <a href="auth/register.html" class="inline-block px-10 py-4 bg-white text-secondary font-bold rounded-lg hover:bg-gray-100 transform hover:-translate-y-1 transition-all shadow-2xl text-lg">
                Get Started Now
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-12 mb-8">
                <div>
                    <h3 class="text-2xl font-display font-bold mb-4">BookBus</h3>
                    <p class="text-gray-400">Your trusted partner for intercity bus travel across Morocco.</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="trips.html" class="text-gray-400 hover:text-white transition-colors">Find Trips</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms & Conditions</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="text-center pt-8 border-t border-gray-700">
                <p class="text-gray-400">&copy; 2026 BookBus. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
