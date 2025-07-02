@php
    $category = [
        'MAKANAN' => 'bg-red-100 text-red-600',
        'MINUMAN' => 'bg-blue-100 text-blue-600',
        'KUDAPAN' => 'bg-yellow-100 text-yellow-600',
    ]
@endphp

@if ($menu->count() > 0 && !empty($menu))
    <section class="mt-5 grid grid-cols-1 gap-10 lg:grid-cols-3">
        @foreach ($menu as $item)
            <figure class="cursor-default flex flex-col rounded-lg drop-shadow-xl shadow-xl overflow-hidden border border-slate-200 bg-white">
                <div class="relative">
                    <h5 class="absolute font-semibold top-4 left-4 px-4 py-1 rounded-full text-xs {{ $category[$item->kategori] ?? 'bg-gray-100 text-gray-600' }}">
                        {{ $item->kategori }}
                    </h5>
                    <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="h-80 w-full object-cover rounded-t-lg" />
                </div>
                <figcaption class="flex flex-col px-6 py-4">
                    <h4 class="text-sm font-bold text-slate-800 lg:text-lg">
                        {{ $item->nama ?? "N/A" }}
                    </h4>
                    <h5 class="font-semibold text-sm text-slate-800">
                        Rp{{ number_format($item->harga, 0, ",", ".") ?? 0 }}
                    </h5>
                    <h6 class="mt-4 font-medium text-xs text-slate-600">Opsi Tersedia:</h6>
                    <div class="flex flex-wrap mt-2 gap-2">
                        @forelse ($item->keterangan_item as $keterangan)
                            <h5 class="cursor-pointer h-fit text-xs font-semibold px-4 py-1 rounded-full border border-slate-700 text-slate-700 transition-colors duration-300 lg:hover:bg-slate-700 lg:hover:text-white">
                                {{ $keterangan->nama_keterangan }}
                            </h5>
                        @empty
                            <p class="text-xs text-slate-500">Tidak ada opsi tersedia</p>
                        @endforelse
                    </div>
                    <div class="mt-5 flex items-center justify-center gap-3">
                        <button class="cursor-pointer flex flex-1 items-center justify-center gap-3 text-xs border border-slate-800/20 rounded-md py-2.5 transition-colors duration-300 hover:bg-slate-50">
                            <i class="fa-regular fa-pen-to-square text-slate-600"></i>
                            <h5 class="font-medium text-slate-600">Edit</h5>
                        </button>
                        <form action="{{ route('menu.hapus', ['id' => $item->id_item]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapus menu ini?')" class="cursor-pointer grid place-items-center text-xs text-red-600 border border-red-600 rounded-md p-2.75 transition-colors duration-300 hover:bg-red-600 hover:text-white">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </figcaption>
            </figure>
        @endforeach
    </section>
@else
    <div class="cursor-default mt-24 flex flex-col items-center justify-center gap-4">
        <i class="fa-solid fa-sad-cry text-4xl text-slate-800"></i>
        <h5 class="font-medium text-center text-lg text-slate-800">
            Hiks, kamu belum nambahin menu.
            <br />
            Ayo tambahin dulu!
        </h5>
    </div>
@endif