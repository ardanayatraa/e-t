<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom scrollbar for tables on mobile */
        .table-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .table-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .table-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .table-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Mobile sidebar animation */
        .mobile-sidebar {
            transition: transform 0.3s ease-in-out;
        }

        .mobile-sidebar.open {
            transform: translateX(0);
        }

        .mobile-sidebar.closed {
            transform: translateX(-100%);
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease-in-out;
        }
    </style>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-neutral-50">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="sidebar-overlay fixed inset-0 z-20 hidden opacity-0"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Mobile Sidebar -->
        <div id="mobileSidebar"
            class="mobile-sidebar fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-neutral-200 transform -translate-x-full md:hidden">
            <div class="flex items-center justify-between h-16 px-4 bg-primary-500">
                <h1 class="text-xl font-semibold text-white">E-Ticketing Admin</h1>
                <button id="closeMobileMenu" class="text-white focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                <nav class="flex-1 space-y-2">
                    <a href="#dashboard"
                        class="flex items-center px-4 py-3 text-neutral-700 bg-primary-50 rounded-md hover:bg-primary-100 group active">
                        <i class="fas fa-tachometer-alt mr-3 text-primary-500"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#packages"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-box mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Paket Wisata</span>
                    </a>
                    <a href="#customers"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-users mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Pelanggan</span>
                    </a>
                    <a href="#availability"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-calendar-check mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Ketersediaan</span>
                    </a>
                    <a href="#payments"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-credit-card mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Pembayaran</span>
                    </a>
                    <a href="#tickets"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-ticket-alt mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>E-Ticket</span>
                    </a>
                    <a href="#bookings"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-bookmark mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Booking</span>
                    </a>
                    <a href="#reports"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-chart-bar mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Laporan</span>
                    </a>
                    <a href="#vehicles"
                        class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-primary-100 group">
                        <i class="fas fa-car mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                        <span>Tipe Mobil</span>
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t border-neutral-200">
                <a href="#logout"
                    class="flex items-center px-4 py-3 text-neutral-700 rounded-md hover:bg-red-100 group">
                    <i class="fas fa-sign-out-alt mr-3 text-neutral-500 group-hover:text-red-500"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Desktop Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r border-neutral-200">
                <div class="flex items-center justify-center h-16 px-4 bg-primary-500">
                    <h1 class="text-xl font-semibold text-white">E-Ticketing Admin</h1>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <nav class="flex-1 space-y-2">
                        <a href="#dashboard"
                            class="flex items-center px-4 py-2 text-neutral-700 bg-primary-50 rounded-md hover:bg-primary-100 group active">
                            <i class="fas fa-tachometer-alt mr-3 text-primary-500"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="#packages"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-box mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Paket Wisata</span>
                        </a>
                        <a href="#customers"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-users mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Pelanggan</span>
                        </a>
                        <a href="#availability"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-calendar-check mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Ketersediaan</span>
                        </a>
                        <a href="#payments"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-credit-card mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Pembayaran</span>
                        </a>
                        <a href="#tickets"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-ticket-alt mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>E-Ticket</span>
                        </a>
                        <a href="#bookings"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-bookmark mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Booking</span>
                        </a>
                        <a href="#reports"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-chart-bar mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Laporan</span>
                        </a>
                        <a href="#vehicles"
                            class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-primary-100 group">
                            <i class="fas fa-car mr-3 text-neutral-500 group-hover:text-primary-500"></i>
                            <span>Tipe Mobil</span>
                        </a>
                    </nav>
                </div>
                <div class="p-4 border-t border-neutral-200">
                    <a href="#logout"
                        class="flex items-center px-4 py-2 text-neutral-700 rounded-md hover:bg-red-100 group">
                        <i class="fas fa-sign-out-alt mr-3 text-neutral-500 group-hover:text-red-500"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between h-16 px-4 sm:px-6 bg-white border-b border-neutral-200">
                <button id="openMobileMenu" class="p-2 text-neutral-500 md:hidden focus:outline-none">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <div class="flex items-center ml-4 md:ml-0">

                </div>
                <div class="flex items-center">

                    <div class="ml-4 relative">
                        <div class="flex items-center cursor-pointer">
                            <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"
                                alt="User avatar">
                            <span class="ml-2 text-sm font-medium text-neutral-700 hidden sm:inline-block">Admin
                                User</span>
                            <i class="ml-1 fas fa-chevron-down text-xs text-neutral-500 hidden sm:inline-block"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Mobile Search Bar -->
            <div class="p-4 bg-white border-b border-neutral-200 sm:hidden">
                <div class="relative">
                    <input type="text" placeholder="Search..."
                        class="w-full px-4 py-2 text-sm text-neutral-700 bg-neutral-100 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <button class="absolute right-0 top-0 mt-2 mr-3 text-neutral-500">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-neutral-50 p-4 sm:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileSidebar = document.getElementById('mobileSidebar');
            const openMobileMenu = document.getElementById('openMobileMenu');
            const closeMobileMenu = document.getElementById('closeMobileMenu');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Open mobile menu
            openMobileMenu.addEventListener('click', function() {
                mobileSidebar.classList.add('open');
                mobileSidebar.classList.remove('closed');
                mobileSidebar.style.transform = 'translateX(0)';
                sidebarOverlay.classList.remove('hidden');
                setTimeout(() => {
                    sidebarOverlay.classList.add('opacity-100');
                    sidebarOverlay.classList.remove('opacity-0');
                }, 50);
                document.body.style.overflow = 'hidden';
            });

            // Close mobile menu
            function closeMobileMenuHandler() {
                mobileSidebar.classList.remove('open');
                mobileSidebar.classList.add('closed');
                mobileSidebar.style.transform = 'translateX(-100%)';
                sidebarOverlay.classList.add('opacity-0');
                sidebarOverlay.classList.remove('opacity-100');
                setTimeout(() => {
                    sidebarOverlay.classList.add('hidden');
                }, 300);
                document.body.style.overflow = '';
            }

            closeMobileMenu.addEventListener('click', closeMobileMenuHandler);
            sidebarOverlay.addEventListener('click', closeMobileMenuHandler);

            // Navigation links
            const navLinks = document.querySelectorAll('nav a, .fixed.bottom-0 a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active class from all links
                    navLinks.forEach(l => {
                        l.classList.remove('bg-primary-50', 'text-primary-500');
                        const icon = l.querySelector('i');
                        if (icon) {
                            icon.classList.remove('text-primary-500');
                            icon.classList.add('text-neutral-500');
                        }
                    });

                    // Add active class to clicked link
                    this.classList.add('bg-primary-50');
                    if (this.querySelector('i')) {
                        this.querySelector('i').classList.remove('text-neutral-500');
                        this.querySelector('i').classList.add('text-primary-500');
                    }

                    // For mobile bottom nav
                    if (this.parentElement.classList.contains('fixed')) {
                        navLinks.forEach(l => {
                            if (l.parentElement.classList.contains('fixed')) {
                                l.classList.remove('text-primary-500');
                                l.classList.add('text-neutral-500');
                            }
                        });
                        this.classList.remove('text-neutral-500');
                        this.classList.add('text-primary-500');
                    }

                    // Close sidebar on mobile
                    if (window.innerWidth < 768) {
                        closeMobileMenuHandler();
                    }
                });
            });

            // Handle resize events
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    mobileSidebar.style.transform = '';
                    sidebarOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Add touch swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            document.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            }, false);

            document.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, false);

            function handleSwipe() {
                if (touchStartX - touchEndX > 100 && touchStartX < 50) {
                    // Swipe left from edge - open menu
                    openMobileMenu.click();
                } else if (touchEndX - touchStartX > 100 && mobileSidebar.classList.contains('open')) {
                    // Swipe right when menu is open - close menu
                    closeMobileMenuHandler();
                }
            }
        });
    </script>

    @stack('modals')

    @livewireScripts
</body>

</html>
