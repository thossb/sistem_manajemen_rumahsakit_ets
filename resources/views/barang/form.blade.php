<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($barang) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Don't forget to add 'enctype="multipart/form-data"' to accept files in the form --}}
                    <form method="post" action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- Add @method('put') for edit mode --}}
                        @isset($barang)
                            @method('put')
                        @endisset

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
                        
                        <!-- Deskripsi and Kecacatan -->
                        <div>
                            <x-input-label for="deskripsi" value="Deskripsi Barang" />
                            <x-text-input id="deskripsi" name="deskripsi" type="text" class="mt-1 block w-full" :value="$barang->deskripsi ?? old('deskripsi')" required />
                            <x-input-error :messages="$errors->get('deskripsi')" />
                        </div>

                        <div>
                            <x-input-label for="kecacatan" value="Kecacatan Barang" />
                            <x-text-input id="kecacatan" name="kecacatan" type="text" class="mt-1 block w-full" :value="$barang->kecacatan ?? old('kecacatan')" required />
                            <x-input-error :messages="$errors->get('kecacatan')" />
                        </div>

                        <!-- Jumlah Barang -->
                        <div>
                            <x-input-label for="jumlah_barang" value="Jumlah Barang" />
                            <x-text-input id="jumlah_barang" name="jumlah_barang" type="number" class="mt-1 block w-full" :value="$barang->jumlah_barang ?? old('jumlah_barang')" required />
                            <x-input-error :messages="$errors->get('jumlah_barang')" />
                        </div>

                        <!-- Upload Gambar Barang -->
                        <div>
                            <x-input-label for="gambar_barang" value="Upload Gambar Barang" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="gambar_barang" name="gambar_barang" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="gambar_barang_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($barang) ? Storage::url($barang->gambar_barang) : '' }}" alt="Gambar Barang Preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('gambar_barang')" />
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
        // Create an onchange event listener for gambar_barang input
        document.getElementById('gambar_barang').onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                // If there is an image, create a preview in gambar_barang_preview
                document.getElementById('gambar_barang_preview').src = URL.createObjectURL(file);
            }
        }
    </script>

    <script>
        // Fetch Jenis Barang options
        fetch('/jenis-barang-options')
            .then(response => response.json())
            .then(data => {
                const jenisBarangDropdown = document.getElementById('jenis_barang');
                data.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.id;
                    optionElement.textContent = option.jenis_barang;
                    jenisBarangDropdown.appendChild(optionElement);
                });
            });

        // Fetch Kondisi Barang options
        fetch('/kondisi-barang-options')
            .then(response => response.json())
            .then(data => {
                const kondisiBarangDropdown = document.getElementById('kondisi_barang');
                data.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.id;
                    optionElement.textContent = option.kondisi_barang;
                    kondisiBarangDropdown.appendChild(optionElement);
                });
            });
    </script>
</x-app-layout>
