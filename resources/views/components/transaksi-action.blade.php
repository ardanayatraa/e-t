{{-- resources/views/components/table-action.blade.php --}}
<div class="flex space-x-2">
    @isset($editUrl)
        <a href="{{ $editUrl }}"
            class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition">
            Edit
        </a>
    @endisset

    @isset($confirmUrl)
        <button type="button" onclick="openModal('confirm-modal-{{ $rowId }}')" @disabled($status === 'paid')
            class="px-3 py-1 rounded-md text-sm font-medium transition
            {{ $status === 'paid'
                ? 'bg-gray-400 cursor-not-allowed text-white'
                : 'bg-green-600 hover:bg-green-700 text-white' }}">
            Konfirmasi
        </button>
    @endisset


    @isset($deleteUrl)
        <button type="button" onclick="openModal('delete-modal-{{ $rowId }}')"
            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm font-medium transition">
            Hapus
        </button>
    @endisset
</div>

{{-- ==== Confirm Payment Modal ==== --}}
@isset($confirmUrl)
    <div id="confirm-modal-{{ $rowId }}"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm overflow-y-auto" style="display: none;">
        <div class="min-h-screen px-4 text-center">
            <!-- This element centers the modal -->
            <span class="inline-block h-screen align-middle" aria-hidden="true">&#8203;</span>

            <div
                class="modal-dialog inline-block w-full max-w-2xl p-0 my-8 text-left align-middle bg-white dark:bg-gray-800 rounded-lg shadow-xl transform transition-all opacity-0 scale-95">
                <form action="{{ $confirmUrl }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- HEADER --}}
                    <div class="flex items-center justify-between bg-green-600 px-6 py-4 rounded-t-lg">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2l4-4m0 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-white text-xl font-semibold">Konfirmasi Pembayaran</h3>
                        </div>
                        <button type="button" onclick="closeModal('confirm-modal-{{ $rowId }}')"
                            class="text-white hover:text-gray-200 text-2xl leading-none">&times;
                        </button>
                    </div>

                    {{-- BODY --}}
                    <div class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Jenis Pembayaran --}}
                        <div class="md:col-span-2">
                            <label for="jenis_pembayaran_{{ $rowId }}"
                                class="block text-gray-700 dark:text-gray-300 font-medium mb-1">
                                Jenis Pembayaran
                            </label>
                            <select id="jenis_pembayaran_{{ $rowId }}" name="jenis_pembayaran" required
                                class="w-full border-gray-300 focus:ring-green-500 focus:border-green-500 rounded-md shadow-sm p-2">
                                <option value="">— Pilih —</option>
                                <option value="cash">Cash</option>
                                <option value="debit">Debit</option>
                            </select>
                        </div>

                        {{-- Deposit --}}
                        <div>
                            <label for="deposit_{{ $rowId }}"
                                class="block text-gray-700 dark:text-gray-300 font-medium mb-1">
                                Deposit
                            </label>
                            <input id="deposit_{{ $rowId }}" name="deposit" type="number" step="1" required
                                placeholder="500000"
                                class="w-full border-gray-300 focus:ring-green-500 focus:border-green-500 rounded-md shadow-sm p-2">
                        </div>

                        {{-- Pay To Provider --}}
                        <div>
                            <label for="pay_to_provider_{{ $rowId }}"
                                class="block text-gray-700 dark:text-gray-300 font-medium mb-1">
                                Pay To Provider
                            </label>
                            <input id="pay_to_provider_{{ $rowId }}" name="pay_to_provider" type="number"
                                step="1" placeholder="80000"
                                class="w-full border-gray-300 focus:ring-green-500 focus:border-green-500 rounded-md shadow-sm p-2">
                        </div>

                        {{-- Owe To Me --}}
                        <div>
                            <label for="owe_to_me_{{ $rowId }}"
                                class="block text-gray-700 dark:text-gray-300 font-medium mb-1">
                                Owe To Me
                            </label>
                            <input id="owe_to_me_{{ $rowId }}" name="owe_to_me" type="number" step="1"
                                placeholder="150000"
                                class="w-full border-gray-300 focus:ring-green-500 focus:border-green-500 rounded-md shadow-sm p-2">
                        </div>

                        {{-- Include --}}
                        <fieldset class="md:col-span-2 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <legend class="px-2 text-gray-700 dark:text-gray-300 font-medium">Include</legend>
                            <div class="grid grid-cols-2 gap-2 mt-2">
                                @foreach (['bensin', 'parkir', 'sopir', 'makan_siang', 'makan_malam', 'tiket_masuk'] as $f)
                                    <label class="inline-flex items-center space-x-2">
                                        <input type="checkbox" name="include[{{ $f }}]"
                                            class="form-checkbox h-5 w-5 text-green-600">
                                        <span
                                            class="text-gray-800 dark:text-gray-200">{{ ucwords(str_replace('_', ' ', $f)) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        {{-- Exclude --}}
                        <fieldset class="md:col-span-2 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <legend class="px-2 text-gray-700 dark:text-gray-300 font-medium">Exclude</legend>
                            <div class="grid grid-cols-2 gap-2 mt-2">
                                @foreach (['bensin', 'parkir', 'sopir', 'makan_siang', 'makan_malam', 'tiket_masuk'] as $f)
                                    <label class="inline-flex items-center space-x-2">
                                        <input type="checkbox" name="exclude[{{ $f }}]"
                                            class="form-checkbox h-5 w-5 text-red-600">
                                        <span
                                            class="text-gray-800 dark:text-gray-200">{{ ucwords(str_replace('_', ' ', $f)) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>

                    {{-- FOOTER --}}
                    <div class="bg-gray-100 dark:bg-gray-900 px-6 py-4 flex justify-end space-x-3 rounded-b-lg">
                        <button type="button" onclick="closeModal('confirm-modal-{{ $rowId }}')"
                            class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md hover:bg-gray-400 dark:hover:bg-gray-600 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md transition">
                            Konfirmasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endisset

{{-- ==== Delete Modal ==== --}}
@isset($deleteUrl)
    <div id="delete-modal-{{ $rowId }}"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm overflow-y-auto" style="display: none;">
        <div class="min-h-screen px-4 text-center">
            <span class="inline-block h-screen align-middle" aria-hidden="true">&#8203;</span>

            <div
                class="modal-dialog inline-block w-full max-w-md p-6 my-8 text-left align-middle bg-white dark:bg-gray-800 rounded-lg shadow-xl transform transition-all opacity-0 scale-95">
                <button type="button" onclick="closeModal('delete-modal-{{ $rowId }}')"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;
                </button>
                <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-200">Hapus Data</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Anda yakin ingin menghapus record ini?</p>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal('delete-modal-{{ $rowId }}')"
                        class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md hover:bg-gray-400 dark:hover:bg-gray-600 transition">
                        Batal
                    </button>
                    <form action="{{ $deleteUrl }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endisset

{{-- ==== Modal Script ==== --}}
<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        const dialog = modal.querySelector('.modal-dialog');

        // Show the modal
        modal.style.display = 'block';

        // Prevent body scrolling
        document.body.style.overflow = 'hidden';

        // Animate in
        setTimeout(() => {
            dialog.classList.remove('opacity-0', 'scale-95');
            dialog.classList.add('opacity-100', 'scale-100');
        }, 10);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const dialog = modal.querySelector('.modal-dialog');

        // Animate out
        dialog.classList.remove('opacity-100', 'scale-100');
        dialog.classList.add('opacity-0', 'scale-95');

        // Hide the modal after animation
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }
</script>
