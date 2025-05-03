<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BALI OM TOURS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto px-4 py-6 flex items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <span class="font-bold text-xl text-teal-600">BALI OM TOURS</span>
            </div>

            <!-- Desktop Menu: ml-auto akan dorong ke kanan -->
            <div class="hidden md:flex space-x-8 ml-auto">
                <a href="#beranda" class="text-gray-700 hover:text-teal-600 transition">Beranda</a>
                <a href="#paket" class="text-gray-700 hover:text-teal-600 transition">Paket Wisata</a>
                <a href="#tentang"class="text-gray-700 hover:text-teal-600 transition">Tentang Kami</a>
            </div>

            <!-- Mobile Toggle: jika mau, beri margin kiri kecil -->
            <div class="md:hidden ml-4">
                <button id="menu-toggle" class="text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white px-4 py-2 shadow-inner">
            <a href="#beranda" class="block py-2 text-gray-700 hover:text-teal-600 transition">Beranda</a>
            <a href="#paket" class="block py-2 text-gray-700 hover:text-teal-600 transition">Paket Wisata</a>
            <a href="#tentang" class="block py-2 text-gray-700 hover:text-teal-600 transition">Tentang Kami</a>

        </div>
    </nav>



    <!-- Paket Wisata Section -->
    <section id="paket" class="py-20 bg-white">
        <div class="container pt-10 mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Paket Wisata</h2>
                <div class="w-20 h-1 bg-teal-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Pilih paket wisata sesuai dengan kebutuhan dan budget Anda.
                    Kami menawarkan berbagai pilihan destinasi menarik.</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="packageContainer">
                @foreach ($paket as $item)
                    <div class="package-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition"
                        data-category="bali">
                        <div class="relative">
                            <img src="{{ $item->foto
                                ? asset('storage/' . $item->foto)
                                : 'https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=1170&q=80' }}"
                                alt="{{ $item->nama }}" class="w-full h-48 object-cover" />

                            <span
                                class="absolute top-4 left-4 bg-teal-100 text-teal-800 text-xs font-semibold px-2.5 py-0.5 rounded">Terbaru</span>

                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $item->judul }}</h3>
                            <p class="text-gray-600 mb-4">{{ $item->deskripsi }}</p>
                            <div class="flex items-center mb-4">
                                <i class="fas fa-map-marker-alt text-teal-600 mr-2"></i>
                                <span class="text-gray-600">{{ $item->tempat }}</span>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                {{-- Info Harga --}}
                                <div class="space-y-1">
                                    <span class="block text-xs text-gray-500 uppercase">Harga Mulai</span>
                                    <div class="flex items-baseline space-x-1">
                                        <span class="text-2xl font-semibold text-teal-600">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </span>
                                        <span class="text-sm text-gray-500">/ {{ $item->durasi }} hari</span>
                                    </div>
                                </div>

                                {{-- Tombol Pilih --}}
                                <button onclick="pilihPaket('{{ addslashes($item->nama) }}', {{ $item->harga }})"
                                    class="bg-teal-600 hover:bg-teal-500 text-white px-5 py-2 rounded-md transition-colors duration-200">
                                    Pilih Paket
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-10">
                <a href="paket-wisata" class="text-teal-600 font-semibold hover:text-teal-800 transition">Lihat Semua
                    Paket
                    <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-12">
            <!-- Gambar -->
            <div class="w-full md:w-1/2">
                <img src="https://images.unsplash.com/photo-1566559532512-004a6df74db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80"
                    alt="Wisata Indonesia" class="rounded-lg shadow-lg w-full object-cover" />
            </div>
            <!-- Teks -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Wisata Indonesia</h2>
                <div class="w-16 h-1 bg-teal-600 mx-auto md:mx-0 mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Sejak didirikan pada 2010, kami telah membantu ribuan pelancong menjelajahi keindahan alam dan
                    budaya Tanah Air.
                    Dengan jaringan mitra handal di berbagai destinasi, setiap perjalanan dirancang untuk kenyamanan dan
                    pengalaman tak terlupakan.
                </p>
                <a href="#paket"
                    class="inline-block bg-teal-600 text-white font-medium py-2 px-6 rounded-lg hover:bg-teal-700 transition">
                    Lihat Paket Kami
                </a>
            </div>
        </div>
    </section>


    <!-- Form Pemesanan Modal -->
    <div id="pemesananModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-3xl mx-4 overflow-hidden">
            <div class="bg-teal-600 text-white px-6 py-4 flex justify-between items-center">
                <h3 class="text-xl font-semibold">Form Pemesanan</h3>
                <button id="closeModal" class="text-white text-xl hover:text-gray-200">&times;</button>
            </div>
            <div class="p-6">
                <div id="formStep1" class="form-step">
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Pilih Tanggal dan Jumlah Peserta</h4>
                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-2">Paket Wisata: <span id="selectedPaket"
                                class="font-semibold text-teal-600"></span></p>
                        <p class="font-medium text-gray-700 mb-4">Harga: <span id="selectedHarga"
                                class="font-semibold text-teal-600"></span></p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="tanggalBerangkat" class="block text-gray-700 mb-2">Tanggal Berangkat</label>
                            <input type="date" id="tanggalBerangkat"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="jumlahPeserta" class="block text-gray-700 mb-2">Jumlah Peserta</label>
                            <input type="number" id="jumlahPeserta" min="1" value="1"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button onclick="nextStep(2)"
                            class="bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700 transition">Lanjutkan</button>
                    </div>
                </div>

                <div id="formStep2" class="form-step hidden">
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Pilih Kendaraan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="border border-gray-200 rounded-md p-4 cursor-pointer hover:bg-gray-50 transition"
                            onclick="pilihKendaraan('Avanza', 'Ekonomi')">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-car text-teal-600 mr-2"></i>
                                <h5 class="font-medium">Toyota Avanza</h5>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Kapasitas: 6 orang</p>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Ekonomi</span>
                        </div>
                        <div class="border border-gray-200 rounded-md p-4 cursor-pointer hover:bg-gray-50 transition"
                            onclick="pilihKendaraan('Innova', 'Standar')">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-car text-teal-600 mr-2"></i>
                                <h5 class="font-medium">Toyota Innova</h5>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Kapasitas: 7 orang</p>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Standar</span>
                        </div>
                        <div class="border border-gray-200 rounded-md p-4 cursor-pointer hover:bg-gray-50 transition"
                            onclick="pilihKendaraan('Alphard', 'Premium')">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-car text-teal-600 mr-2"></i>
                                <h5 class="font-medium">Toyota Alphard</h5>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Kapasitas: 7 orang</p>
                            <span
                                class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Premium</span>
                        </div>
                        <div class="border border-gray-200 rounded-md p-4 cursor-pointer hover:bg-gray-50 transition"
                            onclick="pilihKendaraan('Hiace', 'Grup')">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-shuttle-van text-teal-600 mr-2"></i>
                                <h5 class="font-medium">Toyota Hiace</h5>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Kapasitas: 16 orang</p>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Grup</span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <button onclick="prevStep(1)"
                            class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400 transition">Kembali</button>
                        <button onclick="nextStep(3)"
                            class="bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700 transition">Lanjutkan</button>
                    </div>
                </div>

                <div id="formStep3" class="form-step hidden">
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Data Pemesan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="nama" class="block text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="nama"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="telepon" class="block text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" id="telepon"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="alamat" class="block text-gray-700 mb-2">Alamat</label>
                            <input type="text" id="alamat"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="catatan" class="block text-gray-700 mb-2">Catatan Khusus (opsional)</label>
                        <textarea id="catatan" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
                    </div>
                    <div class="flex justify-between">
                        <button onclick="prevStep(2)"
                            class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400 transition">Kembali</button>
                        <button onclick="submitPemesanan()"
                            class="bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700 transition">Pesan
                            Sekarang</button>
                    </div>
                </div>

                <div id="formStep4" class="form-step hidden">
                    <div class="text-center py-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full mx-auto flex items-center justify-center mb-4">
                            <i class="fas fa-check text-2xl text-green-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-2 text-gray-800">Pemesanan Berhasil!</h4>
                        <p class="text-gray-600 mb-6">Terima kasih telah memesan paket wisata kami. Detail pemesanan
                            telah dikirim ke email Anda.</p>
                        <div class="bg-gray-50 p-4 rounded-md mb-6 text-left">
                            <h5 class="font-medium mb-2 text-gray-800">Ringkasan Pemesanan:</h5>
                            <p class="text-gray-700 mb-1">Paket: <span id="summaryPaket" class="font-medium"></span>
                            </p>
                            <p class="text-gray-700 mb-1">Tanggal: <span id="summaryTanggal"
                                    class="font-medium"></span></p>
                            <p class="text-gray-700 mb-1">Jumlah Peserta: <span id="summaryPeserta"
                                    class="font-medium"></span></p>
                            <p class="text-gray-700 mb-1">Kendaraan: <span id="summaryKendaraan"
                                    class="font-medium"></span></p>
                            <p class="text-gray-700 mb-1">Total Pembayaran: <span id="summaryTotal"
                                    class="font-medium text-teal-600"></span></p>
                        </div>
                        <button onclick="closeModal()"
                            class="bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700 transition">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-mountain text-teal-400 text-2xl mr-2"></i>
                        <span class="font-bold text-xl">Wisata Indonesia</span>
                    </div>
                    <p class="text-gray-400 mb-4">Menyediakan paket wisata terbaik dengan harga terjangkau dan
                        pelayanan premium untuk pengalaman liburan yang tak terlupakan.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#beranda" class="text-gray-400 hover:text-teal-400 transition">Beranda</a></li>
                        <li><a href="#paket" class="text-gray-400 hover:text-teal-400 transition">Paket Wisata</a>
                        </li>
                        <li><a href="#tentang" class="text-gray-400 hover:text-teal-400 transition">Tentang Kami</a>
                        </li>
                        <li><a href="#kontak" class="text-gray-400 hover:text-teal-400 transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Destinasi Populer</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Bali</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Yogyakarta</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Raja Ampat</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Labuan Bajo</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Lombok</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Berlangganan</h4>
                    <p class="text-gray-400 mb-4">Dapatkan info terbaru dan promo menarik dari kami.</p>
                    <div class="flex">
                        <input type="email" placeholder="Email Anda"
                            class="px-4 py-2 rounded-l-md focus:outline-none w-full">
                        <button class="bg-teal-600 text-white px-4 py-2 rounded-r-md hover:bg-teal-700 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 Wisata Indonesia. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });


        // Modal Functions
        const modal = document.getElementById('pemesananModal');
        let currentStep = 1;
        let pemesananData = {
            paket: '',
            harga: 0,
            tanggal: '',
            jumlahPeserta: 1,
            kendaraan: '',
            tipeKendaraan: '',
            nama: '',
            email: '',
            telepon: '',
            alamat: '',
            catatan: ''
        };

        function pilihPaket(namaPaket, harga) {
            pemesananData.paket = namaPaket;
            pemesananData.harga = harga;

            document.getElementById('selectedPaket').textContent = namaPaket;
            document.getElementById('selectedHarga').textContent = formatRupiah(harga);

            openModal();
        }

        function openModal() {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        document.getElementById('closeModal').addEventListener('click', closeModal);

        function nextStep(step) {
            // Validate current step
            if (step === 2) {
                const tanggal = document.getElementById('tanggalBerangkat').value;
                const jumlahPeserta = document.getElementById('jumlahPeserta').value;

                if (!tanggal) {
                    alert('Silakan pilih tanggal keberangkatan');
                    return;
                }

                pemesananData.tanggal = tanggal;
                pemesananData.jumlahPeserta = jumlahPeserta;
            } else if (step === 3) {
                if (!pemesananData.kendaraan) {
                    alert('Silakan pilih kendaraan');
                    return;
                }
            }

            document.getElementById(`formStep${currentStep}`).classList.add('hidden');
            document.getElementById(`formStep${step}`).classList.remove('hidden');
            currentStep = step;
        }

        function prevStep(step) {
            document.getElementById(`formStep${currentStep}`).classList.add('hidden');
            document.getElementById(`formStep${step}`).classList.remove('hidden');
            currentStep = step;
        }

        // Helper functions
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        function formatDate(dateString) {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }
    </script>
</body>

</html>
