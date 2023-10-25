<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($rekam_medis) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($rekam_medis) ? route('rekam_medis.update', $rekam_medis->id) : route('rekam_medis.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @isset($rekam_medis)
                            @method('put')
                        @endisset

                        <div>
                            <!-- Dropdown for Nama Pasien -->
                            <div class="relative">
                                <x-input-label for="pasien" value="Nama Pasien" />
                                <x-select id="pasien" name="pasien" class="mt-1 block w-full">
                                    <option value="" disabled>Select Nama Pasien</option>
                                    <!-- Populate with dynamic data -->
                                </x-select>
                            </div>
                    
                            <!-- Dropdown for Dokter -->
                            <div class="relative mt-6">
                                <x-input-label for="dokter" value="Dokter" />
                                <x-select id="dokter" name="dokter" class="mt-1 block w-full">
                                    <option value="" disabled>Select Dokter</option>
                                    <!-- Populate with dynamic data -->
                                </x-select>
                            </div>
                        </div>
                        
                        <!-- Kondisi Kesehatan and Suhu Tubuh -->
                        <div>
                            <x-input-label for="kondisi_kesehatan" value="Kondisi Kesehatan" />
                            <x-text-input id="kondisi_kesehatan" name="kondisi_kesehatan" type="text" class="mt-1 block w-full" :value="$rekam_medis->kondisi_kesehatan ?? old('kondisi_kesehatan')" required />
                            <x-input-error :messages="$errors->get('kondisi_kesehatan')" />
                        </div>

                        <div>
                            <x-input-label for="suhu_tubuh" value="Suhu Tubuh" />
                            <x-text-input id="suhu_tubuh" name="suhu_tubuh" type="text" class="mt-1 block w-full" :value="$rekam_medis->suhu_tubuh ?? old('suhu_tubuh')" required />
                            <x-input-error :messages="$errors->get('suhu_tubuh')" />
                        </div>

                        <!-- Upload Resep File -->
                        <div>
                            <x-input-label for="resep_file" value="Upload Resep File" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose file</span>
                                <input type="file" id="resep_file" name="resep_file" accept=".pdf, .png, .jpg, .jpeg" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('resep_file')" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Create an onchange event listener for resep_file input
        document.getElementById('resep_file').onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                // If there is a file, you can show its name or other relevant information.
                console.log('Selected file: ' + file.name);
            }
        }
    </script>

    <script>
        // Fetch Nama Pasien options
        fetch('/pasien-options')
            .then(response => response.json())
            .then(data => {
                const PasienDropdown = document.getElementById('pasien');
                data.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.id;
                    optionElement.textContent = option.pasien;
                    PasienDropdown.appendChild(optionElement);
                });
            });

        // Fetch Dokter options
        fetch('/dokter-options')
            .then(response => response.json())
            .then(data => {
                const dokterDropdown = document.getElementById('dokter');
                data.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.id;
                    optionElement.textContent = option.nama_dokter;
                    dokterDropdown.appendChild(optionElement);
                });
            });
    </script>
</x-app-layout>
