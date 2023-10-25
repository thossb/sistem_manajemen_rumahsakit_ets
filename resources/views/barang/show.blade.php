<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Show Barang' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Jenis Barang' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $barang->jenisBarang->jenis_barang }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Kondisi Barang' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $barang->kondisiBarang->kondisi_barang }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Deskripsi' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $barang->deskripsi }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Kecacatan' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $barang->kecacatan }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Jumlah Barang' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $barang->jumlah_barang }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Gambar Barang' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ isset($barang->gambar_barang) ? Storage::url($barang->gambar_barang) : '' }}" alt="{{ $barang->jenisBarang->jenis_barang }}" srcset="">
                        </p>
                    </div>
                    <a href="{{ route('barang.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
