<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BALI OM TOURS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #06b6d4, #0891b2, #0e7490);
        }

        .custom-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .package-card {
            transition: all 0.3s ease;
        }

        .package-card:hover {
            transform: translateY(-5px);
        }

        /* Mobile optimized flatpickr */
        .flatpickr-calendar {
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: none !important;
            width: 100% !important;
            max-width: 320px;
            font-size: 14px;
        }

        @media (max-width: 640px) {
            .flatpickr-calendar {
                max-width: 280px;
                font-size: 13px;
                left: 50% !important;
                transform: translateX(-50%) !important;
                margin: 0 !important;
            }

            .flatpickr-days {
                width: 100% !important;
            }

            .dayContainer {
                width: 100% !important;
                min-width: 100% !important;
                max-width: 100% !important;
            }

            .flatpickr-day {
                max-width: 32px !important;
                height: 32px !important;
                line-height: 32px !important;
            }

            .flatpickr-time input {
                font-size: 16px !important;
            }

            @media (max-width: 320px) {
                .flatpickr-calendar {
                    max-width: 260px;
                }

                .flatpickr-day {
                    max-width: 30px !important;
                    height: 30px !important;
                    line-height: 30px !important;
                }
            }
        }

        .flatpickr-day.selected {
            background: #0d9488 !important;
            border-color: #0d9488 !important;
        }

        .flatpickr-day:hover {
            background: #99f6e4 !important;
            border-color: #99f6e4 !important;
            color: #0d9488 !important;
        }

        .flatpickr-time .numInputWrapper span.arrowUp:after {
            border-bottom-color: #0d9488 !important;
        }

        .flatpickr-time .numInputWrapper span.arrowDown:after {
            border-top-color: #0d9488 !important;
        }

        /* Custom scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #0d9488;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #0f766e;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* Pagination styles */
        .pagination-btn {
            transition: all 0.2s ease;
            min-width: 40px;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-btn.active {
            background-color: #0d9488;
            color: white;
        }

        /* Search animation */
        @keyframes highlightSearch {
            0% {
                background-color: transparent;
            }

            30% {
                background-color: rgba(13, 148, 136, 0.1);
            }

            100% {
                background-color: transparent;
            }
        }

        .highlight-search {
            animation: highlightSearch 1.5s ease;
        }

        /* Mobile optimizations */
        @media (max-width: 640px) {
            .mobile-full-height {
                min-height: 100vh;
                max-height: 100vh;
                overflow-y: auto;
            }

            .mobile-padding {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }

            .mobile-text-center {
                text-align: center;
            }

            .mobile-stack {
                flex-direction: column;
            }

            .mobile-full-width {
                width: 100% !important;
            }

            input,
            select,
            textarea {
                font-size: 16px !important;
            }

            .touch-target {
                min-height: 44px;
                min-width: 44px;
            }
        }

        /* Sticky search bar for mobile */
        .sticky-search {
            position: sticky;
            top: 70px;
            z-index: 9;
            background-color: white;
            padding: 12px 16px;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        /* Loading indicator */
        .loading-spinner {
            border: 3px solid rgba(13, 148, 136, 0.3);
            border-radius: 50%;
            border-top: 3px solid #0d9488;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .date-loading {
            position: relative;
        }

        .date-loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        /* Confirmation Modal Styles */
        .confirmation-modal {
            backdrop-filter: blur(8px);
        }

        .modal-content {
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Participant input validation styles */
        .input-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
    @livewireStyles
</head>

<body class="bg-gray-50">
    <!-- Navigation (unchanged) -->
    <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            @php
                $path = public_path('assets/img/baliomtour.png');
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            @endphp

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="{{ $base64 }}" alt="Logo Bali Om" class="h-10 w-auto">
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="#beranda" class="text-gray-700 hover:text-teal-600 transition font-medium">Beranda</a>
                <a href="#paket" class="text-gray-700 hover:text-teal-600 transition font-medium">Paket Wisata</a>
                <a href="#tentang" class="text-gray-700 hover:text-teal-600 transition font-medium">Tentang Kami</a>
                @guest
                    <a href="/login" class="text-gray-700 hover:text-teal-600 transition font-medium">Login</a>
                @endguest
                @auth
                    <a href="/dashboard" class="text-gray-700 hover:text-teal-600 transition font-medium">Dashboard</a>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 bg-gray-100 p-3 rounded-full touch-target">
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white px-4 py-2 shadow-inner animate-fadeIn">
            <a href="#beranda"
                class="block py-4 px-4 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition">Beranda</a>
            <a href="#paket"
                class="block py-4 px-4 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition">Paket
                Wisata</a>
            <a href="#tentang"
                class="block py-4 px-4 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition">Tentang
                Kami</a>
            @guest
                <a href="/login"
                    class="block py-4 px-4 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition">Login</a>
            @endguest
            @auth
                <a href="/dashboard"
                    class="block py-4 px-4 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition">Dashboard</a>
            @endauth
        </div>
    </nav>

    <!-- Paket Wisata Section (unchanged content, only package cards) -->
    <section id="paket" class="py-16 pt-24 sm:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-6 sm:mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4">Paket Wisata</h2>
                <div
                    class="w-20 sm:w-24 h-1 bg-gradient-to-r from-teal-400 to-teal-600 mx-auto mb-4 sm:mb-6 rounded-full">
                </div>
                <p class="text-gray-600 max-w-3xl mx-auto text-base sm:text-lg px-2">Pilih paket wisata sesuai dengan
                    kebutuhan dan budget Anda.
                    Kami menawarkan berbagai pilihan destinasi menarik.</p>
            </div>

            <!-- Search Bar - Sticky on mobile -->
            <div id="searchBarContainer" class="max-w-md mx-auto mb-6 sm:mb-8 sticky-search">
                <div class="relative">
                    <input type="text" id="searchPackage" placeholder="Cari paket wisata..."
                        class="w-full px-4 py-4 sm:py-3 pl-12 pr-12 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-lg"></i>
                    </div>
                    <button id="clearSearch"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 hidden touch-target">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <!-- Filter Indicator -->
                <div id="filterIndicator" class="hidden mt-2 text-sm text-center">
                    <span class="bg-teal-100 text-teal-800 px-3 py-1 rounded-full inline-flex items-center">
                        <span id="resultCount">0</span> - paket ditemukan
                        <button id="clearFilter" class="ml-2 text-teal-600 hover:text-teal-800">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </span>
                </div>
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-8">
                <div class="text-gray-500 mb-4"><i class="fas fa-search text-5xl"></i></div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Tidak ada hasil</h3>
                <p class="text-gray-500 mb-4">Maaf, tidak ada paket wisata yang sesuai dengan pencarian Anda.</p>
                <button id="resetSearch"
                    class="bg-teal-100 text-teal-800 px-4 py-2 rounded-lg hover:bg-teal-200 transition">
                    <i class="fas fa-redo mr-2"></i> Reset Pencarian
                </button>
            </div>

            <div id="packageContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach ($paket as $item)
                    <div class="package-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition"
                        data-category="bali" data-name="{{ strtolower($item->judul) }}"
                        data-location="{{ strtolower($item->tempat) }}">
                        <div class="relative">
                            <img src="{{ $item->foto
                                ? asset('storage/' . $item->foto)
                                : 'https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=1170&q=80' }}"
                                alt="{{ $item->nama }}" class="w-full h-48 sm:h-56 object-cover" loading="lazy" />
                            @if ($item->created_at->diffInDays(now()) < 7)
                                <span
                                    class="absolute top-3 left-3 bg-teal-100 text-teal-800 text-xs font-semibold px-3 py-1 rounded-full">Terbaru</span>
                            @endif
                        </div>
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-gray-800">{{ $item->judul }}
                            </h3>
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4 line-clamp-3">
                                {{ $item->deskripsi }}</p>
                            <div class="flex items-center mb-2">
                                <i class="fas fa-map-marker-alt text-teal-600 mr-2"></i>
                                <span class="text-sm sm:text-base text-gray-600">{{ $item->tempat }}</span>
                            </div>

                            {{-- BADGE INCLUDE --}}
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="fas fa-gas-pump"></i> Bensin
                                </span>
                                <span
                                    class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="fas fa-user-tie"></i> Supir
                                </span>
                                <span
                                    class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="fas fa-parking"></i> Parkir
                                </span>
                            </div>
                            {{-- END BADGE INCLUDE --}}

                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mt-4">
                                {{-- Info Harga --}}
                                <div class="space-y-1">
                                    <span class="block text-xs text-gray-500 uppercase font-medium">Harga Mulai</span>
                                    <div class="flex items-baseline space-x-1">
                                        <span class="text-xl sm:text-2xl font-bold text-teal-600">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </span>
                                        <span class="text-xs sm:text-sm text-gray-500">/ {{ $item->durasi }}
                                            hari</span>
                                    </div>
                                </div>
                                <button
                                    onclick="bukaStep1(
                  {{ $item->paketwisata_id }},
                  '{{ addslashes($item->judul) }}',
                  {{ $item->harga }},
                  '{{ $item->foto }}'
                )"
                                    class="w-full sm:w-auto bg-teal-600 hover:bg-teal-500 text-white px-4 py-3 sm:py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 font-medium text-center">
                                    Pilih Paket
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div id="pagination" class="flex justify-center mt-8 sm:mt-10 space-x-1 sm:space-x-2 pagination-compact">
                <!-- Pagination buttons will be generated by JavaScript -->
            </div>

            <!-- Mobile Pagination Info -->
            <div id="paginationInfo" class="text-center text-sm text-gray-500 mt-2 hidden">
                Halaman <span id="currentPageInfo">1</span> dari <span id="totalPagesInfo">1</span>
            </div>

        </div>
    </section>

    <!-- Tentang Kami Section (unchanged) -->
    <section id="tentang" class="py-12 sm:py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-16">
                <!-- Gambar -->
                <div class="w-full lg:w-1/2">
                    <img src="https://images.unsplash.com/photo-1566559532512-004a6df74db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80"
                        alt="Wisata Indonesia"
                        class="rounded-2xl shadow-xl w-full object-cover h-64 sm:h-80 md:h-[400px]" loading="lazy" />
                </div>
                <!-- Teks -->
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3 sm:mb-4">Tentang Bali Om Tour</h2>
                    <div
                        class="w-16 sm:w-20 h-1 bg-gradient-to-r from-teal-400 to-teal-600 mx-auto lg:mx-0 mb-4 sm:mb-6 rounded-full">
                    </div>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-6 sm:mb-8">
                        Bali Om Tours was founded by Indah Sari and her partner Arnd in early 2014. The mission of Bali
                        Om Tours is to share our personal experiences and the places we've found on our journey
                        throughout Indonesia. Here you will get all the necessary information about all your trips
                        throughout Indonesia without any kind of Pressure to buy.

                        We are proud of our Repeating Customers and the many good Recommendations. Our professional
                        Staffcrew will guide you with detailed Infos about all the activities and will give you the
                        choice to decide in an comfortable atmosphere in all our Offices. All Activities sold in our
                        Offices are permanently checked out about safety and comfortability,so You as our Guest will get
                        an everlasting positive impression worth to remember.
                    </p>
                    <a href="#paket"
                        class="inline-block bg-gradient-to-r from-teal-500 to-teal-700 text-white font-medium py-3 px-6 sm:py-3 sm:px-8 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1">
                        Lihat Paket Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- MODIFIED: Booking Modal with Enhanced Features -->
    <div id="kontainerPicker"
        class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-start justify-center p-0 z-50 backdrop-blur-sm overflow-y-auto">
        <div
            class="bg-white rounded-xl sm:rounded-2xl shadow-2xl w-full max-w-sm sm:max-w-lg md:max-w-4xl my-4 sm:my-8 mx-3 sm:mx-auto animate-fadeIn">
            {{-- STEP 1 --}}
            <div id="step1" class="p-4 sm:p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg sm:text-2xl font-bold text-gray-800">1. Pilih Tanggal & Mobil</h4>
                    <button onclick="tutupPicker()" class="text-gray-500 hover:text-gray-700 p-2 touch-target">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- ADDED: Booking Time Restriction Warning -->
                <div id="peringatanWaktuBooking"
                    class="hidden mb-4 p-3 bg-orange-100 border border-orange-300 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-orange-600 mr-2"></i>
                        <span class="text-orange-800 text-sm font-medium">
                            Booking untuk besok hanya tersedia sampai jam 17:00. Setelah itu semua mobil tidak tersedia
                            karena kantor tutup jam 21:00.
                        </span>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row lg:gap-6">
                    {{-- Kalender --}}
                    <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                        <div class="bg-gray-50 p-3 sm:p-4 rounded-xl mb-4">
                            <label class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Pilih
                                Tanggal</label>
                            <input id="tglPicker" type="text"
                                class="w-full cursor-pointer rounded-lg border border-gray-300 shadow-sm py-3 px-3 focus:outline-none focus:ring-2 focus:ring-teal-500 text-center font-medium text-sm sm:text-base"
                                readonly placeholder="Pilih Tanggal" />

                            <!-- Loading indicator for date selection -->
                            <div id="indikatorLoadingTanggal" class="hidden mt-2">
                                <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                                    <div class="loading-spinner"></div>
                                    <span>Memeriksa ketersediaan mobil...</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-3 sm:p-4 rounded-xl">
                            <label class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Jam Mulai</label>
                            <input id="timePicker" type="text" readonly
                                class="w-full cursor-pointer rounded-lg border border-gray-300 shadow-sm py-3 px-3 focus:outline-none focus:ring-2 focus:ring-teal-500 text-center font-medium text-sm sm:text-base"
                                placeholder="Pilih Jam" />
                        </div>
                    </div>

                    {{-- Mobil --}}
                    <div class="w-full lg:w-1/2">
                        <div class="flex justify-between items-center mb-3">
                            <h5 class="font-medium text-gray-700 text-base sm:text-lg">Mobil Tersedia</h5>
                        </div>

                        <!-- MODIFIED: No vehicles available message -->
                        <div id="pesanTidakAdaMobil" class="hidden text-center py-8">
                            <div class="text-gray-500 mb-4">
                                <i class="fas fa-car text-4xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tidak ada mobil yang tersedia</h3>
                            <p class="text-gray-500 text-sm">Silahkan pilih tanggal lain</p>
                        </div>

                        <div id="daftarKendaraan"
                            class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-64 sm:max-h-80 overflow-y-auto pr-2 scrollbar-thin">
                            @foreach ($mobil as $m)
                                <button type="button" data-tipe="{{ $m->nama_kendaraan }}"
                                    data-id="{{ $m->mobil_id }}" data-seats="{{ $m->jumlah_tempat_duduk }}"
                                    class="tombol-kendaraan flex flex-col items-center text-center bg-white p-3 rounded-xl shadow-md
                                    border-2 border-transparent hover:border-teal-400 transition duration-200 hover:shadow-lg">
                                    <div class="w-full h-24 sm:h-28 mb-2 sm:mb-3 overflow-hidden rounded-lg">
                                        <img src="{{ $m->foto ? asset('storage/' . $m->foto) : asset('images/default-car.jpg') }}"
                                            alt="{{ $m->nama_kendaraan }}" class="w-full h-full object-cover"
                                            loading="lazy" />
                                    </div>
                                    <span
                                        class="font-semibold text-gray-800 text-sm sm:text-base">{{ $m->nama_kendaraan }}</span>
                                    <span class="text-xs sm:text-sm text-gray-500 mt-1">{{ $m->jumlah_tempat_duduk }}
                                        Kursi</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-6 sm:mt-8 flex justify-end space-x-3">
                    <button onclick="tutupPicker()"
                        class="px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition font-medium text-sm sm:text-base">
                        Batal
                    </button>
                    <button id="tombolLanjutStep" onclick="keStep2()" disabled
                        class="px-4 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg shadow-md hover:shadow-lg transition font-medium text-sm sm:text-base opacity-50 cursor-not-allowed">
                        Input Data Pemesan
                    </button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div id="step2" class="hidden p-4 sm:p-6 bg-gray-50">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg sm:text-2xl font-bold text-gray-800">2. Lengkapi Data Pemesan</h4>
                    <button onclick="tutupPicker()" class="text-gray-500 hover:text-gray-700 p-2 touch-target">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                {{-- PREVIEW FOTO --}}
                <div id="wrapperPreviewFoto" class="hidden mb-4 sm:mb-6">
                    <img id="previewFoto" src="/placeholder.svg" alt="Foto Paket"
                        class="w-full h-40 sm:h-48 object-cover rounded-xl shadow-md" />
                </div>

                <form action="{{ route('pemesanan.store') }}" method="POST"
                    class="flex flex-col lg:flex-row lg:gap-6">
                    @csrf

                    {{-- Ringkasan Pemesanan --}}
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 space-y-4">
                        <div class="bg-white p-4 sm:p-5 rounded-xl shadow-lg">
                            <h5 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4 text-gray-700">Ringkasan
                                Pemesanan</h5>
                            <ul class="space-y-2 sm:space-y-3 text-gray-600 text-sm sm:text-base">
                                <li class="flex items-center p-2 hover:bg-gray-50 rounded-lg transition">
                                    <i class="fas fa-box-open text-teal-600 w-5 sm:w-6 text-center"></i>
                                    <span class="ml-2 sm:ml-3 font-medium">Paket:</span>
                                    <span id="previewPaket"
                                        class="ml-auto font-medium text-gray-800 text-right"></span>
                                </li>
                                <li class="flex items-center p-2 hover:bg-gray-50 rounded-lg transition">
                                    <i class="fas fa-calendar-alt text-teal-600 w-5 sm:w-6 text-center"></i>
                                    <span class="ml-2 sm:ml-3 font-medium">Tanggal:</span>
                                    <span id="previewTanggal" class="ml-auto font-medium text-gray-800"></span>
                                </li>
                                <li class="flex items-center p-2 hover:bg-gray-50 rounded-lg transition">
                                    <i class="fas fa-clock text-teal-600 w-5 sm:w-6 text-center"></i>
                                    <span class="ml-2 sm:ml-3 font-medium">Jam Mulai:</span>
                                    <span id="previewWaktu" class="ml-auto font-medium text-gray-800"></span>
                                </li>
                                <li class="flex items-center p-2 hover:bg-gray-50 rounded-lg transition">
                                    <i class="fas fa-car-side text-teal-600 w-5 sm:w-6 text-center"></i>
                                    <span class="ml-2 sm:ml-3 font-medium">Mobil:</span>
                                    <span id="previewKendaraan"
                                        class="ml-auto font-medium text-gray-800 text-right"></span>
                                </li>
                                <li class="flex items-center p-2 hover:bg-gray-50 rounded-lg transition">
                                    <i class="fas fa-tag text-teal-600 w-5 sm:w-6 text-center"></i>
                                    <span class="ml-2 sm:ml-3 font-medium">Harga:</span>
                                    <span id="previewHarga" class="ml-auto font-semibold text-teal-600"></span>
                                </li>
                            </ul>
                        </div>

                        {{-- Hidden fields --}}
                        <input type="hidden" name="paket_id" id="inputPaketId">
                        <input type="hidden" name="tanggal" id="inputTanggal">
                        <input type="hidden" name="kendaraan" id="inputKendaraan">
                        <input type="hidden" name="mobil_id" id="inputMobilId">
                        <input type="hidden" name="harga" id="inputHarga">
                        <input type="hidden" name="jumlah_peserta" id="inputPeserta">
                        <input type="hidden" name="jam_mulai" id="inputWaktu">
                    </div>

                    {{-- Form Data Pemesan --}}
                    <div class="w-full lg:w-1/2 space-y-4">
                        <div class="bg-white p-4 sm:p-5 rounded-xl shadow-lg space-y-3 sm:space-y-4">
                            <h5 class="text-base sm:text-lg font-semibold text-gray-700 mb-1 sm:mb-2">Detail Pemesan
                            </h5>
                            <label class="block">
                                <span class="text-gray-600 font-medium text-sm sm:text-base">Nama Pemesan</span>
                                <input type="text" name="nama_pemesan" required
                                    class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm sm:text-base"
                                    placeholder="Masukkan nama lengkap" />
                            </label>
                            <label class="block">
                                <span class="text-gray-600 font-medium text-sm sm:text-base">Email</span>
                                <input type="email" name="email" required
                                    class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm sm:text-base"
                                    placeholder="contoh@email.com" />
                            </label>
                            <label class="block">
                                <span class="text-gray-600 font-medium text-sm sm:text-base">Alamat</span>
                                <input type="text" name="alamat" required
                                    class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm sm:text-base"
                                    placeholder="Masukkan alamat lengkap" />
                            </label>
                            <label class="block">
                                <span class="text-gray-600 font-medium text-sm sm:text-base">Nomor WhatsApp</span>
                                <input type="text" name="nomor_whatsapp" required
                                    class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm sm:text-base"
                                    placeholder="08xxxxxxxxxx" />
                            </label>

                            <!-- MODIFIED: Enhanced Participant Input with Validation -->
                            <label class="block">
                                <span class="text-gray-600 font-medium text-sm sm:text-base">Jumlah Peserta</span>
                                <div class="relative">
                                    <input id="inputJumlahPeserta" type="text" name="jumlah_peserta"
                                        value="" inputmode="numeric" pattern="\d*"
                                        oninput="validasiJumlahPeserta(this)" required
                                        class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                        focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm sm:text-base"
                                        placeholder="Masukkan jumlah peserta" />
                                    <div id="infoPeserta"
                                        class="hidden absolute right-3 top-1/2 transform -translate-y-1/2">
                                        <span class="text-xs text-gray-500">Maks: <span
                                                id="maksimalPeserta">0</span></span>
                                    </div>
                                </div>
                                <div id="errorPeserta" class="hidden error-message">
                                    Jumlah peserta tidak boleh melebihi kapasitas mobil
                                </div>
                            </label>
                        </div>

                        {{-- Aksi --}}
                        <div class="flex justify-between mt-4 sm:mt-6">
                            <button type="button" onclick="kembaliKeStep1()"
                                class="px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition font-medium text-sm sm:text-base">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </button>
                            <button type="button" onclick="tampilkanModalKonfirmasi()" id="tombolKonfirmasiBooking"
                                class="px-4 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg shadow-md hover:shadow-lg transition font-medium text-sm sm:text-base">
                                Konfirmasi & Bayar <i class="fas fa-check ml-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- NEW: Confirmation Modal -->
    <div id="modalKonfirmasi"
        class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center p-4 z-50 confirmation-modal">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md modal-content">
            <div class="p-6 text-center">
                <!-- Success Icon -->
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                    <i class="fas fa-check text-green-600 text-2xl"></i>
                </div>

                <!-- Title -->
                <h3 class="text-xl font-bold text-gray-900 mb-4">Booking Berhasil!</h3>

                <!-- Message -->
                <div class="text-gray-600 text-sm space-y-3 mb-6">
                    <p class="font-medium">E-ticket akan didapatkan setelah melakukan pembayaran, segera melakukan
                        pembayaran di kantor kami, sementara booking Anda akan kami hold selama 4 jam.</p>
                </div>

                <!-- Important Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-6 text-left">
                    <h4 class="font-semibold text-blue-800 text-sm mb-2">
                        <i class="fas fa-info-circle mr-1"></i> Informasi Penting:
                    </h4>
                    <ul class="text-blue-700 text-xs space-y-1">
                        <li>• Untuk booking online besok atau 1 hari setelahnya, customer hanya bisa booking maksimal
                            jam 17:00</li>
                        <li>• Jika di atas jam 17:00, semua mobil tidak tersedia karena kantor tutup jam 21:00</li>
                        <li>• Setiap booking masuk, mobil akan di-hold selama 4 jam dan tidak tersedia di masa holding
                        </li>
                        <li>• Jika belum terkonfirmasi dalam 4 jam, mobil akan tersedia lagi</li>
                    </ul>
                </div>

                <!-- Action Button -->
                <button onclick="konfirmasiDanSubmit()"
                    class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-medium py-3 px-6 rounded-lg hover:shadow-lg transition">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>

    <!-- Footer (unchanged) -->
    <footer class="bg-gray-800 text-white py-8 sm:py-12">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <div class="text-center md:text-left">
                    @php
                        $path = public_path('assets/img/baliomtour.png');
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    @endphp

                    <!-- Logo -->
                    <div class="flex items-center mb-3 gap-3">
                        <img src="{{ $base64 }}" alt="Logo Bali Om" class="h-10 w-auto">
                    </div>
                    <p class="text-gray-300 mb-4 text-sm sm:text-base">Menyediakan pengalaman wisata terbaik di Bali
                        dengan pelayanan profesional dan harga terjangkau.</p>
                    <div class="flex space-x-4 justify-center md:justify-start">
                        <a href="#" class="text-gray-300 hover:text-teal-400 transition p-2 touch-target"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-300 hover:text-teal-400 transition p-2 touch-target"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-300 hover:text-teal-400 transition p-2 touch-target"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-3 sm:mb-4">Kontak Kami</h3>
                    <ul class="space-y-2 sm:space-y-3 text-gray-300 text-sm sm:text-base">
                        <li class="flex items-start justify-center md:justify-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-teal-400"></i>
                            <span>Jl. Bisma No. 3 Ubud, Gianyar Bali 80571</span>
                        </li>
                        <li class="flex items-start justify-center md:justify-start">
                            <i class="fas fa-phone-alt mt-1 mr-3 text-teal-400"></i>
                            <span>+62 822 3739 7076</span>
                        </li>
                        <li class="flex items-start justify-center md:justify-start">
                            <i class="fas fa-envelope mt-1 mr-3 text-teal-400"></i>
                            <span>info@baliomtours.com</span>
                        </li>
                    </ul>
                </div>

                <div class="text-center lg:text-left">
                    <h3 class="text-lg font-semibold mb-3 sm:mb-4">Jam Operasional</h3>
                    <ul class="space-y-2 text-gray-300 text-sm sm:text-base max-w-xs mx-auto lg:mx-0">
                        <li class="flex justify-between">
                            <span>Senin - Jumat:</span>
                            <span>08:00 - 17:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Sabtu:</span>
                            <span>09:00 - 15:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Minggu:</span>
                            <span>Tutup</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; 2025 Bali Om Tour. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // URL dasar untuk storage
            const urlStorage = "{{ asset('storage') }}";
            const urlApi = "{{ route('check-availability') }}";

            // State untuk menyimpan pilihan
            const terpilih = {
                paketId: null,
                paketNama: '',
                harga: 0,
                tanggal: '',
                kendaraanNama: '',
                kendaraanId: null,
                fotoPath: '',
                jumlah_peserta: '',
                waktu: '',
                maksKursi: 0 // Melacak maksimal kursi untuk kendaraan yang dipilih
            };

            // Elemen UI
            const indikatorLoadingTanggal = document.getElementById('indikatorLoadingTanggal');
            const pesanTidakAdaMobil = document.getElementById('pesanTidakAdaMobil');
            const tombolLanjutStep = document.getElementById('tombolLanjutStep');
            const daftarKendaraan = document.getElementById('daftarKendaraan');
            const peringatanWaktuBooking = document.getElementById('peringatanWaktuBooking');

            // DIPERBAIKI: Cek apakah booking diizinkan berdasarkan pembatasan waktu
            function apakahBookingDiizinkan(tanggalTerpilih) {
                const sekarang = new Date();
                const terpilih = new Date(tanggalTerpilih);
                const besok = new Date();
                besok.setDate(besok.getDate() + 1);

                // Jika booking untuk besok dan waktu sekarang sudah lewat jam 17:00
                if (terpilih.toDateString() === besok.toDateString()) {
                    const jamSekarang = sekarang.getHours();
                    if (jamSekarang >= 17) {
                        return false;
                    }
                }

                return true;
            }

            // Tampilkan/sembunyikan peringatan waktu booking
            function perbaruiPeringatanWaktuBooking(tanggalTerpilih) {
                if (!apakahBookingDiizinkan(tanggalTerpilih)) {
                    peringatanWaktuBooking.classList.remove('hidden');
                } else {
                    peringatanWaktuBooking.classList.add('hidden');
                }
            }

            // Inisialisasi Flatpickr dengan bahasa Indonesia
            flatpickr("#tglPicker", {
                inline: true,
                locale: "id",
                dateFormat: "Y-m-d",
                minDate: "today",
                defaultDate: "today",
                static: true,
                onChange: (dates, str) => {
                    terpilih.tanggal = str;
                    perbaruiPeringatanWaktuBooking(str);
                    cekKetersediaanKendaraan(str);
                }
            });

            // Time picker
            flatpickr("#timePicker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 30,
                onChange: (dates, str) => {
                    terpilih.waktu = str;
                    aktifkanTombolLanjutJikaSiap();
                }
            });

            const picker = document.getElementById('kontainerPicker');
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');

            /**
             * DIPERBAIKI: Fungsi untuk memeriksa ketersediaan kendaraan berdasarkan tanggal
             * Sekarang API mengembalikan daftar mobil yang TERSEDIA, bukan yang dibooking
             */
            function cekKetersediaanKendaraan(tanggal) {
                resetPilihanKendaraan();
                indikatorLoadingTanggal.classList.remove('hidden');

                // Cek pembatasan waktu terlebih dahulu
                if (!apakahBookingDiizinkan(tanggal)) {
                    indikatorLoadingTanggal.classList.add('hidden');
                    // Sembunyikan semua kendaraan jika booking tidak diizinkan
                    perbaruiKetersediaanKendaraan([]);
                    return;
                }

                fetch(`${urlApi}?date=${tanggal}`)
                    .then(response => response.json())
                    .then(data => {
                        indikatorLoadingTanggal.classList.add('hidden');
                        // DIPERBAIKI: Sekarang data berisi ID mobil yang TERSEDIA
                        perbaruiKetersediaanKendaraan(data || []);
                    })
                    .catch(error => {
                        console.error('Error saat mengecek ketersediaan:', error);
                        indikatorLoadingTanggal.classList.add('hidden');
                        gunakanDataStatik();
                    });
            }

            // Dapatkan semua ID kendaraan untuk disembunyikan ketika booking tidak diizinkan
            function dapatkanSemuaIdKendaraan() {
                const tombolKendaraan = document.querySelectorAll('.tombol-kendaraan');
                return Array.from(tombolKendaraan).map(btn => parseInt(btn.dataset.id));
            }

            function gunakanDataStatik() {
                // Data statis: mobil dengan ID 1 dan 3 yang tersedia
                const kendaraanTersedia = [1, 3];
                perbaruiKetersediaanKendaraan(kendaraanTersedia);
            }

            /**
             * DIPERBAIKI: Fungsi untuk memperbarui ketersediaan kendaraan
             * Sekarang hanya menampilkan kendaraan yang tersedia, menyembunyikan yang tidak tersedia
             */
            function perbaruiKetersediaanKendaraan(idKendaraanTersedia) {
                const tombolKendaraan = document.querySelectorAll('.tombol-kendaraan');
                let adaKendaraanTersedia = false;

                tombolKendaraan.forEach(btn => {
                    const idKendaraan = parseInt(btn.dataset.id);

                    // DIPERBAIKI: Logika kebalikan - tampilkan jika ID ada dalam daftar tersedia
                    if (idKendaraanTersedia.includes(idKendaraan)) {
                        // Kendaraan TERSEDIA
                        btn.style.display = 'flex';
                        btn.disabled = false;
                        adaKendaraanTersedia = true;
                    } else {
                        // Kendaraan TIDAK tersedia
                        btn.style.display = 'none';
                    }
                });

                // Tampilkan/sembunyikan pesan tidak ada kendaraan dan daftar kendaraan
                if (!adaKendaraanTersedia) {
                    pesanTidakAdaMobil.classList.remove('hidden');
                    daftarKendaraan.classList.add('hidden');
                } else {
                    pesanTidakAdaMobil.classList.add('hidden');
                    daftarKendaraan.classList.remove('hidden');
                }

                aktifkanTombolLanjutJikaSiap();
            }

            function resetPilihanKendaraan() {
                terpilih.kendaraanId = null;
                terpilih.kendaraanNama = '';
                terpilih.maksKursi = 0;

                document.querySelectorAll('.tombol-kendaraan').forEach(btn => {
                    btn.classList.remove('border-teal-400');
                    btn.style.display = 'flex';
                    btn.disabled = false;
                });

                pesanTidakAdaMobil.classList.add('hidden');
                daftarKendaraan.classList.remove('hidden');
                aktifkanTombolLanjutJikaSiap();
            }

            function aktifkanTombolLanjutJikaSiap() {
                if (terpilih.tanggal && terpilih.waktu && terpilih.kendaraanId) {
                    tombolLanjutStep.disabled = false;
                    tombolLanjutStep.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    tombolLanjutStep.disabled = true;
                    tombolLanjutStep.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            // DIPERBAIKI: Fungsi dengan nama Indonesia
            window.bukaStep1 = function(id, nama, hr, foto) {
                terpilih.paketId = id;
                terpilih.paketNama = nama;
                terpilih.harga = hr;
                terpilih.fotoPath = foto ? urlStorage + '/' + foto : '';

                resetPilihanKendaraan();

                const hariIni = new Date();
                const tahun = hariIni.getFullYear();
                const bulan = String(hariIni.getMonth() + 1).padStart(2, '0');
                const hari = String(hariIni.getDate()).padStart(2, '0');
                const tanggalTerformat = `${tahun}-${bulan}-${hari}`;

                terpilih.tanggal = tanggalTerformat;
                perbaruiPeringatanWaktuBooking(tanggalTerformat);

                setTimeout(() => {
                    cekKetersediaanKendaraan(tanggalTerformat);
                }, 100);

                picker.classList.remove('hidden');
                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                document.body.style.overflow = 'hidden';
            };

            // Event listener untuk tombol kendaraan dengan pelacakan kursi yang ditingkatkan
            document.querySelectorAll('.tombol-kendaraan').forEach(btn => {
                btn.addEventListener('click', () => {
                    if (btn.style.display === 'none') return;

                    terpilih.kendaraanId = btn.dataset.id;
                    terpilih.kendaraanNama = btn.dataset.tipe;
                    terpilih.maksKursi = parseInt(btn.dataset.seats);

                    document.querySelectorAll('.tombol-kendaraan')
                        .forEach(b => b.classList.remove('border-teal-400'));
                    btn.classList.add('border-teal-400');

                    aktifkanTombolLanjutJikaSiap();
                });
            });

            window.keStep2 = function() {
                if (!terpilih.tanggal) return alert('Pilih tanggal dahulu');
                if (!terpilih.waktu) return alert('Pilih mobil dahulu');
                if (!terpilih.kendaraanId) return alert('Pilih mobil dahulu');

                // Isi preview
                document.getElementById('previewPaket').innerText = terpilih.paketNama;
                document.getElementById('previewTanggal').innerText = formatTanggalTampilan(terpilih.tanggal);
                document.getElementById('previewWaktu').innerText = terpilih.waktu;
                document.getElementById('previewKendaraan').innerText = terpilih.kendaraanNama;
                document.getElementById('previewHarga').innerText =
                    new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(terpilih.harga);

                // Tampilkan foto
                const fotoEl = document.getElementById('previewFoto');
                fotoEl.src = terpilih.fotoPath || '/placeholder.svg';
                document.getElementById('wrapperPreviewFoto').classList.remove('hidden');

                // Isi input tersembunyi
                document.getElementById('inputPaketId').value = terpilih.paketId;
                document.getElementById('inputTanggal').value = terpilih.tanggal;
                document.getElementById('inputKendaraan').value = terpilih.kendaraanNama;
                document.getElementById('inputMobilId').value = terpilih.kendaraanId;
                document.getElementById('inputHarga').value = terpilih.harga;
                document.getElementById('inputPeserta').value = terpilih.jumlah_peserta;
                document.getElementById('inputWaktu').value = terpilih.waktu;

                // Perbarui input peserta dengan informasi batas kursi
                perbaruiInputPeserta();

                if (window.innerWidth < 768) {
                    window.scrollTo(0, 0);
                }

                step1.classList.add('hidden');
                step2.classList.remove('hidden');
            };

            // Perbarui input peserta dengan informasi batas kursi
            function perbaruiInputPeserta() {
                const infoPeserta = document.getElementById('infoPeserta');
                const maksimalPeserta = document.getElementById('maksimalPeserta');

                if (terpilih.maksKursi > 0) {
                    maksimalPeserta.textContent = terpilih.maksKursi;
                    infoPeserta.classList.remove('hidden');
                } else {
                    infoPeserta.classList.add('hidden');
                }
            }

            // DIPERBAIKI: Validasi jumlah peserta dengan nama Indonesia
            window.validasiJumlahPeserta = function(input) {
                // Hapus karakter non-numerik
                input.value = input.value.replace(/\D/g, '');

                const jumlah = parseInt(input.value) || 0;
                const divError = document.getElementById('errorPeserta');

                if (jumlah > terpilih.maksKursi && terpilih.maksKursi > 0) {
                    input.classList.add('input-error');
                    divError.classList.remove('hidden');
                    divError.textContent =
                        `Jumlah peserta tidak boleh melebihi ${terpilih.maksKursi} orang (kapasitas mobil)`;

                    // Nonaktifkan tombol submit
                    document.getElementById('tombolKonfirmasiBooking').disabled = true;
                    document.getElementById('tombolKonfirmasiBooking').classList.add('opacity-50',
                        'cursor-not-allowed');
                } else {
                    input.classList.remove('input-error');
                    divError.classList.add('hidden');

                    // Aktifkan tombol submit
                    document.getElementById('tombolKonfirmasiBooking').disabled = false;
                    document.getElementById('tombolKonfirmasiBooking').classList.remove('opacity-50',
                        'cursor-not-allowed');
                }

                terpilih.jumlah_peserta = input.value;
            };

            function formatTanggalTampilan(strTanggal) {
                if (!strTanggal) return '';

                const bagian = strTanggal.split('-');
                if (bagian.length !== 3) return strTanggal;

                return `${bagian[2]}-${bagian[1]}-${bagian[0]}`;
            }

            window.kembaliKeStep1 = function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');

                if (window.innerWidth < 768) {
                    window.scrollTo(0, 0);
                }
            };

            window.tutupPicker = function() {
                picker.classList.add('hidden');
                document.body.style.overflow = 'auto';
            };

            // Tampilkan modal konfirmasi setelah booking berhasil
            window.tampilkanModalKonfirmasi = function() {
                document.getElementById('modalKonfirmasi').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            };

            // Tutup modal konfirmasi
            window.tutupModalKonfirmasi = function() {
                document.getElementById('modalKonfirmasi').classList.add('hidden');
                document.body.style.overflow = 'auto';

                // Tutup juga picker booking
                tutupPicker();

                // Reset form
                resetFormBooking();
            };

            // Reset form booking
            function resetFormBooking() {
                // Reset state terpilih
                terpilih.paketId = null;
                terpilih.paketNama = '';
                terpilih.harga = 0;
                terpilih.tanggal = '';
                terpilih.kendaraanNama = '';
                terpilih.kendaraanId = null;
                terpilih.fotoPath = '';
                terpilih.jumlah_peserta = '';
                terpilih.waktu = '';
                terpilih.maksKursi = 0;

                // Reset input form
                document.querySelector('form').reset();

                // Reset validasi peserta
                const inputPeserta = document.getElementById('inputJumlahPeserta');
                const divError = document.getElementById('errorPeserta');
                inputPeserta.classList.remove('input-error');
                divError.classList.add('hidden');

                // Reset pilihan kendaraan
                resetPilihanKendaraan();
            }

            // Konfirmasi dan submit form
            window.konfirmasiDanSubmit = function() {
                // Validasi sekali lagi sebelum submit
                const jumlahPeserta = parseInt(document.getElementById('inputJumlahPeserta').value) || 0;
                if (jumlahPeserta > terpilih.maksKursi && terpilih.maksKursi > 0) {
                    alert(`Jumlah peserta tidak boleh melebihi ${terpilih.maksKursi} orang`);
                    return;
                }

                // Submit form
                document.querySelector('form').submit();
            };

            document.querySelector('form').addEventListener('submit', function(e) {
                // Biarkan form submit normal tanpa validasi tambahan
                // karena validasi sudah dilakukan di konfirmasiDanSubmit()
            });

            // Handle resize untuk kalender responsif
            window.addEventListener('resize', () => {
                if (document.querySelector('.flatpickr-calendar')) {
                    const tanggalSekarang = flatpickr("#tglPicker").selectedDates[0];
                    flatpickr("#tglPicker").destroy();

                    flatpickr("#tglPicker", {
                        inline: true,
                        locale: "id",
                        dateFormat: "Y-m-d",
                        minDate: "today",
                        defaultDate: tanggalSekarang,
                        static: true,
                        onChange: (dates, str) => {
                            terpilih.tanggal = str;
                            perbaruiPeringatanWaktuBooking(str);
                            cekKetersediaanKendaraan(str);
                        }
                    });
                }

                perbaruiTampilanPaginasi();
            });

            // Fungsi pagination dan pencarian (tidak berubah)
            const paketPerHalaman = 6;
            const kontainerPaket = document.getElementById('packageContainer');
            const kontainerPaginasi = document.getElementById('pagination');
            const infoPaginasi = document.getElementById('paginationInfo');
            const infoHalamanSekarang = document.getElementById('currentPageInfo');
            const infoTotalHalaman = document.getElementById('totalPagesInfo');
            const inputPencarian = document.getElementById('searchPackage');
            const tombolHapusPencarian = document.getElementById('clearSearch');
            const pesanTidakAdaHasil = document.getElementById('noResults');
            const tombolResetPencarian = document.getElementById('resetSearch');
            const indikatorFilter = document.getElementById('filterIndicator');
            const jumlahHasil = document.getElementById('resultCount');
            const tombolHapusFilter = document.getElementById('clearFilter');

            const semuaPaket = Array.from(kontainerPaket.querySelectorAll('.package-card'));
            let paketTerfilter = [...semuaPaket];
            let halamanSekarang = 1;

            function perbaruiTampilanPaginasi() {
                const tampilMobile = window.innerWidth < 480;

                if (tampilMobile) {
                    kontainerPaginasi.classList.add('pagination-compact');
                    infoPaginasi.classList.remove('hidden');
                } else {
                    kontainerPaginasi.classList.remove('pagination-compact');
                    infoPaginasi.classList.add('hidden');
                }
            }

            function inisialisasiPaginasi() {
                kontainerPaginasi.innerHTML = '';

                const totalHalaman = Math.ceil(paketTerfilter.length / paketPerHalaman);

                infoHalamanSekarang.textContent = halamanSekarang;
                infoTotalHalaman.textContent = totalHalaman;

                if (totalHalaman > 1) {
                    const tombolSebelum = document.createElement('button');
                    tombolSebelum.className =
                        'pagination-btn px-3 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 touch-target';
                    tombolSebelum.innerHTML = '<i class="fas fa-chevron-left"></i>';
                    tombolSebelum.disabled = halamanSekarang === 1;
                    tombolSebelum.style.opacity = halamanSekarang === 1 ? '0.5' : '1';
                    tombolSebelum.addEventListener('click', () => {
                        if (halamanSekarang > 1) {
                            halamanSekarang--;
                            renderPaket();
                            if (window.innerWidth < 768) {
                                document.getElementById('searchBarContainer').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        }
                    });
                    kontainerPaginasi.appendChild(tombolSebelum);

                    for (let i = 1; i <= totalHalaman; i++) {
                        const tombolHalaman = document.createElement('button');
                        tombolHalaman.className =
                            `pagination-btn pagination-number px-3 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 touch-target ${halamanSekarang === i ? 'active pagination-current' : ''}`;
                        tombolHalaman.textContent = i;
                        tombolHalaman.addEventListener('click', () => {
                            halamanSekarang = i;
                            renderPaket();
                            if (window.innerWidth < 768) {
                                document.getElementById('searchBarContainer').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        });
                        kontainerPaginasi.appendChild(tombolHalaman);
                    }

                    const tombolSelanjutnya = document.createElement('button');
                    tombolSelanjutnya.className =
                        'pagination-btn px-3 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 touch-target';
                    tombolSelanjutnya.innerHTML = '<i class="fas fa-chevron-right"></i>';
                    tombolSelanjutnya.disabled = halamanSekarang === totalHalaman;
                    tombolSelanjutnya.style.opacity = halamanSekarang === totalHalaman ? '0.5' : '1';
                    tombolSelanjutnya.addEventListener('click', () => {
                        if (halamanSekarang < totalHalaman) {
                            halamanSekarang++;
                            renderPaket();
                            if (window.innerWidth < 768) {
                                document.getElementById('searchBarContainer').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        }
                    });
                    kontainerPaginasi.appendChild(tombolSelanjutnya);
                }
            }

            function renderPaket() {
                semuaPaket.forEach(pkg => {
                    pkg.classList.add('hidden');
                });

                if (paketTerfilter.length === 0) {
                    pesanTidakAdaHasil.classList.remove('hidden');
                    kontainerPaginasi.classList.add('hidden');
                    infoPaginasi.classList.add('hidden');

                    if (inputPencarian.value.trim() !== '') {
                        indikatorFilter.classList.remove('hidden');
                        jumlahHasil.textContent = '0';
                    } else {
                        indikatorFilter.classList.add('hidden');
                    }
                } else {
                    pesanTidakAdaHasil.classList.add('hidden');
                    kontainerPaginasi.classList.remove('hidden');

                    if (inputPencarian.value.trim() !== '') {
                        indikatorFilter.classList.remove('hidden');
                        jumlahHasil.textContent = paketTerfilter.length;
                    } else {
                        indikatorFilter.classList.add('hidden');
                    }

                    const indeksAwal = (halamanSekarang - 1) * paketPerHalaman;
                    const indeksAkhir = Math.min(indeksAwal + paketPerHalaman, paketTerfilter.length);

                    for (let i = indeksAwal; i < indeksAkhir; i++) {
                        paketTerfilter[i].classList.remove('hidden');
                    }

                    inisialisasiPaginasi();
                    perbaruiTampilanPaginasi();
                }
            }

            function filterPaket(kataPencarian) {
                kataPencarian = kataPencarian.toLowerCase().trim();

                if (kataPencarian === '') {
                    paketTerfilter = [...semuaPaket];
                    tombolHapusPencarian.classList.add('hidden');
                    indikatorFilter.classList.add('hidden');
                } else {
                    tombolHapusPencarian.classList.remove('hidden');
                    paketTerfilter = semuaPaket.filter(pkg => {
                        const nama = pkg.dataset.name || '';
                        const lokasi = pkg.dataset.location || '';
                        return nama.includes(kataPencarian) || lokasi.includes(kataPencarian);
                    });

                    paketTerfilter.forEach(pkg => {
                        pkg.classList.add('highlight-search');
                        setTimeout(() => {
                            pkg.classList.remove('highlight-search');
                        }, 1500);
                    });
                }

                halamanSekarang = 1;
                renderPaket();
            }

            let timeoutPencarian;
            inputPencarian.addEventListener('input', (e) => {
                clearTimeout(timeoutPencarian);
                timeoutPencarian = setTimeout(() => {
                    filterPaket(e.target.value);
                }, 300);
            });

            tombolHapusPencarian.addEventListener('click', () => {
                inputPencarian.value = '';
                filterPaket('');
                inputPencarian.focus();
            });

            tombolResetPencarian.addEventListener('click', () => {
                inputPencarian.value = '';
                filterPaket('');
                inputPencarian.focus();
            });

            tombolHapusFilter.addEventListener('click', () => {
                inputPencarian.value = '';
                filterPaket('');
                inputPencarian.focus();
            });

            let touchStartY = 0;
            document.addEventListener('touchstart', (e) => {
                touchStartY = e.touches[0].clientY;
            }, {
                passive: true
            });

            document.addEventListener('touchmove', (e) => {
                const touchY = e.touches[0].clientY;
                const scrollTop = window.scrollY;

                if (scrollTop <= 0 && touchY - touchStartY > 50) {
                    kontainerPaket.classList.add('pull-refresh');
                    setTimeout(() => {
                        kontainerPaket.classList.remove('pull-refresh');
                        if (inputPencarian.value.trim() !== '') {
                            inputPencarian.value = '';
                            filterPaket('');
                        }
                    }, 1000);
                }
            }, {
                passive: true
            });

            // Inisialisasi tampilan paket
            renderPaket();
            perbaruiTampilanPaginasi();
        });
    </script>
</body>

</html>
