<header class="w-full bg-white shadow-lg">
    <section class="container mx-auto w-9/10 flex items-center justify-between py-4">
        <a href="{{ route('beranda') }}" class="font-bold text-xl">
            RODAPAS
        </a>
        @if (Request::routeIs('beranda'))
            <a href="{{ route('pembayaran') }}" class="flex items-center gap-4 text-sm border border-slate-200 px-4 py-2.5 rounded transition-all duration-300 ease-in-out lg:hover:bg-slate-200">
                <i class="fa-solid fa-wallet"></i>
                <h5>Bayar</h5>
            </a>
        @elseif (Request::routeIs('menu'))
            <span class="flex items-center gap-4 text-xs">
                <a href="{{ route('beranda') }}" class="flex items-center gap-4 border border-slate-200 px-4 py-2.5 rounded transition-all duration-300 ease-in-out lg:hover:bg-slate-200">
                    <i class="fa-solid fa-home"></i>
                    <h5>Kembali</h5>
                </a>
                <button class="open cursor-pointer flex items-center gap-4 bg-slate-800 text-white px-4 py-2.5 rounded transition-all duration-300 ease-in-out lg:hover:bg-slate-700">
                    <i class="fa-solid fa-plus"></i>
                    <h5>Tambah Menu</h5>
                </button>
            </span>
        @elseif (Request::routeIs('profil'))
            <span class="flex items-center gap-4 text-xs">
                <a href="{{ route('beranda') }}" class="flex items-center gap-4 border border-slate-200 p-2.5 rounded transition-all duration-300 ease-in-out lg:hover:bg-slate-200 lg:px-4">
                    <i class="fa-solid fa-home"></i>
                    <h5 class="hidden lg:inline">Kembali</h5>
                </a>
                <button class="open cursor-pointer flex items-center gap-4 bg-slate-800 text-white p-2.5 rounded transition-all duration-300 ease-in-out lg:hover:bg-slate-700 lg:px-4">
                    <i class="fa-solid fa-pencil"></i>
                    <h5 class="hidden lg:inline">Edit Profil</h5>
                </button>
            </span>
        @endif
    </section>
</header>