<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Trips - BookBus</title>

    <script src="https://cdn.tailwindcss.com"></script>

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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <a href="home.blade.php" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-secondary to-orange-400 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-display font-black text-primary">BookBus</span>
                </a>

                <div class="flex items-center gap-8">
                    <a href="trips.html" class="text-gray-700 hover:text-secondary font-medium transition-colors">Trips</a>
                    <a href="auth/login.html" class="px-5 py-2.5 text-gray-700 font-semibold hover:text-secondary transition-colors">Login</a>
                    <a href="auth/register.html" class="px-6 py-2.5 bg-secondary text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-primary to-slate-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-5xl font-black mb-3">Find Your Trip</h1>
            <p class="text-xl text-gray-300">Search and book bus tickets for your next journey</p>
        </div>
    </section>

    <!-- Search Form -->
    <section class="bg-white shadow-lg -mt-6 relative z-10">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <form action="" method="GET">
                <div class="grid md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">From</label>
                        <input type="text" name="from" placeholder="Departure city" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">To</label>
                        <input type="text" name="to" placeholder="Arrival city" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Date</label>
                        <input type="date" name="date" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none">
                    </div>

                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-secondary text-white font-bold py-3 rounded-lg hover:bg-orange-600 transition-all">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Results -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-black mb-8">
                Available Trips
                <span class="text-gray-500 font-normal text-xl">(12 found)</span>
            </h2>

            <div class="space-y-6">
                <!-- Trip Card 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all">
                    <div class="grid md:grid-cols-12 gap-6 items-center">
                        <!-- Departure -->
                        <div class="md:col-span-3">
                            <div class="text-sm text-gray-500 mb-1">Departure</div>
                            <div class="text-3xl font-black text-primary">08:30</div>
                            <div class="font-semibold text-lg mt-1">Casablanca</div>
                            <div class="text-sm text-gray-500">Mon, Jan 27</div>
                        </div>

                        <!-- Journey -->
                        <div class="md:col-span-3 text-center">
                            <div class="text-sm text-gray-500 mb-2">3h 30m</div>
                            <div class="relative">
                                <div class="h-1 bg-gradient-to-r from-secondary to-accent rounded-full"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-2">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500 mt-2">Direct</div>
                        </div>

                        <!-- Arrival -->
                        <div class="md:col-span-3">
                            <div class="text-sm text-gray-500 mb-1">Arrival</div>
                            <div class="text-3xl font-black text-primary">12:00</div>
                            <div class="font-semibold text-lg mt-1">Marrakech</div>
                            <div class="text-sm text-gray-500">Mon, Jan 27</div>
                        </div>

                        <!-- Price & Action -->
                        <div class="md:col-span-3 text-right">
                            <div class="text-4xl font-black text-secondary mb-2">80 <span class="text-xl">MAD</span></div>
                            <div class="text-sm text-green-600 font-semibold mb-4">25 seats available</div>
                            <a href="trip-details.html" class="inline-block px-8 py-3 bg-secondary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Trip Card 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all">
                    <div class="grid md:grid-cols-12 gap-6 items-center">
                        <div class="md:col-span-3">
                            <div class="text-sm text-gray-500 mb-1">Departure</div>
                            <div class="text-3xl font-black text-primary">14:00</div>
                            <div class="font-semibold text-lg mt-1">Casablanca</div>
                            <div class="text-sm text-gray-500">Mon, Jan 27</div>
                        </div>

                        <div class="md:col-span-3 text-center">
                            <div class="text-sm text-gray-500 mb-2">3h 45m</div>
                            <div class="relative">
                                <div class="h-1 bg-gradient-to-r from-secondary to-accent rounded-full"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-2">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500 mt-2">Direct</div>
                        </div>

                        <div class="md:col-span-3">
                            <div class="text-sm text-gray-500 mb-1">Arrival</div>
                            <div class="text-3xl font-black text-primary">17:45</div>
                            <div class="font-semibold text-lg mt-1">Marrakech</div>
                            <div class="text-sm text-gray-500">Mon, Jan 27</div>
                        </div>

                        <div class="md:col-span-3 text-right">
                            <div class="text-4xl font-black text-secondary mb-2">85 <span class="text-xl">MAD</span></div>
                            <div class="text-sm text-green-600 font-semibold mb-4">18 seats available</div>
                            <a href="trip-details.html" class="inline-block px-8 py-3 bg-secondary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Trip Card 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all">
                    <div class="grid md:grid-cols-12 gap-6 items-center">
                        <div class="md:col-span-3">
                            <div class="text-sm text-gray-500 mb-1">Departure</div>
                            <div class="text-3xl font-black text-primary">18:30</div>
                            <div class="font-semibold text-lg mt-1">Casablanca</div>
                            <div class="text-sm text-gray-500">Mon, Jan 27</div>
                        </div>

                        <div class="md:col-span-3 text-center">
                            <div class="text-sm text-gray-500 mb-2">3h 20m</div>
                            <div class="relative">
                                <div class="h-1 bg-gradient-to-r from-secondary to-accent rounded-full"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-2">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500 mt-2">Direct</div>
                        </div>

                        <div class="md:col-span-3">
                            <div class="text-sm text-gray-500 mb-1">Arrival</div>
                            <div class="text-3xl font-black text-primary">21:50</div>
                            <div class="font-semibold text-lg mt-1">Marrakech</div>
                            <div class="text-sm text-gray-500">Mon, Jan 27</div>
                        </div>

                        <div class="md:col-span-3 text-right">
                            <div class="text-4xl font-black text-secondary mb-2">75 <span class="text-xl">MAD</span></div>
                            <div class="text-sm text-green-600 font-semibold mb-4">30 seats available</div>
                            <a href="trip-details.html" class="inline-block px-8 py-3 bg-secondary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center gap-2 mt-12">
                <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-secondary transition-colors disabled:opacity-50" disabled>
                    Previous
                </button>
                <button class="px-4 py-2 bg-secondary text-white rounded-lg font-semibold">1</button>
                <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-secondary transition-colors">2</button>
                <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-secondary transition-colors">3</button>
                <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-secondary transition-colors">
                    Next
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-12 mt-20">
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
</body>
</html>
