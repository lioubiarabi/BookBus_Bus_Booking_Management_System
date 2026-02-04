<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - BookBus</title>

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
                <a href="../index.html" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-secondary to-orange-400 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-display font-black text-primary">BookBus</span>
                </a>

                <div class="flex items-center gap-6">
                    <a href="../trips.blade.php" class="text-gray-700 hover:text-secondary font-medium transition-colors">Find Trips</a>
                    <a href="dashboard.html" class="text-secondary font-semibold">My Bookings</a>
                    <a href="profile.html" class="text-gray-700 hover:text-secondary font-medium transition-colors">Profile</a>

                    <div class="flex items-center gap-4 pl-6 border-l border-gray-200">
                        <div class="text-right">
                            <div class="text-sm text-gray-500">Welcome back,</div>
                            <div class="font-semibold text-gray-800">John Doe</div>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-secondary to-orange-400 rounded-full flex items-center justify-center text-white font-bold">
                            JD
                        </div>
                        <button onclick="if(confirm('Are you sure you want to logout?')) window.location.href='../auth/login.html'"
                            class="px-4 py-2 text-gray-600 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-primary to-slate-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-5xl font-black mb-2">My Bookings</h1>
            <p class="text-xl text-gray-300">Manage your reservations and view your travel history</p>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="bg-white border-b border-gray-200 sticky top-20 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex gap-8">
                <button onclick="filterBookings('all')" class="tab-btn py-4 border-b-4 border-secondary text-secondary font-bold transition-all" data-status="all">
                    All Bookings
                </button>
                <button onclick="filterBookings('confirmed')" class="tab-btn py-4 border-b-4 border-transparent text-gray-600 font-semibold hover:text-secondary transition-all" data-status="confirmed">
                    Confirmed
                </button>
                <button onclick="filterBookings('pending')" class="tab-btn py-4 border-b-4 border-transparent text-gray-600 font-semibold hover:text-secondary transition-all" data-status="pending">
                    Pending
                </button>
                <button onclick="filterBookings('cancelled')" class="tab-btn py-4 border-b-4 border-transparent text-gray-600 font-semibold hover:text-secondary transition-all" data-status="cancelled">
                    Cancelled
                </button>
            </div>
        </div>
    </section>

    <!-- Bookings List -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-6">
                <!-- Booking Card 1 - Confirmed -->
                <div class="booking-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all" data-status="confirmed">
                    <div class="grid md:grid-cols-12 gap-6 items-center">
                        <!-- Status Badge -->
                        <div class="md:col-span-1">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Trip Info -->
                        <div class="md:col-span-7">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full uppercase">
                                    Confirmed
                                </span>
                                <span class="text-gray-500 text-sm">Booking #000123</span>
                            </div>

                            <div class="flex items-center gap-6 mb-3">
                                <div>
                                    <div class="text-3xl font-black text-primary">08:30</div>
                                    <div class="font-semibold text-lg">Casablanca</div>
                                </div>

                                <svg class="w-8 h-8 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>

                                <div>
                                    <div class="text-3xl font-black text-primary">12:00</div>
                                    <div class="font-semibold text-lg">Marrakech</div>
                                </div>
                            </div>

                            <div class="flex gap-6 text-gray-600 text-sm">
                                <span>📅 Mon, Feb 10, 2026</span>
                                <span>👤 2 Passengers</span>
                                <span>💺 Mercedes Sprinter</span>
                            </div>
                        </div>

                        <!-- Price & Actions -->
                        <div class="md:col-span-4 text-right">
                            <div class="text-4xl font-black text-secondary mb-4">160 <span class="text-xl">MAD</span></div>

                            <div class="flex flex-col gap-3">
                                <button class="px-6 py-3 bg-secondary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                                    Download Ticket
                                </button>
                                <button onclick="if(confirm('Are you sure you want to cancel this booking?')) alert('Booking cancelled')"
                                    class="px-6 py-3 border-2 border-red-500 text-red-500 font-semibold rounded-lg hover:bg-red-500 hover:text-white transition-all">
                                    Cancel Booking
                                </button>
                                <a href="../trip-details.html" class="text-secondary font-semibold hover:text-orange-600 transition-colors">
                                    View Trip Details →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Card 2 - Pending -->
                <div class="booking-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all" data-status="pending">
                    <div class="grid md:grid-cols-12 gap-6 items-center">
                        <div class="md:col-span-1">
                            <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="md:col-span-7">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full uppercase">
                                    Pending Payment
                                </span>
                                <span class="text-gray-500 text-sm">Booking #000124</span>
                            </div>

                            <div class="flex items-center gap-6 mb-3">
                                <div>
                                    <div class="text-3xl font-black text-primary">14:00</div>
                                    <div class="font-semibold text-lg">Rabat</div>
                                </div>

                                <svg class="w-8 h-8 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>

                                <div>
                                    <div class="text-3xl font-black text-primary">18:15</div>
                                    <div class="font-semibold text-lg">Tangier</div>
                                </div>
                            </div>

                            <div class="flex gap-6 text-gray-600 text-sm">
                                <span>📅 Fri, Feb 14, 2026</span>
                                <span>👤 1 Passenger</span>
                                <span>💺 Volvo Bus</span>
                            </div>
                        </div>

                        <div class="md:col-span-4 text-right">
                            <div class="text-4xl font-black text-secondary mb-4">120 <span class="text-xl">MAD</span></div>

                            <div class="flex flex-col gap-3">
                                <button class="px-6 py-3 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition-all">
                                    Complete Payment
                                </button>
                                <button onclick="if(confirm('Cancel this pending booking?')) alert('Booking cancelled')"
                                    class="px-6 py-3 border-2 border-gray-300 text-gray-600 font-semibold rounded-lg hover:border-gray-400 transition-all">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Card 3 - Cancelled -->
                <div class="booking-card bg-white rounded-2xl p-8 shadow-lg opacity-75" data-status="cancelled">
                    <div class="grid md:grid-cols-12 gap-6 items-center">
                        <div class="md:col-span-1">
                            <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="md:col-span-7">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full uppercase">
                                    Cancelled
                                </span>
                                <span class="text-gray-500 text-sm">Booking #000122</span>
                            </div>

                            <div class="flex items-center gap-6 mb-3">
                                <div>
                                    <div class="text-3xl font-black text-gray-400">18:30</div>
                                    <div class="font-semibold text-lg text-gray-500">Fes</div>
                                </div>

                                <svg class="w-8 h-8 text-gray-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>

                                <div>
                                    <div class="text-3xl font-black text-gray-400">22:30</div>
                                    <div class="font-semibold text-lg text-gray-500">Casablanca</div>
                                </div>
                            </div>

                            <div class="flex gap-6 text-gray-500 text-sm">
                                <span>📅 Thu, Feb 06, 2026</span>
                                <span>👤 1 Passenger</span>
                                <span>💺 Mercedes Bus</span>
                            </div>
                        </div>

                        <div class="md:col-span-4 text-right">
                            <div class="text-4xl font-black text-gray-400 mb-4 line-through">90 <span class="text-xl">MAD</span></div>
                            <div class="text-sm text-gray-500">Cancelled on Jan 30, 2026</div>
                            <div class="text-sm text-green-600 font-semibold mt-2">Refund: 90 MAD (Processed)</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State (hidden by default, show when no bookings) -->
            <div id="emptyState" class="hidden text-center py-20">
                <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-gray-800 mb-3">No Bookings Yet</h2>
                <p class="text-gray-600 text-lg mb-8">Start planning your journey by searching for available trips</p>
                <a href="../trips.blade.php" class="inline-block px-8 py-4 bg-secondary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-lg">
                    Find Trips
                </a>
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
                        <li><a href="../trips.blade.php" class="text-gray-400 hover:text-white transition-colors">Find Trips</a></li>
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
        function filterBookings(status) {
            // Update tab styles
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('border-secondary', 'text-secondary');
                btn.classList.add('border-transparent', 'text-gray-600');
            });

            const activeTab = document.querySelector(`[data-status="${status}"]`);
            activeTab.classList.remove('border-transparent', 'text-gray-600');
            activeTab.classList.add('border-secondary', 'text-secondary');

            // Filter bookings
            const bookings = document.querySelectorAll('.booking-card');
            let visibleCount = 0;

            bookings.forEach(card => {
                if (status === 'all' || card.dataset.status === status) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            const emptyState = document.getElementById('emptyState');
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
