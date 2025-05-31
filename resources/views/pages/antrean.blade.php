@extends("layouts.main")

@section("judul")
    Antrean
@endsection

@section("deskripsi")
@endsection

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto w-9/10 min-h-screen h-full flex flex-col items-center justify-center {{ isset($transactions) && $transactions->isNotEmpty() ? "my-14" : "gap-2" }}">
        @if (isset($transactions) && $transactions->isNotEmpty())
            @foreach ($transactions as $transaction)
                <div>
                    <p>Nama: {{ $transaction->nama_pelanggan }}</p>
                    <ul>
                        @foreach ($transaction->antrean as $antrean)
                            <li>{{ $antrean->item->nama }} - Jumlah: {{ $antrean->jumlah }}</li>
                        @endforeach
                    </ul>
                    {!! $qr[$transaction->id_transaksi] !!}
                </div>
            @endforeach
        @else
            <i class="fa-solid fa-triangle-exclamation text-5xl"></i>
            <p class="cursor-default font-semibold text-xl">Tidak ada data antrean.</p>
        @endif
    </main>
@endsection