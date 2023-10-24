<x-app-layout>

    <div class="w-full bg-gray-200 min-h-screen py-5">
        <div class="w-[80%] bg-white mx-auto min-h-screen rounded-lg p-10">
            <div class="w-full flex justify-end items-center my-5">
                <button
                    class="w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] bg-green-400 rounded-lg text-base font-[700] font-montserrat">
                    <a href="/barang/add">Tambahkan Barang</a>
                </button>
            </div>

            {{-- datas --}}
            <div class="w-full bg-gray-200 rounded-lg p-2 gap-5 flex flex-col justify-center items-center">
                @php
                    $i = 1;
                @endphp
                @foreach ($barangList as $barang)
                    <div class="flex flex-wrap -mx-2 overflow-hidden">
                        <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="/path/to/image.jpg" alt="Image description">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Item Name</div>
                                    <p class="text-gray-700 text-base">
                                        <strong>ID:</strong> 123<br>
                                        <strong>Jenis:</strong> Type A<br>
                                        <strong>Kondisi:</strong> Good<br>
                                        <strong>Keterangan:</strong> This is a description.<br>
                                        <strong>Kecacatan:</strong> None<br>
                                        <strong>Jumlah:</strong> 10
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
