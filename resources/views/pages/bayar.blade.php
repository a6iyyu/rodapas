@extends("layouts.main")

@section("judul")
    Antrean
@endsection

@section("deskripsi")
@endsection

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto w-9/10 min-h-screen flex flex-col items-center {{ isset($transactions) && $transactions->isNotEmpty() ? "my-14" : "justify-center my-3 gap-2" }}">
        @if (isset($transactions) && $transactions->isNotEmpty())
            @foreach ($transactions as $transaction)
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
                <section class="w-full max-w-md rounded-lg border border-gray-200 bg-white shadow-sm flex flex-col items-center p-4">
                    <h4 class="cursor-default font-semibold text-lg text-gray-800 mb-4">
                        Scan untuk Membayar
                    </h4>
                    <div class="mb-4 w-40 h-40 flex items-center justify-center border border-dashed border-gray-400 rounded">
                        {!! $qr[$transaction->id_transaksi] ?? "" !!}
                    </div>
                    <h6 class="cursor-default text-xs text-gray-500 mb-4 text-center">
                        Scan QR code di atas menggunakan aplikasi e-wallet atau mobile banking Anda
                    </h6>
                    <button type="button" class="cursor-pointer w-full py-2 text-sm font-semibold rounded transition-all duration-300 ease-in-out text-white bg-red-500 hover:bg-red-600">
                        Konfirmasi Pembayaran
                    </button>
                </section>
            @endforeach
        @else
            <i class="fa-solid fa-triangle-exclamation text-5xl text-gray-400"></i>
            <p class="cursor-default font-semibold text-xl text-gray-700">Tidak ada data antrean.</p>
        @endif
    </main>
@endsection