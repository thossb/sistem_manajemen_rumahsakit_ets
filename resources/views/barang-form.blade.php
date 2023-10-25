<x-app-layout>
    <!-- Your layout content here -->

    <div>
        <!-- Dropdown for Jenis Barang -->
        <div class="relative">
            <x-input-label for="jenis_barang" value="Jenis Barang" />
            <x-select id="jenis_barang" name="jenis_barang" class="mt-1 block w-full">
                <option value="" disabled>Select Jenis Barang</option>
            </x-select>
        </div>

        <!-- Dropdown for Kondisi Barang -->
        <div class="relative mt-6">
            <x-input-label for="kondisi_barang" value="Kondisi Barang" />
            <x-select id="kondisi_barang" name="kondisi_barang" class="mt-1 block w-full">
                <option value="" disabled>Select Kondisi Barang</option>
            </x-select>
        </div>
    </div>
</x-app-layout>