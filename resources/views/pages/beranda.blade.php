@extends("layouts.main")

@section("judul")
    Beranda
@endsection

@section("deskripsi")
    Pesan menu favoritmu disini.
@endsection

@section("konten")
    <header class="w-full border border-b-slate-800/50 bg-white shadow-lg">
        <section class="container mx-auto w-9/10 flex items-center justify-between py-4">
            <a href="{{ route('beranda') }}" class="font-bold text-xl">
                RODAPAS
            </a>
            <a href="" class="text-sm border border-slate-200 px-4 py-2 rounded transition-all duration-300 ease-in-out lg:hover:bg-slate-200">
                Laporan Harian
            </a>
        </section>
    </header>
    <main class="container mx-auto my-14 w-9/10 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        @if (isset($items) && !empty($items))
            @foreach ($items as $item)
                <x-card
                    :image="asset($item->gambar) ?? 'N/A'"
                    :name="$item->nama ?? 'N/A'"
                    :price="$item->harga ?? 'N/A'"
                />
            @endforeach
        @endif
        <a href="" class="fixed bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-3 pl-3 pr-6 py-2 rounded-full bg-[#ef4444] text-white text-sm shadow-lg z-50 transition-all duration-300 ease-in-out lg:hover:bg-[#dc2626]">
            <i class="fa-solid fa-microphone p-3 bg-[#dc2626] rounded-full"></i>
            <h5 class="font-semibold">Pesan Sekarang</h5>
        </a>
    </main>
@endsection