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
                max-width: 34px !important;
                height: 34px !important;
                line-height: 34px !important;
            }

            .flatpickr-time input {
                font-size: 16px !important;
                /* Prevent iOS zoom on focus */
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

            /* Prevent iOS zoom on input focus */
            input,
            select,
            textarea {
                font-size: 16px !important;
            }

            /* Improved touch targets */
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
            /* rounded-2xl */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            /* efek bayangan halus */
            border: 1px solid #e5e7eb;
            /* tailwind gray-200 */
        }

        /* Vehicle availability styles */
        .vehicle-unavailable {
            opacity: 0.5;
            pointer-events: none;
            position: relative;
        }

        .vehicle-unavailable::after {
            content: 'Tidak Tersedia';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            z-index: 2;
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
    </style>
    @livewireStyles
</head>

<body class="bg-gray-50">
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
        </div>
    </nav>

    <!-- Paket Wisata Section -->
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
                            <div class="flex items-center mb-4">
                                <i class="fas fa-map-marker-alt text-teal-600 mr-2"></i>
                                <span class="text-sm sm:text-base text-gray-600">{{ $item->tempat }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mt-4">
                                {{-- Info Harga --}}
                                <div class="space-y-1">
                                    <span class="block text-xs text-gray-500 uppercase font-medium">Harga Mulai</span>
                                    <div class="flex items-baseline space-x-1">
                                        <span class="text-xl sm:text-2xl font-bold text-teal-600">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </span>
                                        <span class="text-xs sm:text-sm text-gray-500">/ {{ $item->durasi }} hari</span>
                                    </div>
                                </div>

                                <button
                                    onclick="openStep1(
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

    <!-- Tentang Kami Section -->
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
                        Om Tours is to share our personal experiences and the places we’ve found on our journey
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

    <div id="pickerContainer"
        class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-start justify-center p-0 z-50 backdrop-blur-sm overflow-y-auto">
        <div
            class="bg-white rounded-xl sm:rounded-2xl shadow-2xl w-full max-w-sm sm:max-w-lg md:max-w-4xl my-4 sm:my-8 mx-3 sm:mx-auto animate-fadeIn">
            {{-- STEP 1 --}}
            <div id="step1" class="p-4 sm:p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg sm:text-2xl font-bold text-gray-800">1. Pilih Tanggal & Armada</h4>
                    <button onclick="closePicker()" class="text-gray-500 hover:text-gray-700 p-2 touch-target">
                        <i class="fas fa-times text-xl"></i>
                    </button>
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
                            <div id="dateLoadingIndicator" class="hidden mt-2">
                                <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                                    <div class="loading-spinner"></div>
                                    <span>Memeriksa ketersediaan...</span>
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

                    {{-- Armada --}}
                    <div class="w-full lg:w-1/2">
                        <div class="flex justify-between items-center mb-3">
                            <h5 class="font-medium text-gray-700 text-base sm:text-lg">Armada Tersedia</h5>

                            <!-- No vehicles available message -->
                            <div id="noVehiclesMessage" class="hidden">
                                <span class="text-sm text-orange-600 font-medium">
                                    <i class="fas fa-exclamation-circle mr-1"></i> Tidak ada armada tersedia
                                </span>
                            </div>
                        </div>

                        <div id="kendaraanList"
                            class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-64 sm:max-h-80 overflow-y-auto pr-2 scrollbar-thin">
                            @foreach ($mobil as $m)
                                <button type="button" data-tipe="{{ $m->nama_kendaraan }}"
                                    data-id="{{ $m->mobil_id }}"
                                    class="kendaraan-btn flex flex-col items-center text-center bg-white p-3 rounded-xl shadow-md
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
                    <button onclick="closePicker()"
                        class="px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition font-medium text-sm sm:text-base">
                        Batal
                    </button>
                    <button id="nextStepBtn" onclick="toStep2()" disabled
                        class="px-4 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg shadow-md hover:shadow-lg transition font-medium text-sm sm:text-base opacity-50 cursor-not-allowed">
                        Input Data Pemesan
                    </button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div id="step2" class="hidden p-4 sm:p-6 bg-gray-50">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg sm:text-2xl font-bold text-gray-800">2. Lengkapi Data Pemesan</h4>
                    <button onclick="closePicker()" class="text-gray-500 hover:text-gray-700 p-2 touch-target">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                {{-- PREVIEW FOTO --}}
                <div id="previewFotoWrapper" class="hidden mb-4 sm:mb-6">
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
                                    <span class="ml-2 sm:ml-3 font-medium">Armada:</span>
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

                            <label class="block">
                                <span class="text-gray-600 font-medium text-sm sm:text-base">Jumlah Peserta</span>
                                <input id="jumlahPesertaInput" type="text" name="jumlah_peserta" value=""
                                    inputmode="numeric" pattern="\d*"
                                    oninput="this.value = this.value.replace(/\D/g, '')" required
                                    class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm sm:text-base"
                                    placeholder="Masukkan jumlah peserta" />
                            </label>
                        </div>

                        {{-- Aksi --}}
                        <div class="flex justify-between mt-4 sm:mt-6">
                            <button type="button" onclick="backToStep1()"
                                class="px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition font-medium text-sm sm:text-base">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </button>
                            <button type="submit"
                                class="px-4 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg shadow-md hover:shadow-lg transition font-medium text-sm sm:text-base">
                                Konfirmasi & Bayar <i class="fas fa-check ml-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
                    <div class="flex items- mb-3 gap-3">
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
                            <span>Jl. Bisma No. 3 Ubud, Gianyar Bali 80571
                            </span>
                        </li>
                        <li class="flex items-start justify-center md:justify-start">
                            <i class="fas fa-phone-alt mt-1 mr-3 text-teal-400"></i>
                            <span>+62 822 3739 7076 </span>
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
            // base URL untuk storage
            const storageUrl = "{{ asset('storage') }}";
            const apiUrl = "{{ route('check-availability') }}"; // Endpoint untuk cek ketersediaan

            // state untuk menyimpan pilihan
            const selected = {
                paketId: null,
                paketNama: '',
                harga: 0,
                tanggal: '',
                kendaraanNama: '',
                kendaraanId: null,
                fotoPath: '',
                jumlah_peserta: '',
                waktu: '',
            };

            // Elemen UI
            const dateLoadingIndicator = document.getElementById('dateLoadingIndicator');
            const noVehiclesMessage = document.getElementById('noVehiclesMessage');
            const nextStepBtn = document.getElementById('nextStepBtn');
            const kendaraanList = document.getElementById('kendaraanList');

            // inisialisasi Flatpickr dengan konfigurasi mobile-friendly
            const isMobile = window.innerWidth < 768;

            // Ubah inisialisasi flatpickr untuk tglPicker dengan menambahkan defaultDate: "today"
            flatpickr("#tglPicker", {
                inline: true,
                locale: "id",
                dateFormat: "Y-m-d", // Format tanggal untuk API
                minDate: "today",
                defaultDate: "today", // Set default ke hari ini
                static: true,
                onChange: (dates, str) => {
                    selected.tanggal = str;
                    checkVehicleAvailability(str);
                }
            });

            // time picker
            flatpickr("#timePicker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 30,
                onChange: (dates, str) => {
                    selected.waktu = str;
                    enableNextStepIfReady();
                }
            });

            const picker = document.getElementById('pickerContainer');
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');

            /**
             * Fungsi untuk memeriksa ketersediaan kendaraan berdasarkan tanggal
             *
             * @param {string} date - Tanggal dalam format YYYY-MM-DD
             *
             * Fungsi ini akan mengirim permintaan ke API untuk mendapatkan daftar kendaraan
             * yang sudah dibooking pada tanggal tertentu. Kendaraan yang sudah dibooking
             * akan ditandai sebagai tidak tersedia.
             */
            function checkVehicleAvailability(date) {
                // Reset state
                resetVehicleSelection();

                // Tampilkan loading indicator
                dateLoadingIndicator.classList.remove('hidden');

                // Kirim permintaan ke API untuk memeriksa ketersediaan
                fetch(`${apiUrl}?date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        // Sembunyikan loading indicator
                        dateLoadingIndicator.classList.add('hidden');

                        // Proses data ketersediaan
                        // LOGIKA: Mobil yang terdaftar di booked_vehicles adalah yang TIDAK tersedia
                        updateVehicleAvailability(data || []);
                    })
                    .catch(error => {
                        console.error('Error checking availability:', error);
                        dateLoadingIndicator.classList.add('hidden');

                        // Jika terjadi error, gunakan data statis untuk demo
                        // Dalam implementasi nyata, tampilkan pesan error
                        useStaticBookedData();
                    });
            }

            /**
             * Fungsi untuk menggunakan data statis jika API tidak tersedia
             *
             * Fungsi ini hanya untuk keperluan demo/testing. Dalam implementasi nyata,
             * sebaiknya tampilkan pesan error dan minta pengguna untuk mencoba lagi.
             */
            function useStaticBookedData() {
                // Data statis: hanya mobil dengan ID 1 yang sudah dibooking
                const bookedVehicles = [2]; // Hanya mobil dengan ID 1 yang sudah dibooking

                // Update UI
                updateVehicleAvailability(bookedVehicles);
            }

            /**
             * Fungsi untuk memperbarui UI berdasarkan ketersediaan kendaraan
             *
             * @param {Array} bookedVehicleIds - Array berisi ID kendaraan yang sudah dibooking (tidak tersedia)
             *
             * Fungsi ini akan memperbarui tampilan UI untuk menandai kendaraan yang sudah dibooking
             * sebagai tidak tersedia, dan kendaraan yang belum dibooking sebagai tersedia.
             */
            function updateVehicleAvailability(bookedVehicleIds) {
                const vehicleButtons = document.querySelectorAll('.kendaraan-btn');
                let hasAvailableVehicles = false;

                vehicleButtons.forEach(btn => {
                    const vehicleId = parseInt(btn.dataset.id);
                    console.log(bookedVehicleIds.includes(vehicleId));
                    if (bookedVehicleIds.includes(vehicleId)) {
                        // Kendaraan tersedia
                        btn.classList.remove('vehicle-unavailable');
                        btn.disabled = false;
                        hasAvailableVehicles = true;
                    } else {

                        // Kendaraan TIDAK tersedia (sudah dibooking)
                        btn.classList.add('vehicle-unavailable');
                        btn.disabled = true;
                    }
                });

                // Tampilkan pesan jika tidak ada kendaraan yang tersedia
                if (!hasAvailableVehicles) {
                    noVehiclesMessage.classList.remove('hidden');
                } else {
                    noVehiclesMessage.classList.add('hidden');
                }

                // Update state tombol next
                enableNextStepIfReady();
            }

            /**
             * Fungsi untuk mereset pilihan kendaraan
             *
             * Fungsi ini akan mereset state pilihan kendaraan dan menghapus
             * semua penanda ketersediaan dari UI.
             */
            function resetVehicleSelection() {
                selected.kendaraanId = null;
                selected.kendaraanNama = '';

                document.querySelectorAll('.kendaraan-btn').forEach(btn => {
                    btn.classList.remove('border-teal-400');
                    btn.classList.remove('vehicle-unavailable');
                    btn.disabled = false;
                });

                noVehiclesMessage.classList.add('hidden');
                enableNextStepIfReady();
            }

            /**
             * Fungsi untuk mengaktifkan/menonaktifkan tombol next
             *
             * Tombol next hanya akan aktif jika pengguna sudah memilih tanggal,
             * waktu, dan kendaraan yang tersedia.
             */
            function enableNextStepIfReady() {
                if (selected.tanggal && selected.waktu && selected.kendaraanId) {
                    nextStepBtn.disabled = false;
                    nextStepBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    nextStepBtn.disabled = true;
                    nextStepBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            /**
             * Fungsi untuk membuka step 1 (pemilihan tanggal dan armada)
             *
             * @param {number} id - ID paket wisata
             * @param {string} nama - Nama paket wisata
             * @param {number} hr - Harga paket wisata
             * @param {string} foto - Path foto paket wisata
             *
             * Fungsi ini dipanggil ketika pengguna mengklik tombol "Pilih Paket"
             */
            window.openStep1 = function(id, nama, hr, foto) {
                selected.paketId = id;
                selected.paketNama = nama;
                selected.harga = hr;

                // bangun URL lengkap ke storage
                selected.fotoPath = foto ?
                    storageUrl + '/' + foto :
                    '';

                // reset armada
                selected.kendaraanId = null;
                selected.kendaraanNama = '';
                resetVehicleSelection();

                // Set tanggal hari ini sebagai default
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const day = String(today.getDate()).padStart(2, '0');
                const formattedDate = `${year}-${month}-${day}`;

                selected.tanggal = formattedDate;

                // Periksa ketersediaan untuk hari ini
                setTimeout(() => {
                    checkVehicleAvailability(formattedDate);
                }, 100);

                // tampilkan step1
                picker.classList.remove('hidden');
                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                document.body.style.overflow = 'hidden';
            };

            // Event listener untuk tombol kendaraan
            document.querySelectorAll('.kendaraan-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    // Skip jika kendaraan tidak tersedia
                    if (btn.classList.contains('vehicle-unavailable')) return;

                    selected.kendaraanId = btn.dataset.id;
                    selected.kendaraanNama = btn.dataset.tipe;

                    document.querySelectorAll('.kendaraan-btn')
                        .forEach(b => b.classList.remove('border-teal-400'));
                    btn.classList.add('border-teal-400');

                    enableNextStepIfReady();
                });
            });

            /**
             * Fungsi untuk melanjutkan ke step 2 (input data pemesan)
             *
             * Fungsi ini dipanggil ketika pengguna mengklik tombol "Input Data Pemesan"
             */
            window.toStep2 = function() {
                if (!selected.tanggal) return alert('Pilih tanggal dahulu');
                if (!selected.waktu) return alert('Pilih armada dahulu');
                if (!selected.kendaraanId) return alert('Pilih armada dahulu');

                // isi preview teks
                document.getElementById('previewPaket').innerText = selected.paketNama;
                document.getElementById('previewTanggal').innerText = formatDisplayDate(selected.tanggal);
                document.getElementById('previewWaktu').innerText = selected.waktu;
                document.getElementById('previewKendaraan').innerText = selected.kendaraanNama;
                document.getElementById('previewHarga').innerText =
                    new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    })
                    .format(selected.harga);

                // tampilkan foto dengan URL storage
                const fotoEl = document.getElementById('previewFoto');
                fotoEl.src = selected.fotoPath || '/placeholder.svg';
                document.getElementById('previewFotoWrapper').classList.remove('hidden');

                // isi input tersembunyi
                document.getElementById('inputPaketId').value = selected.paketId;
                document.getElementById('inputTanggal').value = selected.tanggal;
                document.getElementById('inputKendaraan').value = selected.kendaraanNama;
                document.getElementById('inputMobilId').value = selected.kendaraanId;
                document.getElementById('inputHarga').value = selected.harga;
                document.getElementById('inputPeserta').value = selected.jumlah_peserta;
                document.getElementById('inputWaktu').value = selected.waktu;

                // scroll to top for mobile
                if (window.innerWidth < 768) {
                    window.scrollTo(0, 0);
                }

                // pindah step
                step1.classList.add('hidden');
                step2.classList.remove('hidden');
            };

            /**
             * Fungsi untuk memformat tanggal untuk tampilan
             *
             * @param {string} dateStr - Tanggal dalam format YYYY-MM-DD
             * @returns {string} - Tanggal dalam format DD-MM-YYYY
             */
            function formatDisplayDate(dateStr) {
                // Convert YYYY-MM-DD to DD-MM-YYYY for display
                if (!dateStr) return '';

                const parts = dateStr.split('-');
                if (parts.length !== 3) return dateStr;

                return `${parts[2]}-${parts[1]}-${parts[0]}`;
            }

            /**
             * Fungsi untuk kembali ke step 1
             *
             * Fungsi ini dipanggil ketika pengguna mengklik tombol "Kembali"
             */
            window.backToStep1 = function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');

                // scroll to top for mobile
                if (window.innerWidth < 768) {
                    window.scrollTo(0, 0);
                }
            };

            /**
             * Fungsi untuk menutup modal picker
             *
             * Fungsi ini dipanggil ketika pengguna mengklik tombol "Batal" atau "X"
             */
            window.closePicker = function() {
                picker.classList.add('hidden');
                document.body.style.overflow = 'auto';
            };

            // Handle resize for responsive calendar
            window.addEventListener('resize', () => {
                if (document.querySelector('.flatpickr-calendar')) {
                    // Force flatpickr to redraw
                    const currentDate = flatpickr("#tglPicker").selectedDates[0];
                    flatpickr("#tglPicker").destroy();

                    flatpickr("#tglPicker", {
                        inline: true,
                        locale: "id",
                        dateFormat: "Y-m-d",
                        minDate: "today",
                        defaultDate: currentDate,
                        static: true,
                        onChange: (dates, str) => {
                            selected.tanggal = str;
                            checkVehicleAvailability(str);
                        }
                    });
                }

                // Update pagination display based on screen size
                updatePaginationDisplay();
            });

            // Pagination and Search functionality
            const packagesPerPage = 6;
            const packageContainer = document.getElementById('packageContainer');
            const paginationContainer = document.getElementById('pagination');
            const paginationInfo = document.getElementById('paginationInfo');
            const currentPageInfo = document.getElementById('currentPageInfo');
            const totalPagesInfo = document.getElementById('totalPagesInfo');
            const searchInput = document.getElementById('searchPackage');
            const clearSearchBtn = document.getElementById('clearSearch');
            const noResultsMsg = document.getElementById('noResults');
            const resetSearchBtn = document.getElementById('resetSearch');
            const filterIndicator = document.getElementById('filterIndicator');
            const resultCount = document.getElementById('resultCount');
            const clearFilterBtn = document.getElementById('clearFilter');

            // Get all package cards
            const allPackages = Array.from(packageContainer.querySelectorAll('.package-card'));
            let filteredPackages = [...allPackages];
            let currentPage = 1;

            /**
             * Fungsi untuk memperbarui tampilan pagination berdasarkan ukuran layar
             *
             * Pada layar kecil, pagination akan ditampilkan dalam format yang lebih compact
             */
            function updatePaginationDisplay() {
                const isMobileView = window.innerWidth < 480;

                if (isMobileView) {
                    paginationContainer.classList.add('pagination-compact');
                    paginationInfo.classList.remove('hidden');
                } else {
                    paginationContainer.classList.remove('pagination-compact');
                    paginationInfo.classList.add('hidden');
                }
            }

            /**
             * Fungsi untuk menginisialisasi pagination
             *
             * Fungsi ini akan membuat tombol-tombol pagination berdasarkan jumlah halaman
             */
            function initPagination() {
                // Clear pagination container
                paginationContainer.innerHTML = '';

                // Calculate total pages
                const totalPages = Math.ceil(filteredPackages.length / packagesPerPage);

                // Update pagination info for mobile
                currentPageInfo.textContent = currentPage;
                totalPagesInfo.textContent = totalPages;

                // Create previous button
                if (totalPages > 1) {
                    const prevBtn = document.createElement('button');
                    prevBtn.className =
                        'pagination-btn px-3 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 touch-target';
                    prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
                    prevBtn.disabled = currentPage === 1;
                    prevBtn.style.opacity = currentPage === 1 ? '0.5' : '1';
                    prevBtn.addEventListener('click', () => {
                        if (currentPage > 1) {
                            currentPage--;
                            renderPackages();
                            // Scroll to top of packages section on mobile
                            if (window.innerWidth < 768) {
                                document.getElementById('searchBarContainer').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        }
                    });
                    paginationContainer.appendChild(prevBtn);

                    // Create page buttons
                    for (let i = 1; i <= totalPages; i++) {
                        const pageBtn = document.createElement('button');
                        pageBtn.className =
                            `pagination-btn pagination-number px-3 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 touch-target ${currentPage === i ? 'active pagination-current' : ''}`;
                        pageBtn.textContent = i;
                        pageBtn.addEventListener('click', () => {
                            currentPage = i;
                            renderPackages();
                            // Scroll to top of packages section on mobile
                            if (window.innerWidth < 768) {
                                document.getElementById('searchBarContainer').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        });
                        paginationContainer.appendChild(pageBtn);
                    }

                    // Create next button
                    const nextBtn = document.createElement('button');
                    nextBtn.className =
                        'pagination-btn px-3 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 touch-target';
                    nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
                    nextBtn.disabled = currentPage === totalPages;
                    nextBtn.style.opacity = currentPage === totalPages ? '0.5' : '1';
                    nextBtn.addEventListener('click', () => {
                        if (currentPage < totalPages) {
                            currentPage++;
                            renderPackages();
                            // Scroll to top of packages section on mobile
                            if (window.innerWidth < 768) {
                                document.getElementById('searchBarContainer').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        }
                    });
                    paginationContainer.appendChild(nextBtn);
                }
            }

            /**
             * Fungsi untuk menampilkan paket wisata berdasarkan halaman saat ini
             *
             * Fungsi ini akan menampilkan paket wisata sesuai dengan halaman yang dipilih
             * dan menyembunyikan paket wisata yang tidak berada di halaman tersebut.
             */
            function renderPackages() {
                // Hide all packages
                allPackages.forEach(pkg => {
                    pkg.classList.add('hidden');
                });

                // Show no results message if needed
                if (filteredPackages.length === 0) {
                    noResultsMsg.classList.remove('hidden');
                    paginationContainer.classList.add('hidden');
                    paginationInfo.classList.add('hidden');

                    // Show filter indicator with count
                    if (searchInput.value.trim() !== '') {
                        filterIndicator.classList.remove('hidden');
                        resultCount.textContent = '0';
                    } else {
                        filterIndicator.classList.add('hidden');
                    }
                } else {
                    noResultsMsg.classList.add('hidden');
                    paginationContainer.classList.remove('hidden');

                    // Show filter indicator with count if searching
                    if (searchInput.value.trim() !== '') {
                        filterIndicator.classList.remove('hidden');
                        resultCount.textContent = filteredPackages.length;
                    } else {
                        filterIndicator.classList.add('hidden');
                    }

                    // Calculate start and end index
                    const startIndex = (currentPage - 1) * packagesPerPage;
                    const endIndex = Math.min(startIndex + packagesPerPage, filteredPackages.length);

                    // Show packages for current page
                    for (let i = startIndex; i < endIndex; i++) {
                        filteredPackages[i].classList.remove('hidden');
                    }

                    // Update pagination
                    initPagination();
                    updatePaginationDisplay();
                }
            }

            /**
             * Fungsi untuk memfilter paket wisata berdasarkan kata kunci pencarian
             *
             * @param {string} searchTerm - Kata kunci pencarian
             *
             * Fungsi ini akan memfilter paket wisata berdasarkan nama dan lokasi
             * yang cocok dengan kata kunci pencarian.
             */
            function filterPackages(searchTerm) {
                searchTerm = searchTerm.toLowerCase().trim();

                if (searchTerm === '') {
                    filteredPackages = [...allPackages];
                    clearSearchBtn.classList.add('hidden');
                    filterIndicator.classList.add('hidden');
                } else {
                    clearSearchBtn.classList.remove('hidden');
                    filteredPackages = allPackages.filter(pkg => {
                        const name = pkg.dataset.name || '';
                        const location = pkg.dataset.location || '';
                        return name.includes(searchTerm) || location.includes(searchTerm);
                    });

                    // Highlight matching packages
                    filteredPackages.forEach(pkg => {
                        pkg.classList.add('highlight-search');
                        setTimeout(() => {
                            pkg.classList.remove('highlight-search');
                        }, 1500);
                    });
                }

                // Reset to first page and render
                currentPage = 1;
                renderPackages();
            }

            // Search input event with debounce for better mobile performance
            let searchTimeout;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    filterPackages(e.target.value);
                }, 300); // 300ms debounce
            });

            // Clear search button
            clearSearchBtn.addEventListener('click', () => {
                searchInput.value = '';
                filterPackages('');
                searchInput.focus();
            });

            // Reset search button in no results message
            resetSearchBtn.addEventListener('click', () => {
                searchInput.value = '';
                filterPackages('');
                searchInput.focus();
            });

            // Clear filter button in filter indicator
            clearFilterBtn.addEventListener('click', () => {
                searchInput.value = '';
                filterPackages('');
                searchInput.focus();
            });

            // Pull-to-refresh simulation for mobile
            let touchStartY = 0;
            document.addEventListener('touchstart', (e) => {
                touchStartY = e.touches[0].clientY;
            }, {
                passive: true
            });

            document.addEventListener('touchmove', (e) => {
                const touchY = e.touches[0].clientY;
                const scrollTop = window.scrollY;

                // If we're at the top of the page and pulling down
                if (scrollTop <= 0 && touchY - touchStartY > 50) {
                    packageContainer.classList.add('pull-refresh');
                    setTimeout(() => {
                        packageContainer.classList.remove('pull-refresh');
                        // Reset search and refresh packages
                        if (searchInput.value.trim() !== '') {
                            searchInput.value = '';
                            filterPackages('');
                        }
                    }, 1000);
                }
            }, {
                passive: true
            });

            // Initialize packages display
            renderPackages();
            updatePaginationDisplay();
        });
    </script>
</body>

</html>
