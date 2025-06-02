<section class="cursor-default w-full max-w-md rounded-lg border border-gray-200 bg-white shadow-sm mb-6">
    <h4 class="p-4 border-b border-gray-200 font-semibold text-lg text-gray-800">Pesanan Anda</h4>
    <figure class="p-4 space-y-4">
        @foreach ($transaction->antrean as $antrean)
            <figcaption class="flex justify-between text-sm text-gray-700">
                <div>
                    <h6 class="font-medium">{{ $antrean->jumlah }}x {{ $antrean->item->nama }}</h6>
                    @if (collect(json_decode($antrean->keterangan_pilihan, true))->isNotEmpty())
                        @foreach (collect(json_decode($antrean->keterangan_pilihan, true)) as $key => $value)
                            <h6 class="text-gray-500 text-xs capitalize">{{ str_replace("_", " ", $key) }}:
                                {{ $value }}
                            </h6>
                        @endforeach
                    @endif
                </div>
                <span class="font-medium text-gray-800">
                    Rp {{ number_format($antrean->subtotal, 0, ",", ".") }}
                </span>
            </figcaption>
        @endforeach
        <span class="border-t border-gray-200 pt-2 flex justify-between font-semibold text-gray-800">
            <h5>Total</h5>
            <h5>Rp {{ number_format($transaction->total, 0, ",", ".") }}</h5>
        </span>
    </figure>
</section>