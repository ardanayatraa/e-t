{{-- resources/views/transaksi/edit.blade.php --}}
<x-app-layout>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            {{-- Header --}}
            <div class="mb-4">
                <h2 class="text-lg font-semibold border py-4 pl-6 pr-8 text-green-800 flex items-center gap-2">
                    Edit Transaksi: {{ $transaksi->id }}
                </h2>
            </div>
            {{-- Form Card --}}
            <div class="bg-white border dark:bg-gray-800 sm:rounded-lg p-6">
                <form action="{{ route('transaksi.update', $transaksi) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Jenis Transaksi --}}
                        <div>
                            <label for="jenis_transakasi" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Jenis Transaksi
                            </label>
                            <input id="jenis_transakasi" name="jenis_transakasi" type="text" required
                                value="{{ old('jenis_transakasi', $transaksi->jenis_transakasi) }}"
                                class="block w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500 rounded-lg p-2 transition">
                        </div>

                        {{-- Jumlah Peserta --}}
                        <div>
                            <label for="jumlah_peserta" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Jumlah Peserta
                            </label>
                            <input id="jumlah_peserta" name="jumlah_peserta" type="number" min="1" required
                                value="{{ old('jumlah_peserta', $transaksi->jumlah_peserta) }}"
                                class="block w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500 rounded-lg p-2 transition">
                        </div>

                        {{-- Owe To Me --}}
                        <div>
                            <label for="owe_to_me" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Owe To Me
                            </label>
                            <input id="owe_to_me" name="owe_to_me" type="number" step="0.01" required
                                value="{{ old('owe_to_me', $transaksi->owe_to_me) }}"
                                class="block w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500 rounded-lg p-2 transition">
                        </div>

                        {{-- Pay To Provider --}}
                        <div>
                            <label for="pay_to_provider"
                                class="block font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Pay To Provider
                            </label>
                            <input id="pay_to_provider" name="pay_to_provider" type="number" step="0.01" required
                                value="{{ old('pay_to_provider', $transaksi->pay_to_provider) }}"
                                class="block w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500 rounded-lg p-2 transition">
                        </div>

                        {{-- Total Transaksi --}}
                        <div class="md:col-span-2">
                            <label for="total_transaksai"
                                class="block font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Total Transaksi
                            </label>
                            <input id="total_transaksai" name="total_transaksai" type="number" step="0.01" required
                                value="{{ old('total_transaksai', $transaksi->total_transaksai) }}"
                                class="block w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500 rounded-lg p-2 transition">
                        </div>

                        {{-- Status Transaksi --}}
                        <div class="md:col-span-2">
                            <label for="transaksi_status"
                                class="block font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Status Transaksi
                            </label>
                            <select id="transaksi_status" name="transaksi_status" required
                                class="block w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500 rounded-lg p-2 transition">
                                <option value="pending"
                                    {{ old('transaksi_status', $transaksi->transaksi_status) == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="completed"
                                    {{ old('transaksi_status', $transaksi->transaksi_status) == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                                <option value="canceled"
                                    {{ old('transaksi_status', $transaksi->transaksi_status) == 'canceled' ? 'selected' : '' }}>
                                    Canceled
                                </option>
                            </select>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('transaksi.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
