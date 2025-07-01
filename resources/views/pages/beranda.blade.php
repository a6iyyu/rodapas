@extends("layouts.main")

@section("judul", "Beranda")
@section("deskripsi", "Pesan menu favoritmu disini.")

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto my-14 w-9/10">
        @if (isset($items) && $items->isNotEmpty())
            <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($items as $item)
                    <x-card
                        :image="asset($item->gambar) ?? 'N/A'"
                        :name="$item->nama ?? 'N/A'"
                        :price="$item->harga ?? 'N/A'"
                        :target="$item->id_item ?? 'N/A'"
                    />
                @endforeach
            </section>
        @else
            <div class="mx-auto w-full flex flex-col items-center justify-center py-20 text-gray-500 gap-4 lg:w-9/20">
                <i class="fa-solid fa-exclamation-triangle cursor-default text-4xl"></i>
                <h5 class="cursor-default text-sm text-center leading-6">
                    Menu belum tersedia. Yuk, tambahkan menu terlebih dahulu atau lengkapi profil Anda agar laporan bisa
                    ditampilkan dengan lebih mudah.
                </h5>
                <span class="flex text-xs gap-4">
                    <a href="{{ route("menu") }}" class="cursor-pointer w-fit px-5 py-3 font-semibold text-white bg-blue-500 transition-all duration-300 ease-in-out rounded-lg lg:hover:bg-blue-600">
                        Tambah Menu
                    </a>
                    <a href="{{ route("profil") }}" class="cursor-pointer w-fit px-5 py-3 font-semibold text-slate-900 border border-slate-900 bg-transparent transition-all duration-300 ease-in-out rounded-lg lg:hover:text-white lg:hover:bg-slate-600">
                        Profil Restoran Anda
                    </a>
                </span>
            </div>
        @endif
        <section class="fixed bottom-6 left-1/2 -translate-x-1/2 flex flex-col text-xs gap-4 z-50 sm:text-sm sm:flex-row">
            <a href="{{ route("log-suara") }}" class="flex items-center gap-3 pl-3 pr-6 py-2 rounded-full bg-[#ef4444] text-white shadow-lg transition-all duration-300 ease-in-out lg:hover:bg-[#dc2626]">
                <i class="fa-solid fa-microphone px-3.5 py-3 bg-[#dc2626] rounded-full"></i>
                <h5 class="font-semibold">Pesan Suara</h5>
            </a>
            <button type="button" id="open-cart" class="cursor-pointer flex items-center gap-3 pl-3 pr-6 py-2 rounded-full bg-green-500 text-white shadow-lg transition-all duration-300 ease-in-out lg:hover:bg-green-600">
                <i class="fa-solid fa-cart-shopping p-3 bg-green-600 rounded-full"></i>
                <h5 class="font-semibold">Keranjang</h5>
            </button>
        </section>
    </main>
    @include("components.beranda.keranjang")
    @include("components.beranda.pemesanan")
@endsection