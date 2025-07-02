<article class="cursor-default p-6 rounded-md bg-white border border-slate-800/20">
    <h4 class="text-base cursor-default font-bold text-slate-800 md:text-xl">
        Pesanan Terbaru
    </h4>
    <hr class="mt-2.5 h-1 w-full text-slate-800" />
    @if (!empty($antrean) && $antrean->count())
        @foreach ($antrean as $list)
            <div class="mt-5 overflow-x-auto">
                <ul class="flex flex-col gap-4 min-w-[325px]">
                    <li class="list-none px-6 py-4 flex items-center justify-between rounded-md bg-white border border-slate-800/20 transition-colors duration-300 lg:hover:bg-slate-50 min-w-full">
                        <span class="flex flex-col gap-1">
                            <h5 class="font-semibold text-sm md:text-base">#00{{ $list->id_antrean }}</h5>
                            <h5 class="text-xs md:text-sm">{{ $list->jumlah }}x {{ $list->item->nama }}</h5>
                        </span>
                        <span class="flex flex-col items-end gap-1">
                            <h5 class="font-semibold text-sm md:text-base">
                                Rp{{ number_format($list->item->harga, 0, ',', '.') }}
                            </h5>
                            <h5 class="font-semibold w-fit bg-slate-800 text-white px-4 py-1 rounded-full text-xs">
                                {{ $list->transaksi->status }}
                            </h5>
                        </span>
                    </li>
                </ul>
            </div>
        @endforeach
    @else
        <div class="mt-5 overflow-x-auto">
            <ul class="flex flex-col items-center justify-center gap-4 min-w-[325px]">
                <i class="fa-regular fa-bell-slash text-xl md:text-4xl"></i>
                <h5 class="text-sm md:text-base">Belum Ada Pesanan Terbaru</h5>
            </ul>
        </div>
    @endif
</article>