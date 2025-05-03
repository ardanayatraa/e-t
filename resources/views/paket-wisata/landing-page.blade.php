<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BALI OM TOURS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- pastikan Flatpickr & Alpine sudah ter-include --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @livewireStyles
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

                                <button
                                    onclick="openStep1(
                                  {{ $item->paketwisata_id }},
                                  '{{ addslashes($item->judul) }}',
                                  {{ $item->harga }},
                                  '{{ $item->foto }}'
                                )"
                                    class="bg-teal-600 hover:bg-teal-500 text-white px-5 py-2 rounded-md transition-colors duration-200">
                                    Pilih Paket
                                </button>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-10">
                <a href="paket" class="text-teal-600 font-semibold hover:text-teal-800 transition">Lihat Semua
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
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Bali Om Tour</h2>
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

    <div id="pickerContainer"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center md:items-start justify-center p-4 sm:p-6 z-50">
        <div
            class="bg-white rounded-lg shadow-lg w-full max-w-sm sm:max-w-lg md:max-w-4xl h-full sm:h-auto overflow-auto">
            {{-- STEP 1 --}}
            <div id="step1" class="p-4 sm:p-6">
                <h4 class="text-lg sm:text-xl font-semibold mb-4 text-gray-800">1. Pilih Tanggal & Armada</h4>
                <div class="flex flex-col md:flex-row md:gap-6">
                    {{-- Kalender --}}
                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                        <input id="tglPicker" type="text"
                            class="w-full cursor-pointer rounded-lg border border-gray-300 shadow-inner py-2 px-3 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            readonly />
                    </div>
                    {{-- Armada --}}
                    <div class="w-full md:w-1/2">
                        <h5 class="font-medium mb-2 text-gray-700">Armada Tersedia</h5>
                        <div id="kendaraanList"
                            class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-h-80 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-teal-300 scrollbar-track-gray-100">
                            @foreach ($mobil as $m)
                                <button type="button" data-tipe="{{ $m->nama_kendaraan }}"
                                    data-id="{{ $m->tipemobil_id }}"
                                    class="kendaraan-btn flex flex-col items-center text-center bg-white p-3 sm:p-4 rounded-2xl shadow-sm
                            border-2 border-transparent hover:border-teal-300 transition duration-200">
                                    <div class="w-full h-24 mb-3 overflow-hidden rounded-lg">
                                        <img src="{{ $m->foto ? asset('storage/' . $m->foto) : asset('images/default-car.jpg') }}"
                                            alt="{{ $m->nama_kendaraan }}" class="w-full h-full object-cover" />
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $m->nama_kendaraan }}</span>
                                    <span class="text-sm text-gray-500">{{ $m->jumlah_tempat_duduk }} Kursi</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-4 sm:mt-6 flex justify-end space-x-2">
                    <button onclick="closePicker()"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button onclick="toStep2()"
                        class="px-4 py-2 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-500 transition">
                        Input Data Pemesan
                    </button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div id="step2" class="hidden p-4 sm:p-6 bg-gray-50">
                <h4 class="text-lg sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-800">2. Lengkapi Data Pemesan</h4>

                {{-- PREVIEW FOTO --}}
                <div id="previewFotoWrapper" class="hidden mb-4 sm:mb-6">
                    <img id="previewFoto" src="" alt="Foto Paket"
                        class="w-full h-40 sm:h-48 object-cover rounded-lg shadow-sm" />
                </div>

                <form action="{{ route('pemesanan.store') }}" method="POST"
                    class="flex flex-col md:flex-row md:gap-6">
                    @csrf

                    {{-- Ringkasan Pemesanan --}}
                    <div class="w-full md:w-1/2 mb-4 md:mb-0 space-y-4">
                        <div class="bg-white p-4 sm:p-6 rounded-2xl shadow-lg">
                            <h5 class="text-base sm:text-lg font-semibold mb-3 text-gray-700">Ringkasan Pemesanan</h5>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center">
                                    <i class="fas fa-box-open text-teal-600 w-5"></i>
                                    <span class="ml-2">Paket:</span>
                                    <span id="previewPaket" class="ml-auto font-medium text-gray-800"></span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-calendar-alt text-teal-600 w-5"></i>
                                    <span class="ml-2">Tanggal:</span>
                                    <span id="previewTanggal" class="ml-auto font-medium text-gray-800"></span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-car-side text-teal-600 w-5"></i>
                                    <span class="ml-2">Armada:</span>
                                    <span id="previewKendaraan" class="ml-auto font-medium text-gray-800"></span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-tag text-teal-600 w-5"></i>
                                    <span class="ml-2">Harga:</span>
                                    <span id="previewHarga" class="ml-auto font-medium text-gray-800"></span>
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
                    </div>

                    {{-- Form Data Pemesan --}}
                    <div class="w-full md:w-1/2 space-y-4">
                        <div class="bg-white p-4 sm:p-6 rounded-2xl shadow-lg space-y-4">
                            <h5 class="text-base sm:text-lg font-semibold text-gray-700">Detail Pemesan</h5>
                            <label class="block">
                                <span class="text-gray-600">Nama Pemesan</span>
                                <input type="text" name="nama_pemesan" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" />
                            </label>
                            <label class="block">
                                <span class="text-gray-600">Email</span>
                                <input type="email" name="email" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" />
                            </label>
                            <label class="block">
                                <span class="text-gray-600">Alamat</span>
                                <input type="text" name="alamat" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" />
                            </label>
                            <label class="block">
                                <span class="text-gray-600">Nomor WhatsApp</span>
                                <input type="text" name="nomor_whatsapp" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" />
                            </label>

                            <label class="block">
                                <span class="text-gray-600">Jumlah Peserta</span>
                                <input id="jumlahPesertaInput" type="text" name="jumlah_peserta" value=""
                                    inputmode="numeric" pattern="\d*"
                                    oninput="this.value = this.value.replace(/\D/g, '')" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                                         focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" />
                            </label>

                        </div>

                        {{-- Aksi --}}
                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="backToStep1()"
                                class="px-5 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition">
                                Kembali
                            </button>
                            <button type="submit"
                                class="px-5 py-2 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-500 transition">
                                Konfirmasi & Bayar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>




    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">

            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
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

            // state untuk menyimpan pilihan
            const selected = {
                paketId: null,
                paketNama: '',
                harga: 0,
                tanggal: '',
                kendaraanNama: '',
                kendaraanId: null,
                fotoPath: '',
                jumlah_peserta: ''

            };

            // inisialisasi Flatpickr
            flatpickr("#tglPicker", {
                inline: true,
                locale: "id",
                dateFormat: "d-m-Y",
                onChange: (dates, str) => {
                    selected.tanggal = str;
                }
            });

            const picker = document.getElementById('pickerContainer');
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');

            // fungsi dipanggil oleh onclick di blade
            window.openStep1 = function(id, nama, hr, foto) {
                selected.paketId = id;
                selected.paketNama = nama;
                selected.harga = hr;

                // bangun URL lengkap ke storage
                selected.fotoPath = foto ?
                    storageUrl + '/' + foto :
                    '';

                // reset tanggal & armada
                selected.tanggal = '';
                selected.kendaraanId = null;
                selected.kendaraanNama = '';
                document.querySelectorAll('.kendaraan-btn')
                    .forEach(b => b.classList.remove('border-teal-300'));

                // tampilkan step1
                picker.classList.remove('hidden');
                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                document.body.style.overflow = 'hidden';
            };

            // highlight & simpan armada
            document.querySelectorAll('.kendaraan-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    selected.kendaraanId = btn.dataset.id;
                    selected.kendaraanNama = btn.dataset.tipe;

                    document.querySelectorAll('.kendaraan-btn')
                        .forEach(b => b.classList.remove('border-teal-300'));
                    btn.classList.add('border-teal-300');
                });
            });

            // lanjut ke step2
            window.toStep2 = function() {
                if (!selected.tanggal) return alert('Pilih tanggal dahulu');
                if (!selected.kendaraanId) return alert('Pilih armada dahulu');

                // isi preview teks
                document.getElementById('previewPaket').innerText = selected.paketNama;
                document.getElementById('previewTanggal').innerText = selected.tanggal;
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
                fotoEl.src = selected.fotoPath;
                document.getElementById('previewFotoWrapper').classList.remove('hidden');

                // isi input tersembunyi
                document.getElementById('inputPaketId').value = selected.paketId;
                document.getElementById('inputTanggal').value = selected.tanggal;
                document.getElementById('inputKendaraan').value = selected.kendaraanNama;
                document.getElementById('inputMobilId').value = selected.kendaraanId;
                document.getElementById('inputHarga').value = selected.harga;
                document.getElementById('inputPeserta').value = selected.jumlah_peserta;

                // pindah step
                step1.classList.add('hidden');
                step2.classList.remove('hidden');
            };

            // kembali ke step1
            window.backToStep1 = function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');
            };

            // tutup modal
            window.closePicker = function() {
                picker.classList.add('hidden');
                document.body.style.overflow = 'auto';
            };
        });
    </script>


</body>

</html>
