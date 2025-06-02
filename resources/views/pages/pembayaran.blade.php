@extends("layouts.main")

@section("judul")
    Pembayaran
@endsection

@section("deskripsi")
@endsection

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto w-9/10 min-h-screen flex flex-col items-center {{ isset($transactions) && $transactions->isNotEmpty() ? "my-14" : "justify-center my-3 gap-2" }}">
        @if (isset($transactions) && $transactions->isNotEmpty())
            @foreach ($transactions as $transaction)
                @include('components.pembayaran.struk')
                @include('components.pembayaran.barcode')
            @endforeach
        @else
            <i class="fa-solid fa-triangle-exclamation text-5xl text-gray-400"></i>
            <p class="cursor-default font-semibold text-xl text-gray-700">Tidak ada data antrean.</p>
        @endif
    </main>
@endsection