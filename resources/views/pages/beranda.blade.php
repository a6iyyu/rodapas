@extends("layouts.main")

@section("judul")
    Beranda
@endsection

@section("deskripsi")
    Pesan menu favoritmu disini.
@endsection

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto my-14 w-9/10">
        <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @if (isset($items) && !empty($items))
                @foreach ($items as $item)
                    <x-card :image="asset($item->gambar) ?? 'N/A'" :name="$item->nama ?? 'N/A'" :price="$item->harga ?? 'N/A'" :target="$item->id_item ?? 'N/A'" />
                @endforeach
            @endif
        </section>
        <section class="fixed bottom-6 left-1/2 -translate-x-1/2 flex gap-4 z-50">
            <a href="{{ route('log-suara') }}" class="flex items-center gap-3 pl-3 pr-6 py-2 rounded-full bg-[#ef4444] text-white text-sm shadow-lg transition-all duration-300 ease-in-out lg:hover:bg-[#dc2626]">
                <i class="fa-solid fa-microphone px-3.5 py-3 bg-[#dc2626] rounded-full"></i>
                <h5 class="font-semibold">Pesan Suara</h5>
            </a>
            <button type="button" id="open-cart" class="cursor-pointer flex items-center gap-3 pl-3 pr-6 py-2 rounded-full bg-green-500 text-white text-sm shadow-lg transition-all duration-300 ease-in-out lg:hover:bg-green-600">
                <i class="fa-solid fa-cart-shopping p-3 bg-green-600 rounded-full"></i>
                <h5 class="font-semibold">Keranjang</h5>
            </button>
        </section>
    </main>
    @include("components.beranda.keranjang")
    @include("components.beranda.pemesanan")
@endsection