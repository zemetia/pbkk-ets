<x-app-layout>

    <div class="w-full bg-gray-400 min-h-screen py-10">
        <div class="w-[50%] mx-auto  bg-white rounded-lg px-10 py-5">
            <form class="w-full flex flex-col gap-3" action="/barang/add" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="nama" :value="__('Nama Barang')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"
                        required autofocus autocomplete="nama" />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <div class="grid grid-cols-2 space-x-3">
                    <!-- Jenis -->
                    <div>
                        <label for="jenis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="jenis" type="text" name="jenis" :value="old('jenis')" required autofocus
                            autocomplete="jenis">
                            @foreach ($jenis as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kondisi')" class="mt-2" />
                    </div>

                    <!-- Jenis -->
                    <div>
                        <label for="kondisi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="kondisi" type="text" name="kondisi" :value="old('kondisi')" required autofocus
                            autocomplete="kondisi">
                            @foreach ($kondisi as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kondisi')" class="mt-2" />
                    </div>
                </div>

                {{-- keterangan --}}
                <div>
                    <label for="keterangan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis keterangan tentang barang"></textarea>
                    <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                </div>

                {{-- kecacatan --}}
                <div>
                    <label for="kecacatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <textarea id="kecacatan" name="kecacatan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Jelaskan kecacatan barang disini"></textarea>
                    <x-input-error :messages="$errors->get('kecacatan')" class="mt-2" />
                </div>

                <!-- jumlah -->
                <div>
                    <x-input-label for="jumlah" :value="__('Jumlah')" />
                    <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah"
                        :value="old('jumlah')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                </div>


                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="image" required>

                <button type="submit"
                    class="bg-green-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center">
                    Add
                </button>
        </div>
        </form>
    </div>
    </div>

</x-app-layout>
