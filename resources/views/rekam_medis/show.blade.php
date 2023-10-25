<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Show Rekam Medis' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Nama Pasien' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $rekam_medis->namaPasien->nama_pasien }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Dokter' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $rekam_medis->dokter->nama_dokter }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Kondisi Kesehatan' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $rekam_medis->kondisi_kesehatan }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Suhu Tubuh' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $rekam_medis->suhu_tubuh }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Resep File' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            <a href="{{ Storage::url($rekam_medis->resep_file) }}" target="_blank">View Resep</a>
                        </p>
                    </div>
                    <a href="{{ route('rekam_medis.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
